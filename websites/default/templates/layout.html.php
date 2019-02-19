<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />

		<title><?=$title?></title>
		
		<meta name="description" content="" />

		<link rel="stylesheet" href="/BCStyle.css"/>
		
		<link rel="apple-touch-icon" sizes="180x180" href="/public/images/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/public/images/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/public/images/favicons/favicon-16x16.png">
		<link rel="manifest" href="/public/site.webmanifest">
		<link rel="mask-icon" href="/public/images/favicons/safari-pinned-tab.svg" color="#ffc80d">

		<meta name="msapplication-TileColor" content="#ffc40d">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body>
		<header>
			<section>
				<aside>
					<h3>Opening Hours:</h3>
				</aside>
				<img src="/images/logo.png"/>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/link2">Link 2</a></li>
				<li><a href="/link3">Link 3</a></li>
				<li><a href="/link4">Link 4</a></li>
				<li><a href="/link5">Link 5</a></li>
				<?php
				if (!isset($_SESSION['loggedin'])){ ?>
					<li><a href="/login">Login</a></li>
				<?php
				}
				if (isset($_SESSION['loggedin'])){ ?>
					<li><a href="/logout">Logout</a></li>
				<?php
				}
				?>
			</ul>
		</nav>
		<img src="/images/randombanner.php"/>
		<?php
		if (strpos($_SERVER['REQUEST_URI'],'admin') !== false) { ?>
    		<main class="admin">
			    <section class="left">
			        <ul>
			            <li><a href="/admin/link1">Link 1</a></li>
			            <li><a href="/admin/link2">Link 2</a></li>
						<li><a href="/admin/link3">Link 3</a></li>
						<li><a href="/admin/link4">Link 4/a></li>
						<li><a href="/admin/link5">Link 5</a></li>
						<li><a href="/admin/link6">Link 6</a></li>
			        </ul>
			    </section>
			    <section class="right">
		<?php //if admin is in the URL, use main class of admin. If not, use home.
	} else if ((strpos($_SERVER['REQUEST_URI'],'cars') !== false) && strpos($_SERVER['REQUEST_URI'],'admin') !== true) { ?>
			<main class="admin">
		<?php
		} else { ?>
			<main class ="home">
		<?php
		}
		?>
		<?=$output?>
		<?php
		if (strpos($_SERVER['REQUEST_URI'],'admin') !== false) { ?>
			</section>
		<?php
		}
		?>
		</main>
		<footer>
			&copy; 2019 Painting by Numbers
		</footer>
	</body>
</html>
