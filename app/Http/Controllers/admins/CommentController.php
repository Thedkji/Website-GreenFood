<?php

namespace App\Http\Controllers\admins;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function showComment(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $comments = Comment::with(['rates', 'product', 'user'])
                ->whereHas('product', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereHas('user', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                })
                ->orWhere('content', 'like', '%' . $searchTerm . '%')
                ->orderByDesc('id')
                ->paginate(6);
        } else {
            $comments = Comment::with(['rates', 'product', 'user'])
                ->where('parent_user_id', null)
                ->orderByDesc('id')
                ->paginate(6);
        }

        return view('admins.comments.comment', compact('comments', 'searchTerm'));
    }

    public function create($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return redirect()->route('admin.comments.comment')->with('error', 'Bình luận không tồn tại.');
        }

        $product = $comment->product;
        $customer = User::find($comment->parent_user_id);
        if (!$customer) {
            return redirect()->route('admin.comments.comment')->with('error', 'Khách hàng không tồn tại.');
        }

        return view('admins.comments.create', compact('product', 'customer', 'id'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ], [
            'content.required' => 'Nội dung không được để trống.',
            'content.string' => 'Nội dung phải là một chuỗi ký tự.',
        ]);


        $parentComment = Comment::find($id);
        if (!$parentComment) {
            return redirect()->route('admin.comments.comment')->with('error', 'Bình luận không tồn tại.');
        }

        $reply = new Comment();
        $reply->product_id = $parentComment->product_id;
        $reply->user_id = auth()->id();;
        $reply->parent_user_id = $parentComment->user_id;
        $reply->content = $request->content;
        $reply->save();

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('comments');
            $reply->img = $path;
        }

        $reply->save();

        return redirect()->route('admin.comments.detail', $id)->with('success', 'Đã phản hồi.');
    }
    public function detail($id)
    {
        $comment = Comment::with(['product', 'user'])->find($id);
        if (!$comment) {
            return redirect()->route('admin.comments.comment')->with('error', 'Bình luận không tồn tại.');
        }


        $replies = Comment::where('parent_user_id', $comment->user_id)
            ->where('product_id', $comment->product_id)
            ->get();

        return view('admins.comments.detail-comment', compact('comment', 'replies'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.comment')->with('success', 'Bạn đã xóa thành công.');
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids'); // Lấy danh sách ID từ request

        if (!is_array($ids) || empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Không có bình luận nào được chọn.'
            ], 400);
        }

        // Xóa các bình luận dựa trên danh sách ID
        Comment::whereIn('id', $ids)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa các bình luận được chọn thành công.'
        ]);
    }
}
