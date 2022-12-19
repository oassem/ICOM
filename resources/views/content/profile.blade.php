@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
<div class="card my-5 mx-4" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('storage/'.$user['image'].'')}}" alt="Card image">
    <div class="card-body">
        <h5 class="card-title">{{$user['name']}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$user['gender']}}</h6>
        <p class="card-text">{{$user['email']}}</p>
    </div>
    <form action="{{route('users.destroy')}}" method="post">
        @method('delete')
        @csrf
        <button class="btn btn-danger w-100 mt-5" type="submit" onclick="return confirm('Are you sure?')"><b>Delete account</b></button>
    </form>
</div>
@endsection