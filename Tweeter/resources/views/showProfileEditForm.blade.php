@extends('layouts.app')

@section('content')

    <form action="updateProfile" method="post">
        @csrf
        <p>Name:</p>
        <input type="text" name="name" value="{{Auth::user()->name}}" required>
        <p>Email:</p>
        <input type="text" name="email" value="{{Auth::user()->email}}" required>
        <input type="hidden" name="created_at" value="{{Auth::user()->created_at}}" required>
        <input type="submit" value="Save">
    </form>
    <form action="/deleteProfile" method="post">
        @csrf
        <button class="btn" type="submit" value="Delete"> Delete profile</button>
        </form>

@endsection
