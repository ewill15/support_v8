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
}
