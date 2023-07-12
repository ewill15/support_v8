<?php

namespace App\Http\Controllers\Api;

use App\Helper;
use App\Models\User;
use App\Models\Pasanaku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PasanakuResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /** Login inicio de secion  */
    public function login(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($v && $v->fails()) {
            $result = [
                'code' => 'LOGIN_UNSUCCESSFUL',
                'detail' => 'Login Unsuccessfully',
                'errors' => $v->errors(),
            ];
            $responseCode = 409;
        } else {
            if (
                Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password,
                ])
            ) {
                $user_find = Auth::user();
                $user_sp = User::find($user_find->id);

                if ($user_sp->access_token == '' || $user_sp->access_token) {
                    $user_sp->access_token = Helper::getToken();
                    $user_sp->save();
                }
                $result = new UserResource($user_sp);
            } else {
                $result = [
                    'code' => 'Usuario y contraseña invalido',
                    'detail' => 'Error de usuario y contraseña',
                ];
                $responseCode = 409;
            }
        }
        
        return response()->json($result, $responseCode);
    }
    /** crear usuario participante */
    public function register_user(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'cellphone'=>'required|string',
            'email' => 'unique:users,email'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Usuario Participante no agregado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $fields = $request->all();
            $allow = ['president','admin'];
            if(\in_array($request->role,)){
                if (isset($request->image)) {
                    if (strlen($request->image) > 0) {
                        $fields['image'] = Helper::saveBase64Image($request->image, 'users_images');
                    } else {
                        $fields['image'] = "";
                    }
                }
                $fields['role'] = 'user';
                $fields['access_token'] = '';
                
                $user = User::create($fields);
                $result = new UserResource($user);
            }else{

            }
        }
        return response()->json($result, $responseCode);
    }

    /** Lista de palabras en el dictionario */
    public function list_users(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'users couldn\'t be listed',
                'detail' => 'users couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $users = User::users()->get();
                foreach ($users as $user) {
                    $result_user = new UserResource($user);
                    array_push($result, $result_user);
                }
            }else{
                $result = [
                    'code' => 'user not founded',
                    'detail' => 'user not founded'
                ];
                $responseCode = 409;
            }
        }

        return response()->json($result, $responseCode);
    }

}
