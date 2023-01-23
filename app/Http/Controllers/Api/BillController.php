<?php

namespace App\Http\Controllers\Api;

use App\Models\Bill;
use App\Models\User;
use App\Models\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BillCodeResource;
use App\Http\Resources\BillResource;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    /** Lista de bills */
    public function list_bills(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'bills couldn\'t be listed',
                'detail' => 'bills couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $users = Bill::with(['company','user'])->get();
                foreach ($users as $user) {
                    $result_user = new BillResource($user);
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
    /** crear bill(factura) */
    public function set_bill(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
            'access_token'=>'required|exists:users,access_token',
            'invoice_number' => 'required',
            'control_code' => 'required',
            'date' => 'required',
            'price' => 'required|numeric',
            'company_id'=> 'required|exists:companies,id'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Bill no agregado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->user() 
                ->first();
            $fields = $request->all();
            if($user){
                $fields['user_id'] = $user->id;
                $fields['date'] = Helper::get_english_date($request->date);
                unset($fields['access_token']);

                $bill = Bill::create($fields);
                $result = new BillCodeResource($bill);
            }else{
                $result = [
                    'code' => 'Forbidden',
                    'detail' => 'El ususario no puede realizar la operacion',
                    'errors' => $v->errors()
                ];
                $responseCode = 409;
            }
        }
        return response()->json($result, $responseCode);
    }
    /** editar bill */
    public function edit_bill(Request $request)
    {
        $responseCode = 200;
        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:bills,id'
        ]);
        if ($v && $v->fails()) {
        $result = [
            'code' => 'Bill not edited',
            'detail' => 'El Bill no fue editado',
            'errors' => $v->errors()
        ];
        $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->admin()
                ->first();
            if($user){
                $fields = $request->all();
                $bill_edit = Bill::byId($request->id)->first();
                
                $bill_edit->update($fields);
                // dd($bill_edit);
                $result = new BillCodeResource($bill_edit);
            }else{
                $result = [
                    'code' => 'Forbidden',
                    'detail' => 'El ususario no puede realizar la operacion',
                    'errors' => $v->errors()
                ];
                $responseCode = 409;
            }            
        }

        return response()->json($result, $responseCode);
    }

    /** eliminar bill */
    public function delete_bill(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:bills,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Bill',
                'detail' => 'El bill no pudo ser eliminado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->admin()->first();
            if($user){
                $bill_app = Bill::find($request->id);
                $bill_app->delete();
                $result = [
                    'code' => 'Deleted Bill',
                    'detail' => 'Bill eliminado'
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
