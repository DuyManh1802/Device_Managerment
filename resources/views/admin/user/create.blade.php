@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">User
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
        <form action="{{ route("admin.user.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" placeholder="Please Enter Name" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" type="email" placeholder="Please Enter Email" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" type="password" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>Confirm</label>
                <input class="form-control" name="confirm" type="password" placeholder="Please Enter Confirm Password" />
            </div>
            <div class="form-group">
                <label>Is Admin</label>
                <label  class="radio-inline">
                    <input type="radio" name="is_admin" value="0" checked> User
                </label>
                <label  class="radio-inline">
                    <input type="radio" name="is_admin" value="1"> Admin
                </label>
            </div>
            <button type="submit" class="btn btn-dark">Create</button>

        </form>
    </div>
</div>
@endsection