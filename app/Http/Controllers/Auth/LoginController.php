<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login.index');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)->mixedCase()]
        ]);

        if($validator->fails()){
            return back()
                ->with('errors', $validator->messages()->all()[0])
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])) {
            return redirect()->intended('home');
        }else {
            return back()
                ->with('errors', 'User or password incorrect.')
                ->withInput();
        }
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
