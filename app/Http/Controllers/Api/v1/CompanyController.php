<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /** Lista de empresas registradas */
    public function list_companies(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'companies couldn\'t be listed',
                'detail' => 'companies couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $registers = Company::orderBy('id','desc')->get();
                foreach ($registers as $register) {
                    $result_register = new CompanyResource($register);
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

    /** Buscar empresa */
    public function search_company(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'search' => 'required|string',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'companies couldn\'t be listed',
                'detail' => 'companies couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $search = $request->search;
                $companies = Company::where('name','LIKE','%'.$search.'%')
                    ->orWhere('type','LIKE','%'.$search.'%')
                    ->orWhere('area','LIKE','%'.$search.'%')
                    ->get();
                foreach ($companies as $company) {
                    $result_company = new CompanyResource($company);
                    array_push($result, $result_company);
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

    /** Agregar empresa */
    public function add_company(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'name' => 'required|string',
            'address' => 'required|string',
            'nit'=> 'required',
            'phone'=> 'required',
            'area' => 'required'
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
                if(!isset($fields["type"])){
                    $fields["type"] = "Casa Matriz";
                }
                $register = Company::create($fields);
                $result = new CompanyResource($register);
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

    /** Editar empresa */
    public function edit_company(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'company_id' => 'required|exists:companies,id'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Companies couldn\'t be listed',
                'detail' => 'Companies couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $fields = $request->all();

                $company = Company::find($request->company_id);
                $company->update($fields);
                
                $result = new CompanyResource($company);
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

    /** Eliminar empresa */
    public function remove_company(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'company_id' => 'required|exists:companies,id'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'companies couldn\'t be listed',
                'detail' => 'companies couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $fields = $request->all();

                $register = Company::find($request->bank_id)->delete();
                if($register)
                {
                    $result = [
                        'detail' => 'company was successfully deleted'
                    ];}
                else{
                    $result = [
                        'detail' => 'ERROR company does not was deleted'
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
