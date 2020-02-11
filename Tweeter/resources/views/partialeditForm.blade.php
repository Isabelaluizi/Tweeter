<form action="/editForm" method="post">
    @csrf
<button type="submit" name="tweetId" class="waves-effect waves-light btn green lighten-1" value={{$tweetInfo['tweetId']}}>Edit</button>
</form>
