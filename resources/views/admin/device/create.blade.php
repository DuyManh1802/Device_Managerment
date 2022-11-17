@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Device
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
        <form action="{{ route("admin.device.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label >Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >Supplier</label>
                <select name="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" placeholder="Please Enter device Name" />
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file"  class="form-control" name="image" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="price" placeholder="Please Enter price" />
            </div>
            <div class="form-group">
                <label>Configuration</label>
                <input class="form-control" name="configuration" placeholder="Please Enter configuration" />
            </div>
            <button type="submit" class="btn btn-dark">Create</button>

        <form>
    </div>
</div>
@endsection