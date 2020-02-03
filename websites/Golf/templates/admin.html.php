<main class="admin">
<section class="left">
		<ul>
		<li><h3 style="color:white;">Admin:-</h3></li>
		</ul>
	</section>

<section class="right">

		<h1>Golf Equipment</h1>

<ul class="furniture">
		<h2>Stock Tracking</h2>
        <li>
        <h3> Number of Members </h3> 
        <p> 3 </p>
        </li>
        <li>
        <h3> Number of Buggy Hires </h3> 
        <?php foreach($buggy as $bug){ ?>
        <p><?=$bug->date?> number: 1</p>
        <?php } ?>
        </li>
        <li>
        <h3> Number of Rounds Booked </h3> 
        <?php foreach($rounds as $round){ ?>
        <p><?=$round->date?> Number: <?=$round->norounds?> </p>
        <?php } ?>
        </li>
        <li>
        <h3> Number of Products Sold </h3>
        <?php foreach($basket as $item){ ?>
        <p><?=$item->getProduct()->name?> Quantity Left: <?=$item->quantity?> </p>
        <?php } ?>
        </li>
</main>