<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $namespace = 'App\Http\Controllers';

    # GET

    public function registrationForm()
    {
        return view('auth.register');
    }

    # POST

    public function registerUser(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'first_name'     => 'required|max:255',
            'last_name'     => 'required|max:255',
            'username'          => 'required|max:20',
            'email'             => 'required|email|unique:users|max:255',
            'password'          => 'required|max:20'
        ]);

        if ($validate->fails()) {

            return redirect()
                ->back()
                ->withErrors($validate);
        }

        User::create([
            'password'   => Hash::make($request->password),
            'email'      => $request->email,
            'first_name'     => $request->first_name,
            'last_name'     => $request->last_name,
            'username'    => $request->username
        ]);

        return redirect('/register')->with('success', 'Registro Exitoso');
    }

    # @GET

    public function loginForm()
    {
        return view('auth.login');
    }

    # @POST

    public function login(Request $request)
    {        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
      
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {     
            return redirect('admin/dashboard');
        }
        

        return redirect('/login')->with('error', 'Email o contraseña incorrecta');
    }

    # GET

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }
        return  redirect('/login');
    }
}

