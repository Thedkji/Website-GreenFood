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
    public function index()
    {
        $users = User::paginate(5);
        return view('admins.users.list-users', compact('users'));
    }
    public function create()
    {
        return view('admins.users.add-users');
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();
            // dd($data);
            // Mã hóa mật khẩu
            // $data['password'] = Hash::make($data['password']);
            $data['password'] = bcrypt($data['password']);

            // Xử lý avatar nếu có
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('users/avatars', $avatarName, 'public');
                $data['avatar'] = $avatarPath;
            }

            // Tạo user mới
            $user = User::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Người dùng đã được thêm mới thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm người dùng. Vui lòng thử lại.');
        }
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admins.users.edit-users', compact('user'));
    }

    public function update($id, UserUpdateRequest $request)
    {
        DB::beginTransaction(); // Bắt đầu giao dịch

        try {
            $user = User::findOrFail($id);
            $data = $request->validated(); // Sử dụng validated()

            if ($request->hasFile('avatar')) {
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
            return redirect()->route('admin.users.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.users.index')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            $user = User::findOrFail($id);
            $user->delete();
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // $user->galleries()->delete();
            $user->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm. Vui lòng thử lại.');
        }
    }
}
