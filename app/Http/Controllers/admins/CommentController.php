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
        $comments = Comment::with(['rates', 'product', 'user'])->paginate(6); // Fetch comments with product and user relationships
        return view('admins.comments.comment', compact('comments')); // Adjusted view path
    }

    // Show the form for adding a new comment
     public function create($id)
    {
        // Fetch products for selection in the form
        $products = Product::all(); // Adjust this as needed
        return view('admins.comments.create', compact('products', 'id'));
    }

    public function store(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->user_id = null; // Set user_id to null since login is not required

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            $comment->img = $request->file('img')->store('comments', 'public');
        }

        $comment->save(); // Save the comment

        // Create a new rate for the comment
        $comment->rates()->create([
            'star' => $request->rating,
        ]);

        return redirect()->route('admin.comments.comment')->with('success', 'Bạn đã thêm bình luận thành công.');
    }
    
    // Delete a comment
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.comment')->with('success', 'Bạn đã xóa thành công.');
    }
}