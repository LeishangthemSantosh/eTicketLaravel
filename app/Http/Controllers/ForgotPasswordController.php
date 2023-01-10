<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\AuthUser;
use App\Models\PasswordReset;
use App\Mail\ResetPassword;

class ForgotPasswordController extends Controller
{
    //
    public function forgotPassword()
    {

        return view('auth.forgot_password');
    }
    public function submitForgotPassword(Request $request)
    {


        $token = Str::random(64);
        $reset_pss = new PasswordReset();
        $reset_pss->email = $request->email;
        $reset_pss->token = $token;
        $reset_pss->created_at = Carbon::now();
        $reset_pss->save();

        
        Mail::to($reset_pss['email'])->send(new ResetPassword($reset_pss));

        return back()->with('message', 'We have emailed reset password link');
    }


    public function resetPassword($id)
    {
        $rst_pswrd =PasswordReset::find($id);
        
        return view('auth.reset_password',compact('rst_pswrd'));
    }

    
    public function submitResetPassword(Request $request)
    {
        $updatePassword = DB::table('password_resets')->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = AuthUser::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
