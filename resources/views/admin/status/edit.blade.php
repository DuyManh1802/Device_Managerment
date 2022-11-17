@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Status
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
        <form action="{{ route("admin.status.update", $statuss->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Status Name</label>
                <input class="form-control" name="name" value="{{ $statuss->name }}"  />
            </div>
            
            <button type="submit" class="btn btn-dark">Update</button>

        <form>
    </div>
</div>
@endsection