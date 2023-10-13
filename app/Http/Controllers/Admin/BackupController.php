<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{
    public function export(Request $request){
        $auth_user = Auth::user();

        if ($auth_user->user_role !== 'admin') {
            abort(403, "Sorry, You're not authorized to do this.");
            return;
        }
        
        $db_name = env('DB_DATABASE');
        $db_user = env('DB_USERNAME');
        $db_password = env('DB_PASSWORD');
        $today = date('Y-m-d');        

        $command = "mysqldump --user={$db_user} --password={$db_password} {$db_name} > {$db_name}-{$today}.sql";
        // dd($db_name,$db_user,$db_password,$today);
        exec($command);
        return response()->download("{$db_name}-{$today}.sql")->deleteFileAfterSend(true);
    }

    public function export_table(Request $request){
        $auth_user = Auth::user();

        if ($auth_user->user_role !== 'admin') {
            abort(403, "Sorry, You're not authorized to do this.");
            return;
        }
        
        $db_name = env('DB_DATABASE');
        $db_user = env('DB_USERNAME');
        $db_host = env('DB_HOST');
        $db_password = env('DB_PASSWORD');
        $today = date('Y-m-d');        

        $command = "mysqldump --user={$db_user} --host={$db_host} --password={$db_password} {$db_name} {$request->table_name} > {$db_name}-{$today}-{$request->table_name}.sql";
        // dd($command);
        exec($command);
        return response()->download("{$db_name}-{$today}-{$request->table_name}.sql")->deleteFileAfterSend(true);
    }
}
