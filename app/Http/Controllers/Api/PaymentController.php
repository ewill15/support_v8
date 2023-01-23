<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /** Lista de pagos */
    public function list_payments(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
        'access_token' => 'required|string|exists:users,access_token',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'payments couldn\'t be listed',
                'detail' => 'payments couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->user()->first();
            if($user){
                $result = [];
                $registers = Payment::with(['user','month'])->get();
                foreach ($registers as $register) {
                    $result_register = new PaymentResource($register);
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
    /** create new register */
    public function set_payment(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
        'access_token' => 'required|exists:users,access_token',
        'service_id' => 'required|exists:services,id',
        'month_id' => 'required|exists:months,id',
        'year' => 'required|numeric|min:2005',
        'amount' => 'required|numeric|min:0'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Payment not added',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
        $fields = $request->all();
        $user = User::byAccessToken($request->access_token)->user()->first();
        if($user){
            $fields['user_id'] = $user->id;
        }
        $register_web = Payment::create($fields);
        $result = new PaymentResource($register_web);             
        }
        return response()->json($result, $responseCode);
    }

    /** editar datos restaurant*/
    public function edit_payment(Request $request)
    {
        $responseCode = 200;
        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:payments,id'
        ]);
        if ($v && $v->fails()) {
        $result = [
            'code' => 'Payment not edited',
            'detail' => 'The payment does not edited',
            'errors' => $v->errors()
        ];
        $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->user() 
                ->first();
            if($user){
                $fields = $request->all();
                $payment_edit = Payment::where('id',$request->id)->first();

                $payment_edit->update($fields);
                $result = new PaymentResource($payment_edit);
                
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

    /** eliminar restaurant */
    public function delete_payment(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:payments,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Payment',
                'detail' => 'El payment no pudo ser eliminado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->admin()->first();
            
            if($user){
                $payment_app = Payment::find($request->id);
                $payment_app->delete();
                $result = [
                    'code' => 'Deleted Payment',
                    'detail' => 'Payment eliminado'
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
