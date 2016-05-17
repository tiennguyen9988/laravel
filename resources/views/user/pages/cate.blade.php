@extends('user.master')
@section('description','Category')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Category</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
              @foreach($menu_cat as $item)
              <li>
                <a href="{!! URL::route('loaisanpham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
              </li>
              @endforeach
            </ul>
          </div>
         <!--  Best Seller -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Women Accessories</span>
                <span class="price">$250</span>
              </li>
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Electronics</span>
                <span class="price">$250</span>
              </li>
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Electronics</span>
                <span class="price">$250</span>
              </li>
            </ul>
          </div>
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
              @foreach ($lastestProduct as $item)
                <li>
                  <img width="50" height="50" src="{!! asset('resources/upload/'.$item->image) !!}" alt="product" title="product">
                  <a class="productname" href="#">{!! $item->name !!}</a>
                  <span class="procategory">{!! $cat->name !!}</span>
                  <span class="price">{!! number_format($item->price,0,',','.') !!}</span>
                </li>
              @endforeach                            
            </ul>
          </div>
          <!--  Must have -->  
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
              <li>
                <img src="img/product1.jpg" alt="" />
              </li>
              <li>
                <img src="img/product2.jpg" alt="" />
              </li>
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                    @foreach ($product_cat as $item)
                    <li class="span3">
                      <a class="prdocutname" href="product.html">{!! $item->name !!}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">0</span>
                        <a href="#"><img alt="" align="center" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">{!! number_format($item->price,0,',','.') !!}</div>
                            <div class="priceold">$5000.00</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                      @if ($product_cat->currentPage() != 1)
                      <li><a href=""{!! str_replace('/?', '?', $product_cat->url($product_cat->currentPage()-1)) !!}">Prev</a></li>
                      @endif
                      @for ($i = 1; $i <= $product_cat->lastPage(); $i++)                        {{-- expr --}}                      
                      <li class="{!! ($product_cat->currentPage() == $i)?'active':'' !!}active">
                        <a href="{!! str_replace('/?', '?', $product_cat->url($i)) !!}">{!! $i !!}</a>
                      </li>
                      @endfor
                      @if ($product_cat->currentPage() != $product_cat->lastPage())
                      <li><a href=""{!! str_replace('/?', '?', $product_cat->url($product_cat->currentPage()+1)) !!}">Next</a></li>
                      @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection