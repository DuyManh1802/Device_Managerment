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
        <form action="{{ route("admin.user.update", $users->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" value="{{ $users->name }}" placeholder="Please Enter Name" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" value="{{ $users->email }}" type="email" placeholder="Please Enter Email" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" type="password" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>Confirm</label>
                <input class="form-control" name="Confirm" type="password" placeholder="Please Enter Confirm Password" />
            </div>
            <div class="form-group">
                <label>Role</label>
                <label  class="radio-inline">
                    <input type="radio" name="is_admin" value="0" @if (!$users->is_admin) checked @endif > User
                </label>
                <label  class="radio-inline">
                    <input type="radio" name="is_admin" value="1" @if ($users->is_admin) checked @endif> Admin
                </label>
            </div>
            <button type="submit" class="btn btn-dark">Update</button>

        </form>
    </div>
</div>
@endsection