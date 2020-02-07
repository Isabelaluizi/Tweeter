<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class feedController extends Controller
{
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
}
