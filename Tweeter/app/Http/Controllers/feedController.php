<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class feedController extends Controller

{
    function showTweets () {
        if (Auth::check()) {
        $tweets= \App\Tweet::orderBy("created_at", "desc")->get();
        $checkLikes =\App\Like::all();
            $tweetInfo=[];
            foreach($tweets as $tweet) {
                $likes=\App\Like::where("tweet_id","$tweet->id")->get();
                $numLikes=count($likes);
                $userId=$tweet->user_id;
                array_push ($tweetInfo,[
                    "userId"=> "$userId",
                    "tweetId"=> "$tweet->id",
                    "name"=> \App\User::find($userId)->name,
                    "content" =>"$tweet->content",
                    "created_at" =>"$tweet->created_at",
                    "numLikes" => "$numLikes"
                ]);
            }
            return view('readTweets', ['tweetsInfo'=>$tweetInfo],['checkLikes'=>$checkLikes]);
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
        error_log($request->tweetId);
        $tweet=\App\Tweet::find($request->tweetId);
        $comment = new \App\Comment;
        $comment->user_id = Auth::user()->id;
        $comment->tweet_id = $request->tweetId;
        $comment->content = $request->content;
        $comment->save();
        return redirect ('readTweets');
    }
    function showComments ($tweetId) {
        $tweet= \App\Tweet::find($tweetId);
        $comments= \App\Comment::where('tweet_id',"$tweetId")->orderBy("created_at", "desc")->get();
        $tweetInfo = [
            "userId"=> "$tweet->user_id",
            "tweetId"=> "$tweet->id",
            "name"=> \App\User::find($tweet->user_id)->name,
            "content" =>"$tweet->content",
            "created_at" =>"$tweet->created_at",
        ];
        $commentsInfo=[];
        foreach($comments as $comment) {
            array_push ($commentsInfo, [
            "commentId" => "$comment->id",
            "commentuserId" => "$comment->user_id",
            "name" => \App\User::find($comment->user_id)->name,
            "comment" => "$comment->content",
            "created_at" => "$comment->created_at"]);
        }
        return view ('showTweetInfo', ['tweetInfo'=>$tweetInfo], ['commentsInfo'=>$commentsInfo]);
    }
    function deleteComment (Request $request) {
        \App\Comment::destroy($request->commentId);
        return redirect ('readTweets');
    }
    function editCommentForm (Request $request) {
        $comment=\App\Comment::find($request->commentId);
        return view ('editCommentForm', ['comment'=>$comment]);
    }
    function editComment (Request $request) {
        $comment=\App\Comment::find($request->commentId);
            $comment->content = $request->comment;
            $comment->created_at = $request->created_at;
            $comment->save();
            return redirect ('readTweets');
    }
    function addLike (Request $request) {
        $like = new \App\Like;
        $like->user_id = Auth::user()->id;
        $like->tweet_id = $request->tweetId;
        $like->save();
        return redirect ('readTweets');
    }
    function deleteLike (Request $request) {
        $likes=\App\Like::where('user_id',Auth::user()->id)->where('tweet_id',$request->tweetId)->get();
        foreach($likes as $like) {
            \App\Like::destroy($like
            ->id);
        }
        return redirect ('readTweets');
    }


}