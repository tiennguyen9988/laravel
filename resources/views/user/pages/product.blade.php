@extends('user.master')
@section('description','Product')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="img/product1big.jpg">
                <img src="{!! asset('resources/upload/'.$product->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach ($productImages as $item)
              <li class="span5">
                <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="img/product2big.jpg">
                  <img src="{!! asset('resources/upload/detail/'.$item->image) !!}" alt="" title="">
                </a>
              </li>
            @endforeach            
          </ul>
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img src="{!! asset('resources/upload/'.$product->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach ($productImages as $item)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img src="{!! asset('resources/upload/detail/'.$item->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach            
          </ul>
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone">{!! $product->name !!}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>{!! number_format($product->price,0,',','.') !!}</div>
              </div>
              <ul class="productpagecart">
                <li><a class="cart" href="#">Add to Cart</a>
                </li>
              </ul>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Description</a>
                  </li>
                  <li><a href="#specification">Specification</a>
                  </li>
                  <li><a href="#review">Review</a>
                  </li>
                  <li><a href="#producttag">Tags</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                      {!! $product->description !!}    
                  </div>
                  <div class="tab-pane " id="specification">
                    <!-- product info -->
                  </div>
                  <div class="tab-pane" id="review">
                    <!-- product review -->
                  </div>
                  <div class="tab-pane" id="producttag">
                    <!-- product tag -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        @foreach ($relatedProducts as $item)
        <li class="span3">
          <a class="prdocutname" href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="#"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
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
    </div>
  </section>
  <!-- Popular Brands-->
</div>
@endsection