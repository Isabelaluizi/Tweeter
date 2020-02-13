<div class="container">
    <div class="row">
        <form class="col s12" action="/createTweet" method="post">
            @csrf
            <div class="input-field col s12">
                <textarea id="tweetContent" class="materialize-textarea" type="text" name="content" value="" required></textarea>
                {{-- <input id="tweetContent" type="text" name="content" value="" required> --}}
                <label for="tweetContent">What´s happening?</label>
            </div>
            <div class="col s12 center-align">
                <button class="waves-effect waves-light btn green lighten-1" type="submit" value="Tweet">Tweet</button>
            </div>
        </form>
    </div>
</div>
