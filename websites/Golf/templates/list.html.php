<main class="admin">

	<section class="left">
		<ul>
		<li><h3 style="color:white;">Filters:-</h3></li>
		</ul>
	</section>

	<section class="right">

		<h1>Golf Equipment</h1>

	<ul class="furniture">


	<?php
    
	foreach ($products as $item) {
	 ?>
		<li>
		<img src="/images/equipment/<?=$item->product_id?>.jpg"/>
		<div class="details">
		<h2><?=$item->name?> </h2>
		<h3>Category: <?=$item->getCategory()->title?></h3>
		<h4>Price: £ <?=$item->price?></h4>
		<p>Description: <?=$item->desc?> </p>
		<?php if( isset($added)){
			 if($added['prod'] == $item->product_id){?>
			<p><b> This product was added to your basket with a quantity of <?=$added['quant']?> </b> </p> 
		<?php }} ?>
		</div>
		<form action="/GolfEquipment/list" method="post" enctype="multipart/form-data"> 
		<label>Quantity:</label>
		<select name="basket[quantity]" >
		<option value = 1 > One </option>
		<option value = 2 > Two</option>
		<option value = 3 > Three </option>
		<option value = 4 > Four </option>
		<option value = 5 > Five </option>
		</select>
		<input type="hidden" name="basket[product_id]" value=<?=$item->product_id?>>
		<input type="submit" name="add" value="Add to Basket">
		</form>
		
		</li>
	<?php  }?>

</ul>

</section>
	</main>