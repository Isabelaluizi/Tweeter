@extends('layouts.app')

@php
    function checkLike ($tweetId, $checkLikes) {
        foreach ($checkLikes as $checkLike) {
            if ($checkLike->user_id==Auth::user()->id && $checkLike->tweet_id==$tweetId) {
                return true;
            }
        }
        return false;
    }
@endphp

@section ('content')

@include('createTweetForm')

 @foreach ($tweetsInfo as $tweetInfo)
        @if($tweetInfo['userId']==Auth::user()->id)
            @php
            $date=$tweetInfo['created_at'];
            $date=substr($date,0,10);
            @endphp
            <a href="/readTweets/{{$tweetInfo['tweetId']}}">
                <p>{{$tweetInfo['content']}}</p>
                <p>{{$date}}</p>
                <p>{{$tweetInfo['name']}}</p>
                @include('partialconfirmDelete')
            </a>
            <form action="/commentForm" method="post">
                @csrf
                <button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Comment</button>
            </form>
            @if(checkLike($tweetInfo['tweetId'],$checkLikes))
                <form action="/unlikeTweet" method="post">
                    @csrf
                    <button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Unlike</button>
                    <span>Likes:{{$tweetInfo['numLikes']}}</span>
                </form>
            @else
                <form action="/likeTweet" method="post">
                    @csrf
                    <button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Like</button>
                    <span>Likes:{{$tweetInfo['numLikes']}}</span>
                </form>
            @endif
        @endif


@endforeach

 @endsection
