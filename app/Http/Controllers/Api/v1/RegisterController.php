<?php

namespace App\Http\Controllers\Api\v1;

use App\Helper;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterResource;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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

    /** Lista de registros web */
    public function list_web(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'rules couldn\'t be listed',
                'detail' => 'rules couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $registers = Register::get();
                foreach ($registers as $register) {
                    $result_register = new RegisterResource($register);
                    array_push($result, $result_register);
                }
            }else{
                $result = [
                    'code' => 'user not found',
                    'detail' => 'user not found'
                ];
                $responseCode = 409;
            }
        }

        return response()->json($result, $responseCode);
    }

    /** Buscar registros web */
    public function search_web(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'search' => 'required|string',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'rules couldn\'t be listed',
                'detail' => 'rules couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $search = $request->search;
                $registers = Register::where('page','LIKE','%'.$search.'%')
                    ->orWhere('url','LIKE','%'.$search.'%')
                    ->orWhere('username','LIKE','%'.$search.'%')
                    ->get();
                foreach ($registers as $register) {
                    $result_register = new RegisterResource($register);
                    array_push($result, $result_register);
                }
            }else{
                $result = [
                    'code' => 'user not found',
                    'detail' => 'user not found'
                ];
                $responseCode = 409;
            }
        }

        return response()->json($result, $responseCode);
    }

    /** Agregar registros web */
    public function add_web_register(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'url' => 'required|string',
            'page' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string|min:6',
            'description' => 'string',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'rules couldn\'t be listed',
                'detail' => 'rules couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $fields = $request->all();
                $fields['hash_password'] = bcrypt($request->password);
                $fields['date'] = Carbon::now();

                $register = Register::create($fields);
                $result = new RegisterResource($register);
            }else{
                $result = [
                    'code' => 'user not found',
                    'detail' => 'user not found'
                ];
                $responseCode = 409;
            }
        }

        return response()->json($result, $responseCode);
    }

    /** Editar registros web */
    public function edit_web_register(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'register_id' => 'required'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'rules couldn\'t be listed',
                'detail' => 'rules couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $fields = $request->all();

                $register = Register::find($request->register_id);
                $register->update($fields);
                $result = new RegisterResource($register);
            }else{
                $result = [
                    'code' => 'user not found',
                    'detail' => 'user not found'
                ];
                $responseCode = 409;
            }
        }

        return response()->json($result, $responseCode);
    }

    /** Editar registros web */
    public function remove_web_register(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'register_id' => 'required|exists:registers,id'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'rules couldn\'t be listed',
                'detail' => 'rules couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $fields = $request->all();

                $register = Register::find($request->register_id)->delete();
                if($register)
                {
                    $result = [
                        'detail' => 'register was successfully deleted'
                    ];}
                else{
                    $result = [
                        'detail' => 'ERROR register does not was deleted'
                    ];  
                }
            }else{
                $result = [
                    'code' => 'user not found',
                    'detail' => 'user not found'
                ];
                $responseCode = 409;
            }
        }

        return response()->json($result, $responseCode);
    }
}
