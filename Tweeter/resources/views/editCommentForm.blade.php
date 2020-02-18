@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        <div class="s12">
            <br><br><br><br>
        </div>
    <form class="col s12" action="editComment" method="post">
        @csrf
        <div class="row">
            <div class="input-field col s12">
        <input id="tweetComment" type="text" name="comment" value="{{$comment->content}}" required>
        <label for="tweetComment">Comment</label>
        <input type="hidden" name="created_at" value="{{$comment->created_at}}">
        <div class="col s12 center-align">
        <button class="waves-effect waves-light btn green lighten-1" type="submit" name="commentId" value="{{$comment->id}}"><i class="material-icons left">edit</i>Edit</button>
        <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
    </div>
    </div>
</div>
    </form>
</div>

@endsection
