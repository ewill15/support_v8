<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    # GET

    public function registrationForm()
    {
        return view('custom_auth.register');
    }

    # POST

    public function registerUser(Request $request)
    {

        $validate = \Validator::make($request->all(), [
            'nombre'    => 'required|max:255',
            'apellido'  => 'required|max:255',
            'usuario'   => 'required|max:20',
            'email'     => 'required|email|unique:users|max:255',
            'password'  => 'required|confirmed|max:20'

        ]);

        if ($validate->fails()) {

            return redirect()
                ->back()
                ->withErrors($validate);
        }

        \App\User::create([
            'password'   => Hash::make($request->password),
            'email'      => $request->email,
            'nombre'     => $request->nombre,
            'apellido'   => $request->apellido,
            'usuario'    => $request->usuario
        ]);

        return redirect('/register')->with('success', 'Registro Exitoso');
    }

    # @GET

    public function loginForm()
    {
        return view('custom_auth.login');
    }

    # @POST

    public function login(Request $request)
    {        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            
            return redirect('/admin/dashboard');
        }

        return redirect('/login')->with('error', 'Email o contraseña incorrecta');
    }

    # GET

    public function logout(Request $request)
    {
        if (\Auth::check()) {
            \Auth::logout();
            $request->session()->invalidate();
        }
        return  redirect('/login');
    }
}
