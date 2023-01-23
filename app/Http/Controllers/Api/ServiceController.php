<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /** Lista de services */
    public function list_services(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
        'access_token' => 'required|string|exists:users,access_token',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'services couldn\'t be listed',
                'detail' => 'services couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->user()->first();
            if($user){
                $result = [];
                $registers = Service::with(['user'])->get();
                foreach ($registers as $register) {
                    $result_register = new ServiceResource($register);
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
    /** create new service */
    public function set_service(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
        'access_token' => 'required|exists:users,access_token',
        'name' => 'required',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Service not added',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $fields = $request->all();
            $user = User::byAccessToken($request->access_token)->user()->first();
            if($user){
                $register_web = Service::create($fields);
                $result = new ServiceResource($register_web);
            }else{
                $result = [
                    "detail"=>"Forbidden"
                ];
            }
            
        }
        return response()->json($result, $responseCode);
    }

    /** editar datos restaurant*/
    public function edit_service(Request $request)
    {
        $responseCode = 200;
        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:services,id'
        ]);
        if ($v && $v->fails()) {
        $result = [
            'code' => 'Service not edited',
            'detail' => 'The service web does not edited',
            'errors' => $v->errors()
        ];
        $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)
                ->user() 
                ->first();
            if($user){
                $fields = $request->all();
                $service_edit = Service::where('id',$request->id)->first();

                $service_edit->update($fields);
                $result = new ServiceResource($service_edit);
                
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

    /** eliminar service */
    public function delete_service(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:services,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Service',
                'detail' => 'El servicio no pudo ser eliminado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->admin()->get();
            if($user){
                $service_app = Service::find($request->id);
                $service_app->delete();
                $result = [
                    'code' => 'Deleted Service',
                    'detail' => 'Service eliminado'
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
