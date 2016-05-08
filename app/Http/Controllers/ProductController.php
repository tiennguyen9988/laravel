<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Category;
use App\Product;
use App\ProductImage;
use Request, Input, File;

class ProductController extends Controller
{
    public function getAdd(){    	
    	$cate = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $request){
    	$fImagesName = $request->file('fImages')->getClientOriginalName();
    	$product = new Product();
    	$product->name = $request->txtName;
    	$product->alias = changeTitle($request->txtName);
    	$product->price = $request->txtPrice;
    	$product->intro = $request->txtIntro;
    	$product->content = $request->txtContent;
    	$product->image = $fImagesName;
    	$product->keywords = $request->txtKeywords;
    	$product->description = $request->txtDescription;
    	$product->user_id = 1;
    	$product->cat_id = $request->sltParent;
    	if(Input::hasFile('fImages')){$request->file('fImages')->move('resources/upload/',$fImagesName);}
        $product->save();
        $productId = $product->id;              
        if(Input::hasFile('fProductDetail')){
            foreach (Input::file('fProductDetail') as $file) {
                $productImg = new ProductImage;
                if(isset($file)){                    
                    $productImg->image = $file->getClientOriginalName();
                    $productImg->product_id = $productId;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $productImg->save();
                }
            }
        } 
        return redirect()->route('admin.product.getList')->with(["flash_message"=>"Success!! Complete Add Product","flash_level"=>"success"]);
    }
    public function getList(){
        $data = Product::select('id','name','price','cat_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }    
    public function getDelete($id){
        $productDetail = Product::find($id)->pimages->toArray();
        foreach ($productDetail as $key => $value) {
            File::delete('resources/upload/detail/'.$value["image"]);
        }
        $product = Product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.getList')->with(["flash_message"=>"Success!! Complete Add Product","flash_level"=>"success"]);
    }
    public function getEdit($id){
        $cate = Category::select('id','name','parent_id')->get()->toArray();
        $product = Product::find($id);
        $productImages = Product::find($id)->pimages->toArray();
        return view('admin.product.edit',compact('cate','product','productImages'));
    }
    public function postDelImg($id){
        if(Request::ajax()){
            $idImg = (int)Request::get('idImg');
            $imageDetail = ProductImage::find($idImg);
            if(!empty($imageDetail)){
                $img = 'resources/upload/detail/'.$imageDetail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $imageDetail->delete();
                return "Success";
            }            
        }
    }
    public function postEdit($id, Request $request){
        // $fImagesName = $request->file('fImages')->getClientOriginalName();
        $product = Product::find($id);
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        // $product->image = $fImagesName;
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDescription');
        $product->user_id = 1;
        $product->cat_id = Request::input('sltParent');
        // if(Input::hasFile('fImages')){$request->file('fImages')->move('resources/upload/',$fImagesName);}
        $product->save();
        // $productId = $product->id;              
        // if(Input::hasFile('fProductDetail')){
        //     foreach (Input::file('fProductDetail') as $file) {
        //         $productImg = new ProductImage;
        //         if(isset($file)){                    
        //             $productImg->image = $file->getClientOriginalName();
        //             $productImg->product_id = $productId;
        //             $file->move('resources/upload/detail/',$file->getClientOriginalName());
        //             $productImg->save();
        //         }
        //     }
        // } 
        return redirect()->route('admin.product.getList')->with(["flash_message"=>"Success!! Complete Add Product","flash_level"=>"success"]);   
    }
}
