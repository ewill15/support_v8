<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Machine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MachineResource;
use Illuminate\Support\Facades\Validator;

class MachineController extends Controller
{
    /** Lista de PCs registradas */
    public function list_machines(Request $request)
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
                $machines = Machine::orderBy('id','desc')->get();
                foreach ($machines as $machine) {
                    $result_machine = new MachineResource($machine);
                    array_push($result, $result_machine);
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

    /** Buscar machine */
    public function search_machine(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'search' => 'required|string',
        ]);
        if ($v && $v->fails()) {
            $result = [
                'code' => 'machines couldn\'t be listed',
                'detail' => 'machines couldn\'t be listed',
                'errors' => $v->errors()
            ];
            $responseCode = 409;
        } else {
            $user = User::byAccessToken($request->access_token)->first();
            if($user){
                $result = [];
                $search = $request->search;
                $companies = Machine::where('processor','LIKE','%'.$search.'%')
                    ->orWhere('operative_system','LIKE','%'.$search.'%')
                    ->orWhere('owner','LIKE','%'.$search.'%')
                    ->get();
                foreach ($companies as $company) {
                    $result_company = new MachineResource($company);
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

    /** Agregar machine */
    public function add_machine(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            // 'motherboard' => 'required|string',
            // 'processor' => 'required|string',
            'ip' => 'required|string',
            // 'operative_system' => 'required|string',
            // 'mail_address' => 'required|string',
            // 'office_package' => 'required|string',
            // 'other' => 'required|string',
            // 'owner' => 'required|string'
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
                // dd($fields);
                $register = Machine::create($fields);
                $result = new MachineResource($register);
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

    /** Editar machine */
    public function edit_machine(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'machine_id' => 'required|exists:machines,id'
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

                $machine = Machine::find($request->machine_id);
                $machine->update($fields);
                
                $result = new MachineResource($machine);
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

    /** Eliminar machine */
    public function remove_machine(Request $request)
    {
        $responseCode = 200;

        $v = Validator::make($request->all(), [
            'access_token' => 'required|string|exists:users,access_token',
            'machine_id' => 'required|exists:machines,id'
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

                $register = Machine::find($request->machine_id)->delete();
                if($register)
                {
                    $result = [
                        'detail' => 'machine was successfully deleted'
                    ];}
                else{
                    $result = [
                        'detail' => 'ERROR machine does not was deleted'
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
