<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AuthenticationRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Cookie;

class AuthenticationController extends Controller
{
    public function getLogin(){
        $compact['username']  = !empty( Cookie::get('username') ) ? Cookie::get('username') : old('txt_username');
        $compact['password']  = !empty( Cookie::get('password') ) ? Cookie::get('password') : null;
        $compact['remmember'] = !empty( Cookie::get('username') ) ? 'checked' : null;
        return view('admin.authentication.login', $compact);
    }

    public function postLogin(AuthenticationRequest $request){
       $comparision = [
            'username' => $request->txt_username
           ,'password' => md5($request->txt_password)
        ];
        
       $account = DB::table('users')->where($comparision)->count();

       if( !empty($account) ){
            $this->rememberMe($request->txt_username, $request->txt_password, $request->cb_remember_password);
            return redirect('/admin/home')->with('success', 'Welcome admin');
       }
    }

    private function rememberMe($username, $password, $remember){
        Cookie::forget('username');
        Cookie::forget('password');

        if( !empty($remember) ){
            $lifeTime = 0.1; //minute
            Cookie::queue('username', $username, $lifeTime);
            Cookie::queue('password', $password, $lifeTime);
        }
    }
}
