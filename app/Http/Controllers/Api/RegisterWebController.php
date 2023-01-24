<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterResource;
use Illuminate\Support\Facades\Validator;

class RegisterWebController extends Controller
{
    /** create new register */
    public function set_web_register(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
        'access_token' => 'required|exists:users,access_token',
        'page' => 'required|string',
        'username' => 'required|string',
        'password' => 'required',
        'user_id' => 'exists:users,id'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Register web not added',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
        $fields = $request->all();
        $fields['hash_password'] = bcrypt($request->password);
        $user = User::byAccessToken($request->access_token)->user()->first();
        if($user && !$request->user_id){
            $fields['user_id'] = $user->id;
        }
        $register_web = Register::create($fields);
        $result = new RegisterResource($register_web);             
        }
        return response()->json($result, $responseCode);
    }

    /** Lista de registros webs */
    public function list_web_registers(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
        'access_token' => 'required|string|exists:users,access_token',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'roles couldn\'t be listed',
                'detail' => 'roles couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->user()->first();
            if($user){
                $result = [];
                $registers = Register::with(['user'])->get();
                foreach ($registers as $register) {
                    $result_register = new RegisterResource($register);
                    array_push($result, $result_register);
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

    /** editar register web */
    public function edit_web_register(Request $request)
    {
        $responseCode = 200;
        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:register_web,id'
        ]);
        if ($v && $v->fails()) {
        $result = [
            'code' => 'Register web not edited',
            'detail' => 'The register web does not edited',
            'errors' => $v->errors()
        ];
        $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->user() 
                ->first();
            if($user){
                $fields = $request->all();
                $register_web_edit = Register::where('id',$request->id)->first();

                $register_web_edit->update($fields);
                $result = new RegisterResource($register_web_edit);
                
            }else{
                $result = [
                    'code' => 'Forbidden',
                    'detail' => 'El usuario no puede realizar la operacion',
                    'errors' => $v->errors()
                ];
                $responseCode = 409;
            }            
        }

        return response()->json($result, $responseCode);
    }

    /** eliminar register web */
    public function delete_web_register(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:register_web,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Register web',
                'detail' => 'El register web no pudo ser eliminada',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->admin()->first();
            if($user){
                $register_app = Register::find($request->id);
                $register_app->delete();
                $result = [
                    'code' => 'Deleted Register Web',
                    'detail' => 'Register Web eliminada'
                ];
            }else{
                $responseCode =  409;
                $result = [
                    'code' => 'User not found',
                    'detail' => 'User does not exist'
                ];
            }
        }

        return response()->json($result, $responseCode);
    }
}
