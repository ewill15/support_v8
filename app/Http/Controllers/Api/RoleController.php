<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /** create new role */
    public function set_role(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Role no agregado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $fields = $request->all();
            $user = Role::create($fields);
            $result = new RoleResource($user);
            
        }
        return response()->json($result, $responseCode);
    }

    /** Lista de roles creados */
    public function list_roles(Request $request)
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
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $roles = Role::get();
                foreach ($roles as $role) {
                    $result_role = new RoleResource($role);
                    array_push($result, $result_role);
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

    /** editar role */
    public function edit_role(Request $request)
    {
        $responseCode = 200;
        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:users,id'
        ]);
        if ($v && $v->fails()) {
        $result = [
            'code' => 'User not edited',
            'detail' => 'El usuario no fue editado',
            'errors' => $v->errors()
        ];
        $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->admin() 
                ->first();
            if($user){
                $fields = $request->all();
                $role_edit = Role::byId($request->id)->first();

                $role_edit->update($fields);
                $result = new RoleResource($role_edit);
                
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

    /** eliminar role */
    public function delete_role(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:users,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Role',
                'detail' => 'El role no pudo ser eliminado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $role_app = Role::find($request->id);
                $role_app->delete();
                $result = [
                    'code' => 'Deleted Role',
                    'detail' => 'Role eliminado'
                ];
            }else{
                $responseCode =  409;
                $result = [
                    'code' => 'User not found',
                    'detail' => 'No existe el usuario'
                ];
            }
        }

        return response()->json($result, $responseCode);
    } 
}
