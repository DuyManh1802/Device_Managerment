@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Supplier
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
        <form action="{{ route("admin.action.supplier.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Supplier Name</label>
                <input class="form-control" name="name" placeholder="Please Enter Supplier Name" />
            </div>
            
            <button type="submit" class="btn btn-dark">Create</button>

        <form>
    </div>
</div>
@endsection