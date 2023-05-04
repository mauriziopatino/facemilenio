<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withCount(['reactions as likes_count' => function ($query) {
            $query->where('reactions_type_id', 1);
        }])
        ->withCount(['reactions as angry_count' => function ($query) {
            $query->where('reactions_type_id', 2);
        }])
        ->withCount(['reactions as heart_count' => function ($query) {
            $query->where('reactions_type_id', 3);
        }])
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('home.index')
            ->with(compact('posts'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
