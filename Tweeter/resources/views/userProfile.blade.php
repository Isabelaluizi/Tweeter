@extends('layouts.app')

@section ('content')

    <div class="container">

        <div class="row">
            <div class="col s12 l12">
                <h4 class="center-align"> Welcome, {{Auth::user()->name}} </h4>
            </div>
        </div>

        <div class="row">
            <div class="col s5 l7">
                <h6 class="center-align"><strong>Joined</strong> {{Auth::user()->created_at->format('m/Y')}}</h6>
            </div>
            <div class="col s7 l5">
                <form action="/editProfile" method="post">
                @csrf
                <button class=" center-align waves-effect waves-light btn green lighten-1" type="submit" value="Edit"><i class="material-icons left">person</i>Edit profile</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col s1 l3">
            </div>
            <div class="col s5 l2 center-align">
                <form action="/createForm" method="post">
                    @csrf
                    <button class="waves-effect waves-light btn green lighten-1" type="submit" name="newTweet">Tweet</button>
                </form>
            </div>
            <div class="col s6 l7 center-align">
                <form action="/findUsers" method="post">
                    @csrf
                    <button class="waves-effect waves-light btn green lighten-1" type="submit" value="findUsers"> Find Users</button>
                </form>
            </div>
        </div>


        <div class="row valign-wrapper">
            <div class="col l2">
            </div>
            <div class="col s5 l2">
                <img class="center-align" src="/images/tulip.jpg" width="100%">
            </div>
            <div class="col s7 l7">
                <h5 class="left-align"><u>See your Tweets</u></h5>
            </div>
        </div>

    @foreach ($tweetsInfo as $tweetInfo)
    @php
    $date=$tweetInfo['created_at'];
    $date=substr($date,0,10);
     @endphp
    @if ($tweetInfo['userId']==Auth::user()->id)
        <div class="row">
            <div class="col s12 l12">
                <div class="card grey lighten-3">
                    <div class="row">
                        <div class="col s7 l6">
                            <h6 class="center-align"><strong>{{$tweetInfo['name']}}</strong></h6>
                        </div>
                        <div class="col s5 l6">
                            <p class="center-align">{{$date}}</p>
                        </div>
                        <div class="col s12 l12">
                            <h6 class="center-align">{{$tweetInfo['content']}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2 l4">
                        </div>
                        <div class="col s4 l2 center-align">
                            @include('partialconfirmDelete')
                        </div>
                        <div class="col s4 l2 center-align">
                            @include('partialeditForm')
                        </div>
                        <div class="col s2 l4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
    </div>

@endsection
