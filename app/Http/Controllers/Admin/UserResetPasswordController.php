<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Helper;
use Carbon\Carbon;
use App\Mail\ResetPassword;
use App\Mail\SuccessPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserResetPasswordController extends Controller
{
    // display form
    public function showLinkRequestForm($id)
    {        
        $user = User::find($id);
        if (@$user->email)
            return view('auth.passwords.email', compact('user'));
        else{
            Session::flash('flash_message', 'User does not have a registered email.');
            Session::flash('flash_message_type', 'warning');
            return redirect('admin/users');
        }
    }

    //form with out token 
    public function validatePasswordRequest(Request $request)
    {
        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => Helper::getToken(),
        'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)
            ->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            // return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
            Session::flash('flash_message', 'A reset link has been sent to your email address.');
            Session::flash('flash_message_type', 'success');
        } else {
            // return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
            Session::flash('flash_message', 'A Network Error occurred. Please try again.');
            Session::flash('flash_message_type', 'warning');
        }

        return redirect('admin/users');
    }

    private function sendResetEmail($email, $token)
    {
        $user = User::where('email', $email)
            ->select('email')
            ->first();

        $link = url('password/reset/' . $token ). '?email=' . urlencode($user->email);

        try {
            Mail::to($user->email)->send(new ResetPassword($user, $link));
            
            if(Mail::failures()){
                Session::flash('flash_message', Mail::failures());
                Session::flash('flash_message_type', 'warning');

                return redirect('reset_password_without_token');
            }else
                return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function resetPassword(Request $request)
    {
        $v= Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required' 
        ]);

        if ($v && $v->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
        
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)

            ->first();
        
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
    
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
    
        $user->password = \Hash::make($password);
        $user->save();

        Session::flash('flash_message', 'Reset link was sended');
        Session::flash('flash_message_type', 'success');

        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        if ($this->sendSuccessEmail($tokenData->email)) {
            return redirect('admin/users');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendSuccessEmail($email)
    {
        Mail::to($email)->send(new SuccessPassword());

        if(Mail::failures())
            return false;
        else
            return true;
    }
}
