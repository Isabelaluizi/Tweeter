@extends('layouts.app')

@section ('content')
    <div class="container">
        <form action="searchUser" method="post">
            @csrf
        <div class="row valign-wrapper">
            <div class="col s10 offset-s2 right-align">
                <input name="search" value="">
            </div>
            <div class="col s2 left-align">
                <button class="waves-effect waves-teal btn-flat " name="search" value="search"><i class="material-icons">search</i></button>
            </div>
        </div>
    </form>
        <h5 class="center-align"> Follow Users </h5>
        <br>
        <h6 class="red-text center-align"> <strong>User not found</strong></h6>
        <br>
        <form class="center-align" action="findUsers" method="post">
            @csrf
            <button class="center-align waves-effect waves-light btn green lighten-1 valign-wrapper" type="submit" value="findUsers"> Go back</button>
        </form>
</div>

@endsection
