<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use App\Models\Gender;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
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
    public function show(string $email)
    {
        // TODO: Joins
        $user = User::where('email', $email)->first();
        $friends = Friend::where('user_id', $user->id)->get();
        $posts = Post::withCount(['reactions as likes_count' => function ($query) {
            $query->where('reactions_type_id', 1);
        }])
        ->withCount(['reactions as angry_count' => function ($query) {
            $query->where('reactions_type_id', 2);
        }])
        ->withCount(['reactions as heart_count' => function ($query) {
            $query->where('reactions_type_id', 3);
        }])
        ->withCount('comments')
        ->where('user_id', $user->id)
        ->get();

        return view('users.show')
            ->with(compact('user', 'friends', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $email)
    {
        if($email != Auth::user()->email){
            abort(403, 'Unauthorized');
        }

        $user = User::where('email', $email)->first();
        $genders = Gender::all();

        return view('users.edit')
            ->with(compact('user', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $email)
    {
        if($email != Auth::user()->email){
            abort(403, 'Unauthorized');
        }
        
        $data = $request->all();
        $user = User::where('email', $email)->first();

        $validator = Validator::make($data, [
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['nullable', Password::min(8)->mixedCase()],
            'gender_id' => 'required',
            'birthdate' => 'required'
        ]);

        if($validator->fails()){
            return back()
                ->with('errors', $validator->messages()->all()[0])
                ->withInput();
        }

        $user->gender_id = $data['gender_id'];
        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->birthdate = $data['birthdate'];
        $user->biography = $data['biography'];
        
        if(isset($data['password'])){
            $user->password = bcrypt($data['password']);
        }

        $user->update();

        return redirect('/account' . '/' . $user->email)
            ->with('success', 'Account ' . $user->name . ' updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
