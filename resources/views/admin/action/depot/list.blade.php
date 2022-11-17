@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Depot
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
                    <th>Create</th>               
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depots as $depot)
                    
                <tr class="odd gradeX" align="center">
                    <td>{{ $depot->id }}</td>
                    <td>{{ $depot->name }}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.action.depot.create', $depot->id) }}">Create</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.action.depot.edit', $depot->id) }}">Edit</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.action.depot.delete', $depot->id) }}"> Delete</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    
</div>

@endsection