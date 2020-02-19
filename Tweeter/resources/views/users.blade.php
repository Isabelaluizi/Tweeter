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
    <div class="container">
        <form action="searchUser" method="post">
            @csrf
        <div class="row valign-wrapper">
            <div class="col s10 offset-s2 right-align">
                <input name="searchName" value="">
            </div>
            <div class="col s2 left-align">
                <button class="waves-effect waves-teal btn-flat " name="search" value="search"><i class="material-icons">search</i></button>
            </div>
        </div>
    </form>
        <h5 class="center-align"> Follow Users </h5>
        @foreach($users as $user)

            <div class="row valign-wrapper">
                @if($user->name!=Auth::user()->name)
                <div class="col s4 m3 offset-m1 xl3 right-align">
                <img src="{{url('/images/profilerobot2.png')}}" id="avatar">
                </div>
                <div class="col s4 m4 xl5 center-align">
                    <h6> {{$user->name}} </h6>
                </div>
                    @if (checkFollowing($user->id, $follows))
                <div class="col s4 m4 xl4 left-align">
                        <form action="/followUser" method="post">
                        @csrf
                        <button class="waves-effect waves-teal btn-flat green-text text-dark" type="submit" name="follow" value="unfollow"><i class="material-icons left">indeterminate_check_box</i>Unfollow</button>
                        <input type="hidden" name="followedId" value="{{$user->id}}">
                        </form>
                </div>
                    @else
                <div class="col s4 m4 xl4 left-align">
                        <form action="/followUser" method="post">
                        @csrf
                        <button class="waves-effect waves-teal btn-flat green-text text-dark" type="submit" name="follow" value="follow"><i class="material-icons left">person_add</i> Follow</button>
                        <input type="hidden" name="followedId" value="{{$user->id}}">
                        </form>
                </div>
                    @endif
                @endif
            </div>

        @endforeach
    </div>

@endsection



