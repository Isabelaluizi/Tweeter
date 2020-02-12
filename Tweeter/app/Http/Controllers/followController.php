<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class followController extends Controller
{
    function showUsers () {
        $users=\App\User::orderby('name')->get();
        $follows=\App\Follow::all();
        return view ('users', ['users'=>$users], ['follows'=>$follows]);
    }
    function changeFollow (Request $request) {
        if ($request->follow =='follow') {
            $follow= new \App\Follow;
            $follow->user_id = Auth::user()->id;
            $follow->followed_id = $request->followedId;
            $follow->save();
        } else {
            $findFollows = \App\Follow::where("followed_id", $request->followedId)->where("user_id",Auth::user()->id)->get();
            foreach ($findFollows as $findFollow) {
                \App\Follow::destroy($findFollow->id);
            }
        }
        return redirect ('/findUsers');
    }
}
