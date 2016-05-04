<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Category;
class ProductController extends Controller
{
    public function getAdd(){
    	$cate = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $request){

    }
}
