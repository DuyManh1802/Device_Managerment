@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">User
        <small>List</small>
    </h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>                   
                    <th>Email</th>                   
                    <th>Is Admin</th>                 
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    
                <tr class="odd gradeX" align="center">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>                   
                    <td>{{ $user->email }}</td>                   
                    <td>{{ $user->is_admin ? "x" : ""}}</td> 
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.user.delete', $user->id) }}"> Delete</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    
</div>
@endsection