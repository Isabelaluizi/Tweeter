@extends('layouts.app')

@section ('content')

 @foreach ($tweetsInfo as $tweetInfo)

    @if($tweetInfo['userId']!=Auth::user()->id)
    @php
    $date=$tweetInfo['created_at'];
    $date=substr($date,0,10);
     @endphp
    <a href="/readTweets/{{$tweetInfo['tweetId']}}">
        <p>{{$tweetInfo['content']}}</p>
        <p>{{$date}}</p>
        <p>{{$tweetInfo['name']}}</p>
    </a>
        <form action="/commentForm" method="post">
            @csrf
            <button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Comment</button>
        </form>
        <form action="/likeTweet" method="post">
            @csrf
            <button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Like</button>
        </form>

    @endif

@endforeach

 @endsection
