@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Sửa thiết bị
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.device.fix", $devices->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            
            
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="name" value="{{ $devices-> name}}" placeholder="Tên thiết bị" />
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file"  class="form-control" name="image" accept="image/*" />
            </div>
            
            <div class="form-group">
                <label>Cấu hình</label>
                <input class="form-control" name="configuration" value="{{ $devices-> configuration}}" placeholder="Cấu hình" />
            </div>
            <button type="submit" class="btn btn-dark">Cập nhật</button>

        <form>
    </div>
</div>
@endsection