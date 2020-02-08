@extends('layouts.app')

@section ('content')

    <p> Welcome, {{Auth::user()->name}} </p>
    <p>Joined {{Auth::user()->created_at->format('m/d/Y')}}</p>

    <form action="/findUsers" method="post">
        @csrf
        <button type="submit" value="findUsers"> Find users</button>
    </form>
    <br><br>

    <form action="/editProfile" method="post">
        @csrf
        <button type="submit" value="Edit"> Edit profile</button>
    </form>

    <form action="/deleteProfile" method="post">
        @csrf
        <button type="submit" value="Delete"> Delete profile</button>
    </form>
    <br><br>
    <p>Tweets</p>

    <form action="/createForm" method="post">
        @csrf
    <button type="submit" name="newTweet">New tweet</button>
    </form>

    <br><br>
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
        <form action="/editForm" method="post">
            @csrf
        <button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Edit</button>
        </form>

    @endif
    @endforeach


@endsection