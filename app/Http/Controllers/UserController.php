<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Requests, Input, Auth, Hash;
use App\Http\Requests\UserRequest;
use App\User;
class UserController extends Controller
{
 	public function getAdd() {
 		return view('admin.user.add');
 	}
 	public function postAdd(UserRequest $request) {
 		$User = new User();
 		$User->username = $request->txtUser;
 		$User->email = $request->txtEmail;
 		$User->password = Hash::make($request->txtPass);
 		$User->level = $request->rdoLevel;
 		$User->remember_token = $request->_token;
 		$User->save();
 		return redirect()->route('admin.user.getList');
 	}
 	public function getList() { 		
 		$users = User::select('id','username','email','level')->orderBy('id','DESC')->get()->toArray();
 		return view ('admin.user.list',compact('users'));
 	}
 	public function getDelete() {
 		# code...
 	}
 	public function getEdit($id) {
 		$user = User::find($id);
 		return view('admin.user.edit',compact('user'));
 	}
 	public function postEdit() {
 		# code...
 	}
}
