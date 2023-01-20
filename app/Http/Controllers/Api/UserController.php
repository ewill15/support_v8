<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  /** Login inicio de sesion  */
  public function login(Request $request)
  {
      $responseCode = 200;

      $v = Validator::make($request->all(), [
          'email' => 'required|email',
          'password' => 'required',
      ]);

      if ($v && $v->fails()) {
          $result = [
              'code' => 'LOGIN_UNSUCCESSFUL',
              'detail' => 'Login Unsuccessfully',
              'errors' => $v->errors(),
          ];
          $responseCode = 409;
      } else {
          if (
              Auth::attempt([
                  'email' => $request->email,
                  'password' => $request->password,
              ])
          ) {
              $user_find = Auth::user();
              $user_sp = User::with(['role'])->where('id',$user_find->id)->first();

              if ($user_sp->access_token == '' || $user_sp->access_token) {
                  $user_sp->access_token = Helper::getToken();
                  $user_sp->save();
              }
              $result = new UserResource($user_sp);
          } else {
              $result = [
                  'code' => 'Usuario y contraseña invalido',
                  'detail' => 'Error de usuario y contraseña',
              ];
              $responseCode = 409;
          }
      }
      
      return response()->json($result, $responseCode);
  }

  /** Cerrar sesion */
  public function logout(Request $request)
  {
      $responseCode = 200;

      $v = Validator::make($request->all(), [
        'access_token' => 'required|string|exists:users,access_token'
      ]);

      if ($v && $v->fails()) {
          $result = [
              'code' => 'LOGOUT_UNSUCCESSFUL',
              'detail' => 'Logout Unsuccessfully',
              'errors' => $v->errors(),
          ];
          $responseCode = 409;
      } else {
        $user = User::byAccessToken($request->access_token)->first();
        if($user){
            $user->access_token = null;
            $user->save();
            $result = [
                'code' => 'user logged out',
                'detail' => 'user logged out successfullly'
            ];
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

  /** cambiar password */
  public function update_password(Request $request)
  {
      $responseCode = 200;
      $v = Validator::make($request->all(), [
          'access_token' => 'required|string|exists:users,access_token',
          'new_password' => 'required|min:4'
      ]);
      if ($v && $v->fails()) {
          $result = [
              'code' => 'INCORRECT_ACCESS_TOKEN',
              'detail' => 'incorrect access token',
              'errors' => $v->errors()
          ];
          $responseCode = 409;
      } else {
          $user = User::byAccessToken($request->access_token)
              ->first();
          if ($user) {
              $user->password = bcrypt($request->new_password);
              $user->save();

              $result = [
                  'code' => 'PASSWORD UPDATED',
                  'detail' => 'Password actualizado'
              ];
          } else {
              $result = [
                  'code' => 'USER_DO_NOT EXIST',
                  'detail' => 'not exist'
              ];
              $responseCode = 409;
          }
      }

      return response()->json($result, $responseCode);
  }

  /** crear usuario */
  public function register_user(Request $request)
  {
      $responseCode = 200;
      $v = Validator::make($request->all(), [
          'first_name' => 'required|string',
          'last_name' => 'required|string',
          'username' => 'required',
          'email' => 'required|unique:users,email',
          'role'=> 'numeric'
      ]);
      if ($v && $v->fails()) {
          $result = [
              'detail' => 'Usuario no agregado',
              'errors' => $v->errors()
          ];
          $responseCode = 409;
      } else {
        $fields = $request->all();
        if($request->role_id)
        $fields['password'] = bcrypt($request->password);
        $fields['access_token'] = '';
        
        $user = User::create($fields);
        // dd($fields);
        $result = new UserResource($user);
          
      }
      return response()->json($result, $responseCode);
  }
  /** editar usuario */
  public function edit_user(Request $request)
  {
     $responseCode = 200;
     
     $v = Validator::make($request->all(), [
         'access_token' => 'required|exists:users,access_token',
         'id' => 'required|exists:users,id'
     ]);
     if ($v && $v->fails()) {
     $result = [
         'code' => 'User not edited',
         'detail' => 'El usuario no fue editado',
         'errors' => $v->errors()
     ];
     $responseCode = 409;
     } else {
         $user = User::byAccessToken($request->access_token)
             ->admin() 
             ->first();
         if($user){
             $fields = $request->all();
             $user_edit = User::byId($request->id)->first();

             $user_edit->update($fields);
             $result = new UserResource($user_edit);
             
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

  /** eliminar usuario */
  public function delete_user(Request $request)
  {
      $responseCode = 200;        
      $v = Validator::make($request->all(), [
          'access_token' => 'required|exists:users,access_token',
          'id' => 'required|exists:users,id',            
      ]);
      if ($v && $v->fails()) {
          $result = [
              'code' => 'Deleted User',
              'detail' => 'El usuario no pudo ser eliminado',
              'errors' => $v->errors()
          ];
          $responseCode = 409;
      } else {
          $user = User::byAccessToken($request->access_token)->get();
          if($user){
              $user_app = User::find($request->id);
              $user_app->delete();
              $result = [
                  'code' => 'Deleted User',
                  'detail' => 'Usuario eliminado'
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

  /** Lista de usuarios */
  public function list_users(Request $request)
  {
      $responseCode = 200;

      $v = Validator::make($request->all(), [
          'access_token' => 'required|string|exists:users,access_token',
      ]);
      if ($v && $v->fails()) {
          $result = [
              'code' => 'users couldn\'t be listed',
              'detail' => 'users couldn\'t be listed',
              'errors' => $v->errors()
          ];
          $responseCode = 409;
      } else {
          $user = User::byAccessToken($request->access_token)->first();
          if($user){
              $result = [];
              $users = User::users()->get();
              foreach ($users as $user) {
                  $result_user = new UserResource($user);
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
}
