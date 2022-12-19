@extends('layouts.app')
@section('title') Register @endsection
@section('content')
<form class="w-50 mx-auto mt-5" method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control mt-2" name="name">
        <small class="form-text text-muted"></small>
    </div><br>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control mt-2" name="email">
    </div><br>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control mt-2" name="password">
    </div><br>
    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control mt-2" name="image" />
    </div><br>
    <div class="form-group">
        <label>Gender</label>
        <select class="form-control mt-2" name="gender">
            <option disabled selected>Choose one</option>
            <option>Male</option>
            <option>Female</option>
        </select>
    </div><br>
    <button type="submit" class="btn btn-primary mt-3 mb-5">Create account</button>
</form>
@endsection