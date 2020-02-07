@extends('layouts.app')

@section('content')

    <form action="updateProfile" method="post">
        @csrf
        <p>Name:</p>
        <input type="text" name="name" value="{{Auth::user()->name}}">
        <p>Email:</p>
        <input type="text" name="email" value="{{Auth::user()->email}}">
        <input type="hidden" name="created_at" value="{{Auth::user()->created_at}}">
        <input type="submit" value="Save">
    </form>

@endsection
