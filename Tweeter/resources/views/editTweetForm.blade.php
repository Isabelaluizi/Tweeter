@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        <div class="s12">
            <br><br><br><br>
        </div>
        <form class="col s12" action="/editTweet" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="tweetContent" class="materialize-textarea" type="text" name="content" value="{{$tweet->content}}" required>{{$tweet->content}}</textarea>
                    <label for="tweetContent">Tweet</label>
                    <input type="hidden" name="created_at" value="{{$tweet->created_at}}">
                </div>
                <div class="col s12 center-align">
                    <button class="waves-effect waves-light btn green lighten-1" type="submit" name="tweetId" value="{{$tweet->id}}"> <i class="material-icons left">edit</i>Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
