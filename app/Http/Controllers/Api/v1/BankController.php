<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Bank;
use App\Models\User;
use App\Models\SaleClothes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use App\Http\Resources\ReportFullResource;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    /** Lista de bancos registrados */
    public function list_bank(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'banks couldn\'t be listed',
                'detail' => 'banks couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $registers = Bank::get();
                foreach ($registers as $register) {
                    $result_register = new BankResource($register);
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

    /** Buscar bancos */
    public function search_bank(Request $request)
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
                $registers = Bank::where('name','LIKE','%'.$search.'%')
                    ->get();
                foreach ($registers as $register) {
                    $result_register = new BankResource($register);
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

    /** Agregar cuenta de banco */
    public function add_bank(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'name' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|min:6',
            'observation' => 'string',
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

                $register = Bank::create($fields);
                $result = new BankResource($register);
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

    /** Editar banco */
    public function edit_bank(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'bank_id' => 'required|exists:banks,id'
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

                $bank = Bank::find($request->bank_id);
                $bank->update($fields);
                $result = new BankResource($bank);
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

    /** Eliminar banco */
    public function remove_bank(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'bank_id' => 'required|exists:banks,id'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'banks couldn\'t be listed',
                'detail' => 'banks couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $fields = $request->all();

                $register = Bank::find($request->bank_id)->delete();
                if($register)
                {
                    $result = [
                        'detail' => 'account bank was successfully deleted'
                    ];}
                else{
                    $result = [
                        'detail' => 'ERROR account bank does not was deleted'
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

    /** Lista de bancos registrados */
    public function list_sumary(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'banks couldn\'t be listed',
                'detail' => 'banks couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $registers = SaleClothes::summaryByDate()->get();
                foreach ($registers as $register) {
                    $result_register = new ReportFullResource($register);
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
}
