@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Device
        <small>Edit</small>
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.device.update", $devices->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label >Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($devices->category_id == $category->id)
                            selected
                        @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >Supplier</label>
                <select name="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if ($devices->supplier_id == $supplier->id)
                            selected
                        @endif >{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" value="{{ $devices-> name}}" placeholder="Please Enter device Name" />
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file"  class="form-control" name="image" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="price" value="{{ $devices-> price}}" placeholder="Please Enter price" />
            </div>
            <div class="form-group">
                <label>Configuration</label>
                <input class="form-control" name="configuration" value="{{ $devices-> configuration}}" placeholder="Please Enter configuration" />
            </div>
            <button type="submit" class="btn btn-dark">Update</button>

        <form>
    </div>
</div>
@endsection