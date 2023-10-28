@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($post as $key=>$data)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $data->role }}</td>
            <td>
                <a href="/role/edit/{{ $data->id }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                
                <!-- <a href="/post/delete/{{ $data->id }}" class="btn btn-danger"><i class="fa fa-remove"></i></a> -->
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>    
    
        
    


@endsection