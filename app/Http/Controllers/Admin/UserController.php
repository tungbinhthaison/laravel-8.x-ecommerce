<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Access\UserAccess;

class UserController extends Controller
{
    private $userAccess;

	public function __construct(
        UserAccess $userAccess
    )
	{
        $this->userAccess  = $userAccess;
    }
    
    public function index(){  
        return view('admin.user.index');
    }

    public function add(){
        return view('admin.user.add');
    }

    public function store(Request $request){

        $array_value = [
            'username' => $request->input_username,
            'password' => md5($request->input_password),
            'name'     => $request->input_name,
            'email'    => $request->input_email,
            'status'   => !empty($request->cb_publish_user)
        ];

        $this->userAccess->store($array_value);
        return redirect('/admin/user/index');

    }

    public function edit($id){
        $compact['user'] = $this->userAccess->getById($id);
        return view('admin.user.edit', $compact);
    }

    public function update(Request $request, $id){

        $array_value = [
            'username' => $request->input_username,
            'name'     => $request->input_name,
            'email'    => $request->input_email,
            'status'   => !empty($request->cb_publish_user)
        ];

        $this->userAccess->update($array_value, $id);
        return redirect('/admin/user/index');
        
    }
}
