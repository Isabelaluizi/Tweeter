@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <br><br><br>
        </div>
        <form class="col s12" action="updateProfile" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="username" type="text" name="name" value="{{Auth::user()->name}}" required>
                    <label for="username">Name</label>
                    <p class="center-align red-text"> {{$errors->first('name')}} </p>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="text" name="email" value="{{Auth::user()->email}}" required>
                    <label for="email">E-mail</label>
                    <p class="center-align red-text"> {{$errors->first('email')}} </p>
                    <input type="hidden" name="created_at" value="{{Auth::user()->created_at}}">
                </div>
                <div class="col s12 right-align">
                <button class="waves-effect waves-light btn-small green lighten-1" type="submit" value="Save">Save<i class="material-icons right">send</i></button>
                </div>
            </div>
        </form>
        <div class="row">
            <form class="col s12 center-align" action="/confirmDeleteProfile" method="post">
                @csrf
                <button class="waves-effect waves-light btn green lighten-1" type="submit" name="deleteuser" value="delete"><i class="material-icons left">delete</i> Delete profile</button>
            </form>
            <div class="col s12">
            <br>
            </div>
            <form class="col s12 center-align" action="/userProfile" method="get">
                @csrf
                <button class="waves-effect waves-light btn green lighten-1" type="submit" name="goback"><i class="material-icons left">arrow_back</i>Go back</button>
            </form>
        </div>
    </div>
</div>
@endsection
