@extends('admin.master')
@section('controller','Category')
@section('action','List')
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Category Parent</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
                <tr class="even gradeC" align="center">
                    <td>1</td>
                    <td>{!! $value["name"] !!}</td>
                    <td>
                        @if ($value["parent_id"] == 0)
                            {!! "None" !!}
                        @else
                            <?php 
                                $parent = DB::table('categories')->where("id",$value["parent_id"])->first(); 
                                echo $parent->name;
                            ?>
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick="return fnConfirm();" href="{!! URL::route('admin.cate.getDelete',$value["id"]) !!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$value["id"]) !!}">Edit</a></td>
                </tr>
            @endforeach            
        </tbody>
    </table>
@endsection()