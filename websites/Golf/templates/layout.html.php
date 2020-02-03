<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?=$title?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<h1>Stuart Balls, </h1>
			<h1>The Best Prices Around</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/GolfEquipment/list">Our Products</a></li>
			<li><a href="/about">About Us</a></li>
			<li><a href="/faq">FAQ's</a></li>
			<li><a href="/basket">Basket</a></li>
			<li><a href="/membership">Membership</a></li>
			<li><a href="/buggyhire">Buggy Hire</a></li>
			<?php if(isset($_SESSION['loggedin'])){?>
			<li><a href="/bookrounds">Booking Rounds</a></li>
			<?php if($_SESSION['type'] == "A"){?>
			<li><a href="/admin">Admin</a></li>
			<?php }} ?>
			
		</ul>

	</nav>
<img class="banner" src="/images/randombanner.php"/>
	
    <?=$output?>


	<footer>
		&copy; Stuart Balls, The Best Prices Around 2020
	</footer>
</body>
</html>