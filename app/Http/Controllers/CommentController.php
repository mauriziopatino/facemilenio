<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        $post = Post::withCount(['reactions as likes_count' => function ($query) {
            $query->where('reactions_type_id', 1);
        }])
        ->withCount(['reactions as angry_count' => function ($query) {
            $query->where('reactions_type_id', 2);
        }])
        ->withCount(['reactions as heart_count' => function ($query) {
            $query->where('reactions_type_id', 3);
        }])
        ->withCount('comments')
        ->where('id', $postId)
        ->orderBy('created_at', 'DESC')
        ->first();

        return view('comments.show')
            ->with(compact('post', 'postId', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function comment(Request $request, int $postId)
    {
        $user = Auth::user();

        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->user_id = $user->id;
        $comment->message = $request->message;
        $comment->created_by = $user->id;
        $comment->updated_by = $user->id;
        $comment->save();
        
        return redirect('/comments' . '/' . $postId)
            ->with('success', 'Comment created!');
    }
}
