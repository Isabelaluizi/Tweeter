@extends('layouts.app')

@section ('content')

    @php
        $date=$tweetInfo['created_at'];
        $date=substr($date,0,10);
    @endphp
    <div class="divider"></div>
    <div class="section">
        <div class="row">
            <div class="col s6 center-align">
                <h5>{{$tweetInfo['name']}}</h5>
            </div>
            <div class="col s6 center-align">
                <h5>{{$date}}</h5>
            </div>
            <div class="col s12 center-align">
                <h5>{{$tweetInfo['content']}}</h5>
            </div>
        </div>
    </div>
    <br>
    <div class="divider"></div>
    @if ($commentsInfo != NULL)
        @foreach ($commentsInfo as $commentInfo)
            @if ($commentInfo['commentuserId'] == Auth::user()->id)
            <p>{{$commentInfo['name']}}</p>
            <p>{{$commentInfo['comment']}}</p>
            <form action="/deleteComment" method="post">
                @csrf
                <button type="submit" name="commentId" value={{$commentInfo['commentId']}}>Delete</button>
            </form>
            <form action="/editCommentForm" method="post">
                @csrf
                <button type="submit" name="commentId" value={{$commentInfo['commentId']}}>Edit</button>
            </form>
            @endif
        @endforeach
        @foreach ($commentsInfo as $commentInfo)
            @php
                $date=$commentInfo['created_at'];
                $date=substr($date,0,10);
            @endphp
            @if ($commentInfo['commentuserId'] != Auth::user()->id)
                <p>{{$commentInfo['name']}}</p>
                <p>{{$date}}</p>
                <p>{{$commentInfo['comment']}}</p>
            @endif
        @endforeach
    @endif



@endsection
