@extends('layouts.app')

@section ('content')

    <div class="container">
        <div class="row">
            <div class="col s12">
                <br><br>
            </div>
            <div class="col s12">
            <p>{{$tweet->content}}</p>
            </div>
            <div class="col s12">
            <p>Replying to <span class="green-text text-dark">{{$username}}</span></p>
            </div>
            <form class="col s12" action="/commentTweet" method="post">
                @csrf
                <div class="input-field col s12">
                <textarea id="commentContent" class="materialize-textarea" type="text" name="content" value="" required></textarea>
                {{-- <input type="text" name="content" value="Tweet your reply" required> --}}
                <label for="commentContent">Tweet your reply</label>
                </div>
                <div class="col s12 center-align">
                    <button class="waves-effect waves-light btn green lighten-1" type="submit" name= "tweetId" value={{$tweet->id}}>Reply</button>
                </div>
                </div>
            </form>
        </div>
    </div>


@endsection
