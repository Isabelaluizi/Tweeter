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

}
