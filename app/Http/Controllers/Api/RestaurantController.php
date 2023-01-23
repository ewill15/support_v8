<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RestaurantResource;

class RestaurantController extends Controller
{
    /** Lista de registros de restaurants */
    public function list_restaurants(Request $request)
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
                $registers = Restaurant::with(['user'])->get();
                foreach ($registers as $register) {
                    $result_register = new RestaurantResource($register);
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
    public function set_restaurant(Request $request)
    {
        $responseCode = 200;
        $v = Validator::make($request->all(), [
        'access_token' => 'required|exists:users,access_token',
        'name' => 'required|string',
        'address' => 'required|string',
        'open_daytime' => 'required',
        'close_daytime' => 'required'
        ]);
        if ($v && $v->fails()) {
            $result = [
                'detail' => 'Register web not added',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
        $fields = $request->all();
        $user = User::byAccessToken($request->access_token)->user()->first();
        if($user){
            $fields['user_id'] = $user->id;
        }
        $register_web = Restaurant::create($fields);
        $result = new RestaurantResource($register_web);             
        }
        return response()->json($result, $responseCode);
    }

    /** editar datos restaurant*/
    public function edit_restaurant(Request $request)
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
                $register_web_edit = Restaurant::where('id',$request->id)->first();

                $register_web_edit->update($fields);
                $result = new RestaurantResource($register_web_edit);
                
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
    public function delete_restaurant(Request $request)
    {
        $responseCode = 200;        
        $v = Validator::make($request->all(), [
            'access_token' => 'required|exists:users,access_token',
            'id' => 'required|exists:restaurants,id',            
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'Deleted Restaurnat',
                'detail' => 'El restaurant no pudo ser eliminado',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->admin()->first();
            if($user){
                $restaurant_app = Restaurant::find($request->id);
                $restaurant_app->delete();
                $result = [
                    'code' => 'Deleted Restaurant',
                    'detail' => 'Restaurant eliminado'
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
