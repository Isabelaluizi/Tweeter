<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class feedController extends Controller

{
    function showTweets () {
        if (Auth::check()) {
        $tweets= \App\Tweet::orderBy("created_at", "desc")->get();
            $tweetInfo=[];
            foreach($tweets as $tweet) {
                $userId=$tweet->user_id;
                array_push ($tweetInfo,[
                    "userId"=> "$userId",
                    "tweetId"=> "$tweet->id",
                    "name"=> \App\User::find($userId)->name,
                    "content" =>"$tweet->content",
                    "created_at" =>"$tweet->created_at",
                ]);
            }
            return view('readTweets', ['tweetsInfo'=>$tweetInfo]);
        } else {
            return redirect('home');
        }
    }
    function commentForm (Request $request) {
        $tweet=\App\Tweet::find($request->tweetId);
        $userId=$tweet->user_id;
        $userName=\App\User::find($userId)->name;
        return view('commentForm', ['tweet'=>$tweet],['username'=>$userName]);
    }
    function commentTweet (Request $request) {
        $tweet=\App\Tweet::find($request->tweetId);
        $comment = new \App\Comment;
        $comment->user_id = Auth::user()->id;
        $comment->tweet_id = $request->tweetId;
        $comment->content = $request->content;
        $comment->save();
        return redirect ('readTweets');
    }
}
