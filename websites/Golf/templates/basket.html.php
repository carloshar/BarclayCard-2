<main class="admin">

	<section class="left">
		<ul>
		<li><h3 style="color:white;">Info:-</h3></li>
		</ul>
	</section>

	<section class="right">

		<h1>Your Basket</h1>

	<ul class="furniture">


	<?php
    
	foreach ($basket as $item) {
	 ?>
		<li>
		<div class="details">
        <img src="/images/equipment/<?=$item->product_id?>.jpg"/>
		<h2><?=$item->getProduct()->name?> </h2>
		<h3>Category: <?=$item->getProduct()->getCategory()->title?></h3>
		<h4>Price: £ <?=$item->getProduct()->price?></h4>
        <h4>Quantity: <?=$item->quantity?></h4>
		<p>Description: <?=$item->getProduct()->desc?> </p>

		</div>
        <form action="/basket" method="post" enctype="multipart/form-data"> 
		<input type="hidden" name="basket[basket_id]" value=<?=$item->basket_id?>>
		<input type="submit" name="remove" value="Remove from Basket">
		</form>
		</li>
	<?php  }?>

</ul>

</section>
	</main>