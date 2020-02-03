<main class="home">
        <form action="/bookrounds" method="post" enctype="multipart/form-data"> 
        <h3>Book a Round</h3>
		<label>The Date:</label><input type="date" name="booking[date]">
        <label>Start Time:</label><input type="time" name="booking[start]">
        <label>No of Rounds:</label>
        <select name="booking[norounds]" >
		<option value = 1 > One </option>
		<option value = 2 > Two</option>
		<option value = 3 > Three </option>
		<option value = 4 > Four </option>
		<option value = 5 > Five </option>
		</select>
		<input type="submit" name="book" value="Add To Basket">
		</form>
        <?php if(isset($con)){?>
        <p> Your booking for the <?=$con?> has been added to your basket. </p>
        <?php }?>
</main>