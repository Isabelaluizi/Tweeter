<form action="/confirmDelete" method="post">
    @csrf
<button type="submit" name="tweetId" value={{$tweetInfo['tweetId']}}>Delete Tweet</button>
</form>
