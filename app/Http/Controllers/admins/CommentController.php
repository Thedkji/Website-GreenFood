<?php

namespace App\Http\Controllers\admins;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function showComment()
    {
        $comments = Comment::with(['rates', 'product', 'user'])->paginate(6);
        return view('admins.comments.comment', compact('comments'));
    }

    public function create($id)
    {
        $comment = Comment::find($id);
        
        if (!$comment) {
            return redirect()->route('admin.comments.comment')->with('error', 'Bình luận không tồn tại.');
        }
    
        $product = $comment->product;
        $customer = User::find($comment->parent_user_id); // Fetch customer based on parent_user_id
    
        // Check if the customer is null
        if (!$customer) {
            return redirect()->route('admin.comments.comment')->with('error', 'Khách hàng không tồn tại.');
        }
    
        return view('admins.comments.create', compact('product', 'customer', 'id'));
    }
public function store(Request $request, $id)
{
    $request->validate([
        'content' => 'required|string',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $parentComment = Comment::find($id); // Find the original comment
    if (!$parentComment) {
        return redirect()->route('admin.comments.comment')->with('error', 'Bình luận không tồn tại.');
    }

    $reply = new Comment();
    $reply->product_id = $parentComment->product_id;
    $reply->user_id = 1; // Replace with the authenticated user ID if needed
    $reply->parent_user_id = $parentComment->user_id;
    $reply->content = $request->content;
    $reply->save();

    if ($request->hasFile('img')) {
        $path = $request->file('img')->store('comments', 'public');
        $reply->img = $path;
    }

    $reply->save();

    return redirect()->route('admin.comments.comment', $id)->with('success', 'Phản hồi đã được thêm thành công.');
}
public function detail($id)
{
    $comment = Comment::with(['product', 'user'])->find($id); // Load comment and related product/user data
    if (!$comment) {
        return redirect()->route('admin.comments.comment')->with('error', 'Bình luận không tồn tại.');
    }

    // Manually retrieve replies for the comment (if any)
    $replies = Comment::where('parent_user_id', $comment->user_id)->get();

    return view('admins.comments.detail-comment', compact('comment', 'replies'));
}    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.comment')->with('success', 'Bạn đã xóa thành công.');
    }
}