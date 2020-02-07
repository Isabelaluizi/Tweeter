@extends('layouts.app')

@section ('content')

<p>{{$tweet->content}}</p>
<p>Replying to {{$username}}</p>
<form action="/commentTweet" method="post">
    @csrf
    <input type="text" name="content" value="Tweet your reply" required>
    <button type="submit" value={{$tweet->id}}>Reply</button>
</form>


@endsection
