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
}
