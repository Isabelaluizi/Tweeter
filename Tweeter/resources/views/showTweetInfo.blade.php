@extends('layouts.app')

@section ('content')

    @php
        $date=$tweetInfo['created_at'];
        $date=substr($date,0,10);
    @endphp
    <p>{{$tweetInfo['content']}}</p>
    <p>{{$tweetInfo['name']}}</p>
    <p>{{$date}}</p>
    <br>
    @if ($commentsInfo != NULL)
        Comments:
        <br><br>
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
            @if ($commentInfo['commentuserId'] != Auth::user()->id)
            <p>{{$commentInfo['name']}}</p>
            <p>{{$commentInfo['comment']}}</p>
            @endif
        @endforeach
    @endif



@endsection
