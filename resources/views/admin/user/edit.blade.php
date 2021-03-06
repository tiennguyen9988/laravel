@extends('admin.master')
@section('controller','User')
@section('action','Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
@include('admin.blocks.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">    
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{!! old('txtUser',isset($user['username'])?$user['username']:null) !!}" disabled />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail',isset($user['email'])?$user['email']:null) !!}" />
        </div>
        <div class="form-group">
            <label>User Level</label>            
            @if ($user['level'] <= 1)
            <label class="radio-inline">
                <input name="rdoLevel" value="1" @if ($user['level']==1) checked="" @endif type="radio">Root
            </label>
            @endif
            @if ($user['level'] <= 2)
            <label class="radio-inline">
                <input name="rdoLevel" value="2" @if ($user['level']==2) checked="" @endif type="radio">Admin
            </label>
            @endif
            <label class="radio-inline">
                <input name="rdoLevel" value="3" @if ($user['level']==3) checked="" @endif type="radio">Member
            </label>
        </div>
        <button type="submit" class="btn btn-default">User Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection