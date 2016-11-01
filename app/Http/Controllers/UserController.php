<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    

    public function getlist()
    {
    	$user = User::select('id','username','level')->orderBy('id','DESC')->get();
    	return view('admin.user.list',compact('user'));
    }

    public function getadd() 
    {
    	return view('admin.user.add');
    }

    public function postadd(UserRequest $request)
    {
    	$user = new User();
    	$user->username = $request->txtUser;
    	$user->password = Hash::make($request->txtPass);
    	$user->email = $request->txtEmail;
    	$user->level = $request->rdoLevel;
    	$user->remember_token =	$request->_token;
    	$user->save();
    	return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add User ']);
    }

    public function getdelete($id)
    {
        $user_current_login = Auth::user()->id;
    	$user = User::find($id);
        if(($id == 2) || ($user_current_login !=2 && $user['level'] == 1))
        {
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Sorry !! You Can\'t Access Delete User ']);
        }
        else
        {
            $user->delete($id);
            return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete User ']);
        }
    }

    public function getedit($id)
    {
        $data = User::find($id);
        if((Auth::user()->id !=2) && ($id==2 || ($data['level'] == 1 && (Auth::user()->id != $id))))
        {
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Sorry !! You Can\'t Access Edit User ']);
        }
    	   return view('admin.user.edit',compact('data','id'));
    }

    public function postedit($id, Request $request)
    {
        $user = User::find($id);
        if($request->input('txtPass')){
            $this->validate($request,
            [
                'txtRePass'=>'same:txtPass'
            ],
            [
                'txtRePass.same'=>'Two Password Don\'t Match'
            ]);
            $pass = $request->input('txtRePass');
            $user->password = Hash::make($pass);
        }
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit User ']);
    }
}
