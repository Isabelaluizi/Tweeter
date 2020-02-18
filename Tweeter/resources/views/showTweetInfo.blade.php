@extends('layouts.app')

@section ('content')

    <div class="container">

    @php
        $date=$tweetInfo['created_at'];
        $date=substr($date,0,10);
    @endphp
    <br>
    <br>
     <div class="row">
        <div class="col s12">
            <div class="card grey lighten-3">
                <div class="row">
                    <div class=" s12">
                        <br>
                    </div>
                    <div class="col s1 m1 xl1">
                    </div>
                    <div class="col s5  m2 xl2 left-align">
                    <img src="{{url('/images/profilerobot2.png')}}" id="avatar">
                    </div>
                    <div class="col s6 m5 xl5 center-align">
                        <h6>{{$tweetInfo['name']}}</h6>
                    </div>
                    <div class="col s12 m4 xl4 center-align">
                        <h6>{{$date}}</h6>
                    </div>
                    <div class="col s10 offset-s1 center-align">
                        <h6>{{$tweetInfo['content']}}</h6>
                    </div>
                    <div class="col s12">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="divider"></div>
    @if ($commentsInfo != NULL)
        @foreach ($commentsInfo as $commentInfo)
            @php
            $date=$commentInfo['created_at'];
            $date=substr($date,0,10);
            @endphp
            <br>
            @if ($commentInfo['commentuserId'] == Auth::user()->id)
            <div class="row center-align">
                <div class=" s12">
                    <br>
                </div>
                <div class="col s1 m1 xl1">
                </div>
                <div class="col s5  m2 xl2 left-align">
                <img src="{{url('/images/profilerobot.png')}}" id="avatar">
                </div>
                <div class="col s6 m5 xl5 center-align">
            <p>{{$commentInfo['name']}}</p>
            </div>
            <div class="col s12 m4 xl4 center-align">
                <p>{{$date}}</p>
            </div>
            <div class="col s12 center-align">
            <p>{{$commentInfo['comment']}}</p>
            </div>
            <div class="col s6 center-align">
            <form action="/confirmDeleteComment" method="post">
                @csrf
                <button class="waves-effect waves-teal btn-flat green-text text-dark" type="submit" name="commentId" value={{$commentInfo['commentId']}}><i class="material-icons green-text text-lighten-1 left">delete</i>Delete</button>
                <input type="hidden" name="tweetId" value={{$tweetInfo['tweetId']}}>
            </form>
        </div>
        <div class="col s6 center-align">
            <form action="/editCommentForm" method="post">
                @csrf
                <button type="submit" name="commentId" class="waves-effect waves-teal btn-flat green-text text-dark" value={{$commentInfo['commentId']}}><i class="material-icons green-text text-lighten-1 left">edit</i>Edit</button>
            </form>
        </div>
    </div>
            @else
            <div class="row center-align">
                <div class="col s1 m1">
                </div>
                <div class="col s5  m2 xl2 left-align">
                <img src="{{url('/images/profilerobot.png')}}" id="avatar">
                </div>
                <div class="col s6 m5 xl5 center-align">
                <p>{{$commentInfo['name']}}</p>
                </div>
                <div class="col s12 m4 xl4 center-align">
                <p>{{$date}}</p>
                </div>
                <div class="col s12 center-align">
                <p>{{$commentInfo['comment']}}</p>
                </div>
            </div>
            @endif
            <div class="divider"></div>
        @endforeach
    @endif

        </div>



@endsection
