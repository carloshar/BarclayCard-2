<form method="get" action="/products">
	<label for = "artist_id">Artist</label>
	<select name = "artist_id">
		<option value = "None" selected>None</option>
		<?php
		foreach($artists as $artist) {
		?>
		<option value = "<?=$artist->artist_id?>"><?=$artist->name?></option>
		<?php
		}
		?>
	</select>
	<label for="category_id">Category</label>
	<select name="category_id">
		<option value = "None" selected>None</option>
		<?php
		foreach($cats as $cat) {
			?>
		<option value="<?=$cat->category_id?>"><?=$cat->title?></option>
		<?php
	}
	?>
	</select>
	<input type="submit" name="submit" value="Filter" />
</form>

<section class="right">
	<h1>Our stock</h1>
	<ul class="stock">
		<?php
		foreach($stock as $stock_item) {
			if ($stock_item->archived != '1') { ?>
				<?php
				//explodes the full image string from the database, displaying each one.
				$stock_item_image = explode(",", $stock_item->image);
				$imagecount = count($stock_item_image);
				for ($i = 0; $i<$imagecount; $i++){
					if (file_exists($stock_item_image[$i])) {
						echo '<a href="' . $stock_item_image[$i] . '"><img src="' . $stock_item_image[$i] . '" /></a>';
					}
				}
				?>
				<div class = "details">
					<h2><?=$stock_item->name?></h2>
					<?php
					if ($stock_item->sale_price == '' || $stock_item->sale_price == $stock_item->price){ ?>
						<h3>£<?=$stock_item->price?></h3>
						<?php
					}
					else { ?>
						<h3>Was £<?=$stock_item->price?>, Now £<?=$stock_item->sale_price?></h3>
						<a href = "products?product_id=<?=$stock_item->product_id?>">View Product</a>
						<?php
					}
					?>

				</div>
				<?php
			}
		}
		?>
	</ul>

</section>
