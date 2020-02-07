<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;

class userController extends Controller
{
    function showProfile() {
        if(Auth::check()) {
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
            return view('userProfile',['tweetsInfo'=>$tweetInfo]);
        } else {
            return redirect('/');
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
        \App\User::where('id', Auth::user()->id)->update(['name' => $request->name, 'email' => $request->email, 'created_at'=>$request->created_at]);
        return view('userProfile');
    }
    function deleteProfile(Request $request) {
        \App\User::destroy(Auth::user()->id);
        return redirect('/');
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
        return view('editForm',['tweet'=>$tweet]);
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
