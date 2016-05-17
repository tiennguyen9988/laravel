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
    	$Cate->parent_id = $request->sltParent;
    	$Cate->keywords = $request->txtKeywords;
    	$Cate->description = $request->txtDescription;
    	$Cate->Save();
    	return redirect()->route('admin.cate.getList')->with(["flash_message"=>"Success!! Complete Add Category","flash_level"=>"success"]);
    }
    public function getDelete($id){
        $countParent = Category::where("parent_id",$id)->count();
        if($countParent>0){
            return redirect()->route('admin.cate.getList')->with(["flash_message"=>"Error!! Cannot remove, category is parent's other categories","flash_level"=>"danger"]);
        }else{
            Category::find($id)->delete();
            return redirect()->route('admin.cate.getList')->with(["flash_message"=>"Success!! Delete complete","flash_level"=>"success"]);
        }
    }
    public function getEdit($id){
        $data = Category::findOrFail($id)->toArray();
        $parent = Category::select('id','name','parent_id')->where('id','<>',$id)->get()->toArray();
        return view('admin.cate.edit',compact('data', 'parent', 'id'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ["txtCateName"=>"required"],
            ["txtCateName.required"=>"Category Empty"]
        );
        $Cate = Category::find($id);
        $Cate->name = $request->txtCateName;
        $Cate->alias = changeTitle($request->txtCateName);
        $Cate->order = $request->txtOrder;
        $Cate->parent_id = $request->sltParent;
        $Cate->keywords = $request->txtKeywords;
        $Cate->description = $request->txtDescription;
        $Cate->Save();
        return redirect()->route('admin.cate.getList')->with(["flash_message"=>"Success!! Complete Update Category","flash_level"=>"success"]);
    }
}
