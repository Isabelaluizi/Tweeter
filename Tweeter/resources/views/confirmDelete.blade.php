@extends('layouts.app')

@section ('content')

    <form action="/deleteTweet" method="post">
        @csrf
    <p> Are you sure that you want to delete your Tweet?</p>
    <button type="submit" name="option" value="yes">YES</button>
    <button type="submit" name="option" value="no">NO</button>
    <input type="hidden" name="tweetId" value="{{$deleteTweet->id}}"> {{--is passing the tweet id to be deleted--}}
    </form>


@endsection
