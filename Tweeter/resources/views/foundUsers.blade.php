@extends('layouts.app')

@section ('content')
    <div class="container">
        <form action="searchUser" method="post">
            @csrf
        <div class="row valign-wrapper">
            <div class="col s10 offset-s2 right-align">
                <input name="search" value="">
            </div>
            <div class="col s2 left-align">
                <button class="waves-effect waves-teal btn-flat " name="search" value="search"><i class="material-icons">search</i></button>
            </div>
        </div>
    </form>
        <h5 class="center-align"> Follow Users </h5>


        <div class="row valign-wrapper">
            @if($user->name!=Auth::user()->name)
            <div class="col s6 m4 offset-m2 l4 offset-l2 xl4 offset-xl2 center-align">
                <h6> {{$user->name}} </h6>
            </div>
                @if (checkFollowing($user->id, $follows))
            <div class="col s6 m4 xl4 xl4 left-align">
                    <form action="/followUser" method="post">
                    @csrf
                    <button class="waves-effect waves-light btn green lighten-1" type="submit" name="follow" value="unfollow">Unfollow</button>
                    <input type="hidden" name="followedId" value="{{$user->id}}">
                    </form>
            </div>
                @else
            <div class="col s6 m4 offset-m2 l4 offset-l2 xl4 offset-xl2">
                    <form action="/followUser" method="post">
                    @csrf
                    <button class="waves-effect waves-light btn green lighten-1" type="submit" name="follow" value="follow"><i class="material-icons left">person_add</i> Follow</button>
                    <input type="hidden" name="followedId" value="{{$user->id}}">
                    </form>
            </div>
                @endif
            @endif
        </div>
