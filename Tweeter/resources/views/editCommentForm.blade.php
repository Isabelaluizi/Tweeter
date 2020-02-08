@extends('layouts.app')

@section ('content')

    <form action="editComment" method="post">
        @csrf
        <input type="text" name="comment" value="{{$comment->content}}">
    <input type="hidden" name="created_at" value="{{$comment->created_at}}">
        <button type="submit" name="commentId" value="{{$comment->id}}">Edit</button>
    </form>

@endsection
