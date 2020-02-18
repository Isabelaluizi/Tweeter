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


<h4 class="center-align">Tweets</h4>
@include('createTweetForm')

<div class="container">
    <br>
<div class="divider"></div>
<br>

 @foreach ($tweetsInfo as $tweetInfo)
            @php
            $date=$tweetInfo['created_at'];
            $date=substr($date,0,10);
            @endphp
            <div class="row">
                <div class="col s12">
                    <div class="card-panel grey lighten-3">
                            <a href="/readTweets/{{$tweetInfo['tweetId']}}">
                                <div class="row">
                                    <div class="col s1 m1">
                                    </div>
                                <div class="col s5  m2 xl2 left-align">
                                <img src="{{url('/images/profilerobot2.png')}}" id="avatar">
                                </div>
                                <div class="col s5 m5 xl5 center-align">
                                    <h5 class="black-text"><strong>{{$tweetInfo['name']}}</strong></h5>
                                </div>
                                <div class="col s12 m4 xl4 center-align">
                                    <p class="black-text">{{$date}}</p>
                                </div>
                                <div class="col s12 center-align">
                                    <h6 class="black-text">{{$tweetInfo['content']}}</h6>
                                </div>
                            </div>
                            </a>

                            @if($tweetInfo['userId']==Auth::user()->id)

                            <div class="col s3 center-align">
                                @include('partialconfirmDelete')
                            </div>
                            <div class="col s3 center-align">
                                @include('partialeditForm')
                            </div>
                                @endif
                                <div class="col s3">
                            <form class="center-align" action="/commentForm" method="post">
                                @csrf
                            <button class="waves-effect waves-teal btn-flat green-text text-dark " type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}><i class="material-icons green-text text-lighten-1 left">mode_comment</i>{{$tweetInfo['numComments']}}</button>
                            </form>
                        </div>
                            @if(checkLike($tweetInfo['tweetId'],$checkLikes))
                            <form class="right-align" action="/unlikeTweet" method="post">
                                @csrf
                            <button  class="waves-effect waves-teal btn-flat" type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}><i class="material-icons pink-text text-lighten-3">favorite</i></button>
                            <span class="pink-text text-lighten-3">{{$tweetInfo['numLikes']}}</span>
                            </form>
                        </div>
                    </div>
                </div>
                            @else
                            <form  class="right-align" action="/likeTweet" method="post">
                            @csrf
                            <button class="waves-effect waves-teal btn-flat" type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}><i class="material-icons pink-text text-lighten-3">favorite_border</i></button>
                            <span class="pink-text text-lighten-3">{{$tweetInfo['numLikes']}}</span>
                            </form>
                    </div>
                </div>
            </div>
                            @endif





@endforeach
            </div>
 @endsection
