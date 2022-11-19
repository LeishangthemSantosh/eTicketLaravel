<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Models\AuthUser;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    //
    public function login(){

        return view('auth.user_login');
       
    }
    public function checklogin(Request $request){
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:5|max:12'

        ]);
        $user = AuthUser::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //if password match
                $request->session()->put('LoggedUser',$user->id);

                return redirect('profile');
            } else {
                return back()->with('fail', 'Invalid Password');
            }
        } else {
            return back()->with('fail', 'No account found ');
        }

    }
    public function registration(){

        return view('client.pages.registration');
    }
    public function storeRegister(){
        
    }
}
