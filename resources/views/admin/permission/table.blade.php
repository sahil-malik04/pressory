@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <a href="{{ route('permission.view')}}" class="btn btn-primary">Add</a>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($post as $key=>$data)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td>
                <a href="/permission/edit/{{ $data->id }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <a href="/permission/delete/{{ $data->id }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>    
    
        
    


@endsection