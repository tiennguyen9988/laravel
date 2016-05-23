@extends('user.master')
@section('description','Trang chủ')
@section('content')
<!-- Featured Product-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">SẢN PHẨM NỔI BẬT</span><span class="subtext"> Các sản phầm được ưa thích</span></h1>
    <ul class="thumbnails">
      @foreach($mostViewProduct as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">{!! $item->price !!}</span>
          <a href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! URL::route('getMuahang',[$item->id,$item->alias]) !!}" class="productcart">Chọn mua</a>
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

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">SẢN PHẨM MỚI NHẤT</span><span class="subtext"> Hàng mới về</span></h1>
    <ul class="thumbnails">
      @foreach($newGestProduct as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          <a href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! URL::route('getMuahang',[$item->id,$item->alias]) !!}" class="productcart">Chọn mua</a>
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
@endsection