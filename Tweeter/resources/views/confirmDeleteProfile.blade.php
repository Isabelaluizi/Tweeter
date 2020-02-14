@extends('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <br><br>
            </div>
            <div class="col s12 center-align">
    <form action="/deleteProfile" method="post">
        @csrf
    <h5 class="green-text"> Are you sure you want to delete your Profile?</h5>
    <button class="waves-effect waves-light btn green lighten-1" type="submit" name="option" value="yes">YES</button>
    <button class="waves-effect waves-light btn green lighten-1" type="submit" name="option" value="no">NO</button>
    </form>
    </div>
</div>
</div>

@endsection
