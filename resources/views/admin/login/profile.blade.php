@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">User
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
        <form action="{{ route("admin.profile.update") }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" value="{{ auth()->users->name }}" placeholder="Please Enter Name" />
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" name="phone" value="{{ auth()->users->phone }}"  placeholder="Please Enter Phone" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" value="{{ auth()->users->address }}" placeholder="Please Enter Address" />
            </div>
            
           
            <button type="submit" class="btn btn-dark">Update</button>

        </form>
    </div>
</div>
@endsection