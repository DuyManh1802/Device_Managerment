@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Department
        <small>Create</small>
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.action.department.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Department Name</label>
                <input class="form-control" name="name" placeholder="Please Enter department Name" />
            </div>
            <div class="form-group">
                <label>Department Manager</label>
                <input class="form-control" name="manager" placeholder="Please Enter department Manager" />
            </div>
            <div class="form-group">
                <label>Department Address</label>
                <input class="form-control" name="address" placeholder="Please Enter department Address" />
            </div>
            <button type="submit" class="btn btn-dark">Create</button>

        <form>
    </div>
</div>
@endsection