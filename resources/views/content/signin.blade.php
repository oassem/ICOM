@extends('layouts.app')
@section('title') Login @endsection
@section('content')
<form class="w-50 mx-auto mt-5" method="POST" action="{{route('users.login')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control mt-2" name="email">
    </div><br>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control mt-2" name="password">
    </div><br>
    <button type="submit" class="btn btn-primary mt-3">Login</button>
</form>
@endsection