<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CateRequest;
use App\Category;
class CateController extends Controller
{    
	public function getList(){        
        $data = Category::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}
    public function getAdd(){
        $parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.add',compact('parent'));
    }
    public function postAdd(CateRequest $request){
    	$Cate = new Category;
    	$Cate->name = $request->txtCateName;
    	$Cate->alias = changeTitle($request->txtCateName);
    	$Cate->order = $request->txtOrder;
    	$Cate->parent_id = 1;
    	$Cate->keywords = $request->txtKeywords;
    	$Cate->description = $request->txtDescription;
    	$Cate->Save();
    	return redirect()->route('admin.cate.getList')->with(["flash_message"=>"Success!! Complete Add Category","flash_level"=>"success"]);
    }
    public function getDelete($id){

    }
    public function getEdit($id){

    }
    public function postEdit(CateRequest $request){

    }
}
