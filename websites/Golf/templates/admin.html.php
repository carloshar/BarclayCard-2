<main class="home">
		<p>Stock Tracking</p>

        <h3> Number of Members </h3> 
        <p> 3 </p>
        <h3> Number of Buggy Hires </h3> 
        <?php foreach($buggy as $bug){ ?>
        <p><?=$bug->date?> number: 1</p>
        <?php } ?>
        <h3> Number of Rounds Booked </h3> 
        <?php foreach($rounds as $round){ ?>
        <p><?=$round->date?> Number: <?=$round->norounds?> </p>
        <?php } ?>
        <h3> Number of Products Sold </h3>
        <?php foreach($basket as $item){ ?>
        <p><?=$item->getProduct()->name?> Quantity Left: <?=(10 - $item->quantity)?> </p>
        <?php } ?>
</main>