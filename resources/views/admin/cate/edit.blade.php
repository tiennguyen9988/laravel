@extends('admin.master')
@section('controller','Category');
@section('action','Edit');
@section('content');
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please Choose Category</option>
                {!! cate_parent($parent,0,"--",$data["parent_id"]) !!}
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>            
            <input class="form-control" name="txtCateName" value="{!! old('txtCateName',isset($data)?$data['name']:null) !!}" required placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" value="{!! old('txtOrder',isset($data)?$data['order']:null) !!}" placeholder="Please Enter Category Order" />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords',isset($data)?$data['keywords']:null) !!}" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($data)?$data['description']:null) !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection('content');