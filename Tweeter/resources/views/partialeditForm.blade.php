<form action="/editForm" method="post">
    @csrf
<button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Edit Tweet</button>
</form>
