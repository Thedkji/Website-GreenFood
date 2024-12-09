<?php

namespace App\Http\Controllers\admins;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admins\UserRequest;
use App\Http\Requests\admins\UserUpdateRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Lấy giá trị tìm kiếm từ query

        // Truy vấn người dùng theo tên nếu có từ khóa tìm kiếm
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')->orWhere('id', $search);
            })
            ->paginate(10); // Sử dụng phân trang nếu có nhiều kết quả
        return view('admins.users.list-users', compact('users'));
    }
    public function create()
    {
        $provinces = DB::table('provinces')->get();
        $districts = DB::table('districts')->get();
        $wards = DB::table('wards')->get();

        return view('admins.users.add-users', compact('provinces', 'districts', 'wards'));
    }


    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);

            // Lấy tên đầy đủ của ward, district, và province từ các bảng tương ứng
            $ward = DB::table('wards')->where('code', $request->ward)->first();
            $district = DB::table('districts')->where('code', $request->district)->first();
            $province = DB::table('provinces')->where('code', $request->province)->first();

            // Gán tên đầy đủ vào mảng $data
            $data['ward'] = $ward ? $ward->name : null;
            $data['district'] = $district ? $district->name : null;
            $data['province'] = $province ? $province->name : null;

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('users/avatars', $avatarName, 'public');
                $data['avatar'] = $avatarPath;
            }


            $user = User::create($data);
            return back()->with('success', 'Người dùng đã được thêm mới thành công.');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi thêm người dùng. Vui lòng thử lại.');
        }
    }





    public function show($id)
    {
        $user = User::findOrFail($id);
        $provinces = DB::table('provinces')->get();
        $districts = DB::table('districts')->get();
        $wards = DB::table('wards')->get();

        // Lấy mã code của ward, district và province từ user để hiển thị selected
        $selectedWard = DB::table('wards')->where('name', $user->ward)->first();
        $selectedDistrict = DB::table('districts')->where('name', $user->district)->first();
        $selectedProvince = DB::table('provinces')->where('name', $user->province)->first();

        return view('admins.users.edit-users', compact(
            'user',
            'provinces',
            'districts',
            'wards',
            'selectedWard',
            'selectedDistrict',
            'selectedProvince'
        ));
    }


    public function update($id, UserUpdateRequest $request)
    {
        DB::beginTransaction(); // Bắt đầu giao dịch

        try {
            $user = User::findOrFail($id);
            $data = $request->validated(); // Sử dụng validated()

            $ward = DB::table('wards')->where('code', $request->ward)->first();
            $district = DB::table('districts')->where('code', $request->district)->first();
            $province = DB::table('provinces')->where('code', $request->province)->first();

            // Gán tên đầy đủ vào mảng $data
            $data['ward'] = $ward ? $ward->name : null;
            $data['district'] = $district ? $district->name : null;
            $data['province'] = $province ? $province->name : null;


            if ($request->hasFile('avatar')) {
                // Xóa ảnh cũ nếu có
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $avatar = $request->file('avatar');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('users/avatars', $avatarName, 'public');
                $data['avatar'] = $avatarPath;
            }

            $user->update($data);
            DB::commit();
            return back()->with('success', 'Người dùng đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function detail($id)
    {
        $provinces = DB::table('provinces')->get();
        $districts = DB::table('districts')->get();
        $wards = DB::table('wards')->get();
        $user = User::findOrFail($id);
        return view('admins.users.detail-users', compact('user', 'provinces', 'districts', 'wards'));
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            $user = User::findOrFail($id);
            // $user->delete();
            // if ($user->avatar) {
            //     Storage::disk('public')->delete($user->avatar);
            // }
            // $user->galleries()->delete();
            $user->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm. Vui lòng thử lại.');
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids'); // Lấy danh sách ID từ request

        if (!is_array($ids) || empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Không có lựa chọn nào được chọn.'
            ], 400);
        }

        // Xóa các bình luận dựa trên danh sách ID
        User::whereIn('id', $ids)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa các user được chọn thành công.'
        ]);
    }
}
