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
       $params = [
            'username' => $request->txt_username
           ,'password' => md5($request->txt_password)
        ];
        
       $account = DB::table('users')->where($params)->first();
       
       if( !empty($account) ){
            $request->session()->put('CurrentUser',$account);
            $this->rememberMe($account);
            return redirect('/admin/home')->with('success', 'Welcome admin');
       }

       return redirect()->back();
    }

    private function rememberMe($account){
        Cookie::forget('username');
        Cookie::forget('password');

        $lifeTime = 0.1; //minute
        if( !empty($remember) ){
            Cookie::queue('username', $account->username, $lifeTime);
            Cookie::queue('password', $account->password, $lifeTime);
        }

    }
}
