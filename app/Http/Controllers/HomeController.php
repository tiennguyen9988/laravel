<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB, Mail, Request, Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mostViewProduct = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','ASC')->skip(0)->take(20)->get();
        $newGestProduct = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(20)->get();
        return view('user.pages.home',compact('mostViewProduct','newGestProduct'));
    }
    public function loaisanpham($id)
    {
        $product_cat = DB::table('products')->select('id','name','image','price','alias','cat_id')->where('cat_id',$id)->orderBy('id','DESC')->paginate(2);
        $cat = DB::table('categories')->find($id);
        $menu_cat = DB::table('categories')->select('id','name','alias')->where('parent_id',$cat->parent_id)->get();
        $lastestProduct = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(3)->get();
        return view('user.pages.cate',compact('product_cat','cat','menu_cat','lastestProduct'));
    }
    public function chitietsanpham($id)
    {
        $product = DB::table('products')->find($id);
        $productImages = DB::table('product_images')->where('product_id',$id)->get();
        $relatedProducts = DB::table('products')->select('id','name','image','price','alias','cat_id')->where('cat_id',$product->cat_id)->where('id','<>',$id)->orderBy('id','DESC')->skip(0)->take(4)->get();
        return view('user.pages.product',compact('product','productImages','relatedProducts'));
    }    
    public function getLienhe(){
        return view('user.pages.contact');
    }
    public function postLienhe(Request $request){
        $data = [
            'hoten'=>Request::input('name'),
            'tinnhan'=>Request::input('message'),
        ];        
        Mail::send('emails.blanks',$data,function($msg){
            $msg->from('tiennvlocal@gmail.com', 'tiennvlocal');
            $msg->to('tiennvlocal@gmail.com', 'tiennguyen9988')->subject('Đây là Mail laravel project');
        });
        echo "<script>".
                "alert('Chúng tôi đã nhận được phản hồi của bạn và sẽ trả lời bạn trong thời gian sớm nhất.');".
                "window.location = '/';".
        "</script>";
    }
    public function getMuahang($id){
        $product = DB::table('products')->find($id);
        Cart::add(array('id'=>$id, 'name'=>$product->name, 'qty'=>1, 'price'=>$product->price, 'options'=>array('image' =>$product->image)));                
        return redirect()->route('getGiohang');        
    }
    public function getGiohang(){
        $cart = Cart::content();
        $total = Cart::total();
        return view('user.pages.shopping',compact('cart','total'));
    }
    public function getXoaSanpham($id){
        Cart::remove($id);
        return redirect()->route('getGiohang');
    }
    public function postCapNhatGioHang(Request $request){
        if(Request::ajax()){
            $rowId = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($rowId,$qty);
            echo "Cập nhật giỏ hàng thành công";            
        }        
    }
}
