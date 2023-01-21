<?php

namespace App\Http\Controllers\Api;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    /** Lista de registros de restaurants */
    public function list_dishs(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
        'access_token' => 'required|string|exists:users,access_token',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'dishes couldn\'t be listed',
                'detail' => 'dishes couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->user()->first();
            if($user){
                $result = [];
                $dishes = Dish::with(['restaurant'])->get();
                foreach ($dishes as $dish) {
                    $result_dish = new DishResource($dish);
                    array_push($result, $result_dish);
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
    public function set_dish(Request $request)
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
        $dish_web = Dish::create($fields);
        $result = new DishResource($dish_web);             
        }
        return response()->json($result, $responseCode);
    }

    /** editar datos restaurant*/
    public function edit_dish(Request $request)
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
                $dish_web_edit = Dish::where('id',$request->id)->first();

                $dish_web_edit->update($fields);
                $result = new DishResource($dish_web_edit);
                
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
    public function delete_dish(Request $request)
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
            $user = User::byAccessToken($request->access_token)->admin()->get();
            if($user){
                $restaurant_app = Dish::find($request->id);
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
