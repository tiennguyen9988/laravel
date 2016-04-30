<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function getAdd(){
    	return view('admin.product.add');
    }
    public function postAdd(ProductRequest $request){

    }
}
