@extends('admin.master');
@section('controller','Product')
@section('action','Edit')
@section('content')
<style type="text/css">
    .img_product{max-width: 150px; max-height: 150px;}
    .icon_dell{position: relative; top: -55px; left: -20px;}
</style>
<div class="col-xs-12">
    @include('admin.blocks.error')
    <form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="col-lg-7" style="padding-bottom:120px">            
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="sltParent">
                    <option value="">Please Choose Category</option>
                    <?php cate_parent($cate,0,"--",$product["cat_id"]) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Product Name" value="{!! old('txtName',isset($product['name'])?$product['name']:null) !!}" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice',isset($product['price'])?$product['price']:null) !!}" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product['intro'])?$product['intro']:null) !!}</textarea>
                <script type="text/javascript">ckeditor('txtIntro');</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product['content'])?$product['content']:nul) !!}</textarea>
                <script type="text/javascript">ckeditor('txtContent');</script>
            </div>
            <div class="form-group">
                <label>Images Current</label>
                <img class="img_product img_current" src="{!! asset('resources/upload/'.$product['image']) !!}">
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
                <input type="hidden" name="fImagesCurrent" value="{!! old('fImagesCurrent',isset($product['image'])?$product['image']:null) !!}">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Product Keywords" value="{!! old('txtKeywords',isset($product['keywords'])?$product['keywords']:null) !!}" />
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($product['description'])?$product['description']:null) !!}</textarea>
                <script type="text/javascript">ckeditor('txtDescription');</script>
            </div>
            <button type="submit" class="btn btn-default">Product Update</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            @foreach ($productImages as $key => $value)
                <div class="form-group" id="img_detail{!! $value['id'] !!}" style="text-align: center;">
                    <img class="img_product img_detail" src="{!! asset('resources/upload/detail/'.$value['image']) !!}">
                    <a type="button" onclick="return deleteDetailImg({id: {!! $value['id'] !!}, src: '{!! asset('resources/upload/detail/'.$value['image']) !!}'})" id="del_img_demo{!! $key !!}" class="btn btn-danger btn-circle icon_dell"><i class="fa fa-times"></i></a>
                </div>                
            @endforeach
            <div>
                <button type="button" class="btn btn-primary" id="addImages" onclick="return addUploadToId('insert','<div class=form-group><label>Images</label><input type=file name=fProductDetail[]></div>')">Add Images</button>
                <div id="insert"></div>
            </div>
        </div>
    <form>    
</div>
@endsection('content')