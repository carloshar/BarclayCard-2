<main class="home">
        <form action="/buggyhire" method="post" enctype="multipart/form-data"> 
        <h3>Hire a Buggy</h3>
		<label>The Date:</label><input type="date" name="booking[date]">
        <label>From:</label><input type="time" name="booking[fromdate]">
        <label>To:</label><input type="time" name="booking[todate]">
		<input type="submit" name="book" value="Add To Basket">
		</form>
        <?php if(isset($con)){?>
        <p> Your booking for the <?=$con?> has been added to your basket. </p>
        <?php }?>
</main>