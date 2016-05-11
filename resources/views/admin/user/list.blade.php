@extends('admin.master')
@section('controller','User')
@section('action','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $item)
            <tr class="odd gradeX" align="center">
                <td>{!! $key+1 !!}</td>
                <td>{!! $item['username'] !!}</td>
                <td>{!! $item['email'] !!}</td>
                <td>
                    @if($item['level']==1)
                        Root
                    @elseif($item['level']==2)
                        Admin
                    @elseif($item['level']==3)
                        Member
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.user.getDelete',$item['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item['id']) !!}">Edit</a></td>
            </tr>
        @endforeach        
    </tbody>
</table>
@endsection