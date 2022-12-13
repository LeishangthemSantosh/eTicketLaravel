<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Models\AuthUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    //
    public function login()
    {

        return view('auth.user_login');
    }
    public function checklogin(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:5|max:12'

        ]);
        $user = AuthUser::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //if password match
                $request->session()->put('LoggedUser', $user->id);

                return redirect('user-profile');
            } else {
                return back()->with('fail', 'Invalid Password');
            }
        } else {
            return back()->with('fail', 'No account found ');
        }
    }

    function profile()
    {
        if (session()->has('LoggedUser')) {
            $user = AuthUser::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            return view('client.pages.profile', $data);
        }
    }

    public function logout()
    {

        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }



    public function registration()
    {

        return view('client.pages.registration');
    }

    public function storeRegister(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:12||confirmed'
        ]);

        $user = new AuthUser;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->status = 1;
        $user->password = Hash::make($request->password);
        $user->save();


        return $user;
    }
}
