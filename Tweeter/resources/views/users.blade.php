@extends('layouts.app')

@php
    function checkFollowing ($userTocheck, $follows) {
        foreach ($follows as $follow) {
            if ($follow->followed_id==$userTocheck && $follow->user_id==Auth::user()->id) {
                return true;
            }
        }
        return false;
    }
@endphp

@section ('content')

    <p> Find Users: </p>
    @foreach($users as $user)

    @if($user->name!=Auth::user()->name)
        <p> {{$user->name}} </p>
        @if (checkFollowing($user->id, $follows))
        <form action="/followUser" method="post">
            @csrf
            <button type="submit" name="follow" value="unfollow">Unfollow</button>
            <input type="hidden" name="followedId" value="{{$user->id}}">
        </form>
        @else
        <form action="/followUser" method="post">
            @csrf
            <button type="submit" name="follow" value="follow">Follow</button>
            <input type="hidden" name="followedId" value="{{$user->id}}">
        </form>
        @endif
    @endif
    @endforeach

@endsection



