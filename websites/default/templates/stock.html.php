<section class="left">
	<ul>
		<?php
		foreach($cats as $cat) {
			?>
			<li><a href = "product?category_id=<?=$cat->id?>"></a></li>
		<?php
		}
		?>
	</ul>
</section>
<section class="right">
	<h1>Our stock</h1>
<ul class="stock">
<?php
foreach($stock as $stock_item) {
	echo($stock_item->name);
	if ($stock_item->archived != '1') { ?>
<li>
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
	<h2><?=$stock_item->getCategory()->name?> <?=$stock_item->name?></h2>
	<?php
	if ($stock_item->saleprice == '' || $stock_item->saleprice == $stock_item->price){ ?>
		<h3>£<?=$stock_item->price?></h3>
	<?php
	}
	else { ?>
		<h3>Was £<?=$stock_item->price?>, Now £<?=$stock_item->saleprice?></h3>
	<?php
	}
	?>

</div>
</li>
<?php
}
}
?>
</ul>

</section>
