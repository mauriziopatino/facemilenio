<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();

        $validator = Validator::make($data, [
            'title' => 'required',
            'message' => 'max:500',
            'file' => File::types(['png', 'jpg', 'jpg'])
        ]);

        if($validator->fails()){
            return back()
                ->with('errors', $validator->messages()->all()[0])
                ->withInput();
        }

        $post = new Post;
        $post->user_id = $user->id;
        $post->title = $data['title'];
        $post->message = $data['message'];
        $post->created_by = $user->id;
        $post->updated_by = $user->id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $folderPath = public_path() . '/storage' . '/' . $user->email;
            $fileName = $file->hashName();

            if(!Storage::exists($folderPath)){
                Storage::makeDirectory($user->email);
            }

            $path = $request->file('image')->storeAs($folderPath,$fileName);
            $post->file_url = $path;
            
        }

        $post->save();
        
        return redirect('/home')
            ->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
