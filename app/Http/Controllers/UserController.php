<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formField = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6', 'max:14']
        ]);

        //Hash Password
        $formField['password'] = bcrypt($formField['password']);
        
        //Store User
        $user = User::create($formField);

        //login user
        auth()->login($user);

        return redirect('/')->with(['message' => 'User created and Logged in!']);
    }

    
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with(['message' => 'Successfully Logout!']);
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {

        $formField = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formField)){
            $request->session()->regenerate();

            return redirect('/')->with(['message' => 'Logged In!']);
        }else{
            return redirect('/login')->withErrors(['email' => 'Invalid Credential!'])->onlyInput('email');
        }
    }
    //End
}
