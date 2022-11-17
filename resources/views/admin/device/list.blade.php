@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Device
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
                    <th>Category</th>                   
                    <th>Supplier</th>  
                    {{-- <th>Status</th> --}}
                    <th>Name</th>                
                    <th>Image</th>                   
                    <th>Price</th>
                    <th>Configuration</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                    
                <tr class="odd gradeX" align="center">
                    <td>{{ $device->id }}</td>
                    <td>{{ $device->category->name }}</td>                   
                    <td>{{ $device->supplier->name}}</td> 
                    <td>{{ $device->name }}</td>                   
                    <td><img src="{{ $device->imageUrl() }}" alt="" width="50px" height="auto"></td>                   
                    <td>{{ $device->price }}</td>                   
                    <td>{{ $device->configuration }}</td>  
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.device.edit', $device->id) }}">Edit</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.device.delete', $device->id) }}"> Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $devices->links() }}
    
</div>
@endsection