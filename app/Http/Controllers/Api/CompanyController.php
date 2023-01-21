<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /** create new company */
    public function set_company(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'nit' => 'required|numeric'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Company not added',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $fields = $request->all();
            $user = Company::create($fields);
            $result = new CompanyResource($user);
            
        }
        return response()->json($result, $responseCode);
    }

    /** Lista de companies creadas */
    public function list_companies(Request $request)
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
                $companys = Company::get();
                foreach ($companys as $company) {
                    $result_company = new CompanyResource($company);
                    array_push($result, $result_company);
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

    /** editar company */
    public function edit_company(Request $request)
    {
        $responseCode = 200;
        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:users,id'
        ]);
        if ($v && $v->fails()) {
        $result = [
            'code' => 'Company not edited',
            'detail' => 'The company does not edited',
            'errors' => $v->errors()
        ];
        $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->admin() 
                ->first();
            if($user){
                $fields = $request->all();
                $company_edit = Company::byId($request->id)->first();

                $company_edit->update($fields);
                $result = new CompanyResource($role_edit);
                
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

    /** eliminar company */
    public function delete_company(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:users,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Company',
                'detail' => 'La company no pudo ser eliminada',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->get();
            if($user){
                $company_app = Company::find($request->id);
                $company_app->delete();
                $result = [
                    'code' => 'Deleted Company',
                    'detail' => 'Company eliminada'
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
