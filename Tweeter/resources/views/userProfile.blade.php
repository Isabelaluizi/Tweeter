@extends('layouts.app')

@section ('content')

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3 class="center-align  indigo-text"> Welcome, {{Auth::user()->name}} </h3>
            </div>
            <div class="col s12">
                <h6 class="center-align">Joined {{Auth::user()->created_at->format('m/d/Y')}}</h6>
            </div>
            <div class="col s3">
                <form action="/findUsers" method="post">
                    @csrf
                <button class="btn" type="submit" value="findUsers"> Find Users</button>
                </form>
            </div>
            <div class="col s1">
            </div>
            <div class="col s3">
                <form action="/editProfile" method="post">
                @csrf
                <button class="btn" type="submit" value="Edit"> Edit profile</button>
                </form>
            </div>
            <div class="col s1">
            </div>
            <div class="col s3">
                <form action="/deleteProfile" method="post">
                @csrf
                <button class="btn" type="submit" value="Delete"> Delete profile</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
                <form action="/createForm" method="post">
                @csrf
                <button class="waves-effect waves-light btn indigo" type="submit" name="newTweet">Tweet</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <p>Your Tweets</p>
            </div>
        </div>

    @foreach ($tweetsInfo as $tweetInfo)
    @php
    $date=$tweetInfo['created_at'];
    $date=substr($date,0,10);
     @endphp

    @if ($tweetInfo['userId']==Auth::user()->id)
        <p>{{$tweetInfo['content']}}</p>
        <p>{{$date}}</p>
        <p>{{$tweetInfo['name']}}</p>
        @include('partialconfirmDelete')
        @include('partialeditForm')

    @endif
    @endforeach
</div>

@endsection
