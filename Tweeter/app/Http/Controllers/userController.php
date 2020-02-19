<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class userController extends Controller
{
    function showProfile() {
        if(Auth::check()) {
            $followingUsers= \App\Follow::where("user_id",Auth::user()->id)->get();
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
            return view('userProfile',['tweetsInfo'=>$tweetInfo],['following'=>$followingUsers]);
        } else {
            return redirect('readTweets');
        }
    }
    function confirmDelete (Request $request) {
        $deleteTweet=\App\Tweet::find($request->tweetId); // is passing Tweet that wants to delete
        return view ('confirmDelete',['deleteTweet'=>$deleteTweet]);
    }
    function deleteTweet (Request $request) {
        if ($request->option=='yes') {
            \App\Tweet::destroy($request->tweetId);
        }
        return redirect('/userProfile');
    }
    function showProfileEdit() {
        return view('showProfileEditForm');
    }
    function updateProfile(Request $request) {
        $request->validate([
            'name' => 'max:25|unique:App\User,name',
            'email' => 'max:255|unique:App\User,email',
        ]);
        // $checkname=\App\User::where('name',$request->name)->get();
        // $checkemail=\App\User::where('email',$request->email)->get();
        // if($checkname->count()!=0) {
        //      return view('showProfileEditFormError1');
        //  } elseif ($checkemail->count()!=0) {
        //      return view('showProfileEditFormError2');
        //  } else {
            \App\User::where('id', Auth::user()->id)->update(['name' => $request->name, 'email' => $request->email, 'created_at'=>$request->created_at]);
            return redirect('userProfile');
        //}
    }
    function confirmDeleteProfile(Request $request) {
        return view('confirmDeleteProfile');
    }
    function deleteProfile(Request $request) {
        if($request->option=="yes") {
            $tweets = Auth::user()->tweets;
            $comments = Auth::user()->comments;
            $likes = Auth::user()->likes;
            $follows = Auth::user()->follows;
            foreach ($tweets as $tweet) {
                \App\Tweet::destroy($tweet->id);
            }
            foreach ($comments as $comment) {
                \App\Comment::destroy($comment->id);
            }
            foreach ($likes as $like) {
                \App\Like::destroy($like->id);
            }
            foreach ($follows as $follow) {
                \App\Follow::destroy($follow->id);
            }
            \App\User::destroy(Auth::user()->id);
            return redirect('/');
        }
        return redirect('userProfile');
    }
    function createForm () {
        return view('createForm');
    }
    function createTweet (Request $request) {
        $tweet= new \App\Tweet;
            $tweet->user_id = Auth::user()->id;
            $tweet->content = $request->content;
            $tweet->save();
            return redirect ('userProfile');
    }
    function editForm (Request $request) {
        $tweet= \App\Tweet::find($request->tweetId);
        return view('editTweetForm',['tweet'=>$tweet]);
    }
    function editTweet (Request $request) {
        $tweet = \App\Tweet::find($request->tweetId);
        $tweet->content = $request->content;
        $tweet->user_id = Auth::user()->id;
        $tweet->created_at = $request->created_at;
        $tweet->save();
        return redirect ('userProfile');
    }

}
