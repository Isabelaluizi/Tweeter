<form action="/confirmDelete" method="post">
    @csrf
<button type="submit" name="tweetId" class="waves-effect waves-teal btn-flat green-text text-dark" value={{$tweetInfo['tweetId']}}><i class="material-icons green-text text-lighten-1 left">delete</i>Delete</button>
</form>
