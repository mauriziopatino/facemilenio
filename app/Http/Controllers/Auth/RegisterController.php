<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::all();
        return view('auth.register.create')->with(compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)->mixedCase()],
            'gender_id' => 'required',
            'birthdate' => 'required'
        ]);

        if($validator->fails()){
            return back()
                ->with('errors', $validator->messages()->all()[0])
                ->withInput();
        }

        $user = new User;
        $user->fill($data);
        $user->password = bcrypt($data['password']);
        $user->role_id = 1;

        // TODO Auth::user();
        $user->created_by = 1;
        $user->updated_by = 1;

        $user->save();

        return redirect('')
            ->with('success', 'Account ' . $user->name . ' created!');
    }
}
