<p>What´s happening?</p>

<form action="/createTweet" method="post">
    @csrf
    <input type="text" name="content" value="" required>
    <input type="submit" value="Tweet">
</form>
