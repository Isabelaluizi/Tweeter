@extends('layouts.app')

@section ('content')

    <form action="/editTweet" method="post">
        @csrf
        <input type="text" name="content" value="{{$tweet->content}}" required>
        <input type="hidden" name="created_at" value="{{$tweet->created_at}}">
        <button type="submit" name="tweetId" value="{{$tweet->id}}">Edit</button>
    </form>


@endsection
