<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input, Auth, Hash;
use App\Http\Requests\UserRequest;
use App\User;
class UserController extends Controller
{
 	public function getAdd() {
 		$userCurrentLogin = Auth::user();
 		if($userCurrentLogin->level <= 2){
 			return view('admin.user.add',compact('userCurrentLogin'));
 		}else{
 			return redirect()->back()->with(['flash_level' => 'danger','flash_message' => 'Sorry !! Forbidden access']);
 		}
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
 	public function getDelete($id) {
 		$userCurrentLogin = Auth::user();
 		$user = User::find($id);
 		if($userCurrentLogin->level < $user["level"]){
			$user->delete($id);
			return redirect()->route('admin.user.getList')->with(['flash_level' => 'success','flash_message' => 'Success !! Delete user complete']);		
 		}else{
 			return redirect()->route('admin.user.getList')->with(['flash_level' => 'danger','flash_message' => 'Sorry !! Forbidden access']);		
 		}
 	}
 	public function getEdit($id) {
 		$userCurrentLogin = Auth::user();
 		$user = User::find($id);
 		if($userCurrentLogin->level < $user["level"] || $userCurrentLogin['id'] == $user['id']){
			return view('admin.user.edit',compact('user'));
 		}else{
 			return redirect()->route('admin.user.getList')->with(['flash_level' => 'danger','flash_message' => 'Sorry !! Forbidden access']);		
 		} 		
 	}
 	public function postEdit($id, Request $request) {
 		$user = User::find($id);
 		if($request->input('txtPass')){
 			$this->validate($request, 
 				[
 					'txtRePass' => 'required|same:txtPass',
 				],
 				[
 					'txtRePass.same' => 'Repassword not same'
 				]
 			);
 			$pass = $request->input('txtPass');
 			$user->password = Hash::make($pass); 			
 		}
 		$user->email = $request->txtEmail;
 		$user->level = $request->rdoLevel;
 		$user->remember_token = $request->input('_token');
 		$user->save();
		return redirect()->route('admin.user.getList')->with(['flash_level' => 'success','flash_message' => 'Success !! Update user complete']);		 		
 	}
}
