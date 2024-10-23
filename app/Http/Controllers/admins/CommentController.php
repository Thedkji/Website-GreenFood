<?php

namespace App\Http\Controllers\admins;

use App\Models\Comment;
use App\Models\Rate;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CommentController extends Controller{
    public function showComment()
    {
        $comments = Comment::with(['rates', 'product', 'user'])->paginate(6); 
        return view('admins.comments.comment', compact('comments')); 
    }

    public function create($id)
    {
      
        $comment = Comment::find($id);
        $product = $comment->product;

        return view('admins.comments.create', compact('product', 'id'));
    }

    // Store a new comment
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $comment = new Comment();
        $comment->product_id = $request->product_id; 
        $comment->user_id = 1;
        $comment->content = $request->content;

   
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('comments', 'public'); 
            $comment->img = $path;
        }

        $comment->save();

        return redirect()->route('admin.comments.comment')->with('success', 'Bình luận đã được thêm thành công.');
    }

   
    

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.comment')->with('success', 'Bạn đã xóa thành công.');
    }
}