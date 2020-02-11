<form action="/confirmDelete" method="post">
    @csrf
<button type="submit" name="tweetId" class="waves-effect waves-light btn green lighten-1" value={{$tweetInfo['tweetId']}}>Delete</button>
</form>
