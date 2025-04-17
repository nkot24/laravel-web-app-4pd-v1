<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();

        return view('comment.index', ['comments' => $comments]);
    }
    public function show(Post $post){
        Gate::authorize('view', $post);
        $statuses = PostStatus::all();
        return view('post.show', ['post' => $post, 'statuses' => $statuses,]);
    }
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function destroy(Comment $comment)
    {
        //Gate::authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
