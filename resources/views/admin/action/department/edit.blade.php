@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Department
        <small>Edit</small>
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.action.department.update", $departments->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Department Name</label>
                <input class="form-control" name="name" value="{{ $departments->name }}"  />
            </div>
            <div class="form-group">
                <label>Department Manager</label>
                <input class="form-control" name="manager" value="{{ $departments->manager }}"  />
            </div>
            <div class="form-group">
                <label>Department Address</label>
                <input class="form-control" name="address" value="{{ $departments->address }}"  />
            </div>
            
            <button type="submit" class="btn btn-dark">Update</button>

        <form>
    </div>
</div>
@endsection