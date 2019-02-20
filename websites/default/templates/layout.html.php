<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />

		<title><?=$title?></title>

		<meta name="description" content="" />

		<link rel="apple-touch-icon" sizes="180x180" href="/public/images/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/public/images/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/public/images/favicons/favicon-16x16.png">
		<link rel="manifest" href="/public/site.webmanifest">
		<link rel="mask-icon" href="/public/images/favicons/safari-pinned-tab.svg" color="#ffc80d">

		<meta name="msapplication-TileColor" content="#ffc40d">
		<meta name="theme-color" content="#ffffff">

		<link rel="stylesheet" href="https://use.typekit.net/pbh0xwd.css">

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="/styles/lib/normalize.css" />
    <link rel="stylesheet" href="/styles/default.css" />
	</head>
	<body class="page">
		<header class="page__header">

			<button class="header-nav__button" id="buttonNavToggle" type="button" data-toggle="button" aria-pressed="false" autocomplete="off">
				<i class="fas fa-bars"></i>
			</button>

			<a href="/" class="header__logo">
				<img class="logo__image" src="/images/brand.png" alt="">
			</a>

			<button class="header-nav__button" id="buttonSearch" type="button" data-toggle="button" aria-pressed="false" autocomplete="off">
				<i class="fas fa-search"></i>
			</button>
		</header>

		<section class="section__search-form section--hidden">
			<form class="form__search" action="/search.php" method="GET">
				<input class="search__input form-control" type="search" placeholder="Search" />

				<button class="search__button btn btn-outline-secondary" type="submit">
					Search
				</button>
			</form>
		</section>

		<section class="section__site-nav section--hidden">
			<nav class="bc-nav nav--left">
				<ul class="nav__items">
					<li class="nav__item"><a href="/" class="nav__link">Home</a></li>
					<li class="nav__item"><a href="/products" class="nav__link">Products</a></li>
				</ul>
			</nav>
			<nav class="bc-nav nav--right">
				<ul class="nav__items">
					<li class="nav__item">
						<a href="/basket" class="nav__link">
							<i class="fas fa-shopping-basket"></i>
						</a>
					</li>
					<?php
					if (!isset($_SESSION['loggedin'])){ ?>
						<li class="nav__item">
							<a href="/login" class="nav__link">
								<i class="fas fa-sign-in-alt"></i>
							</a>
						</li>
					<?php
					}
					if (isset($_SESSION['loggedin'])){
						$user_type = $_SESSION['user_type']
						?>
						<li class="nav__item">
							<a href="/logout" class="nav__link">
								<i class="fas fa-sign-out-alt"></i>
							</a>
						</li>
						<?php
							if ($user_type  == 0){
						?>
						<li class="nav__item">
							<a href="/dashboard" class="nav__link">
								<i class="fas fa-user-circle"></i>
							</a>
						</li>
						<li class="nav__item">
							<a href="/wishlist" class="nav__link">
								<i class="fas fa-heart"></i>
							</a>
						</li>
						<?php
							}
							else if ($user_type == 1){
						?>
						<li class="nav__item">
							<a href="/admin" class="nav__link">
								<i class="fas fa-user-circle"></i>
							</a>
						</li>
						<?php
							}
					}
						?>
				</ul>
			</nav>
		</section>
		<section class="right">
		<?php //if admin is in the URL, use main class of admin. If not, use home.
		if(strpos($_SERVER['REQUEST_URI'],'admin') !== true) { ?>
			<main class="page__content page--admin">
		<?php } else { ?>
			<main class ="page__content page--home">
		<?php } ?>

			<?=$output?>

		<?php
		if (strpos($_SERVER['REQUEST_URI'],'admin') !== false) { ?>
			</section>
		<?php } ?>

		</main>

		<footer class="page__footer">
			<div class="container">
				<div class="footer-social row justify-content-between align-items-center">
					<div class="col-md-6">
						<p class="mb-0">Get connected with us on social media.</p>
					</div>
					<div class="col-md-6 text-right">
						<nav class="social-nav">
							<ul class="social-nav__items">
								<li class="social-nav__item">
									<a href="#" class="social-nav__link">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>
								<li class="social-nav__item">
									<a href="#" class="social-nav__link">
										<i class="fab fa-twitter"></i>
									</a>
								</li>
								<li class="social-nav__item">
									<a href="#" class="social-nav__link">
										<i class="fab fa-instagram"></i>
									</a>
								</li>
								<li class="social-nav__item">
									<a href="#" class="social-nav__link">
										<i class="fab fa-snapchat-ghost"></i>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="footer-items row">
					<section class="footer-item col-md-6 col-lg-3">
						<h5 class="footer-item__heading">Painting By Numbers</h5>
						<hr class="footer-item__rule">
						<p>Painting By Numbers is a small, but well known art shop business in Northampton, UK. The shop sells prized digital prints.</p>
					</section>
					<section class="footer-item col-md-6 col-lg-3">
						<h5 class="footer-item__heading">Useful Links</h5>
						<hr class="footer-item__rule">
						<ul class="footer-item__list">
							<li class="footer-item__list-item"><a href="/about" class="footer-item__link">About Us</a></li>
							<li class="footer-item__list-item"><a href="/contact" class="footer-item__link">Contact Us</a></li>
							<li class="footer-item__list-item"><a href="/products" class="footer-item__link">Our Products</a></li>
							<li class="footer-item__list-item"><a href="#" class="footer-item__link">Pricing and Shipping</a></li>
						</ul>
					</section>
					<section class="footer-item col-md-6 col-lg-3">
						<h5 class="footer-item__heading">Legal Stuff</h5>
						<hr class="footer-item__rule">
						<ul class="footer-item__list">
							<li class="footer-item__list-item"><a href="#" class="footer-item__link">Terms &amp; Conditions</a></li>
							<li class="footer-item__list-item"><a href="#" class="footer-item__link">Privacy Notice</a></li>
							<li class="footer-item__list-item"><a href="#" class="footer-item__link">Cookies</a></li>
							<li class="footer-item__list-item"><a href="#" class="footer-item__link">More...</a></li>
						</ul>
					</section>
					<section class="footer-item col-md-6 col-lg-3">
						<h5 class="footer-item__heading">General Info</h5>
						<hr class="footer-item__rule">
						<ul class="footer-item__list">
							<li class="footer-item__list-item">
								<i class="fa fa-home"></i>
								Northampton, UK.
							</li>
							<li class="footer-item__list-item">
								<i class="fas fa-envelope"></i>
								contact@paintby123.co.uk
							</li>
							<li class="footer-item__list-item">
								<i class="fas fa-phone"></i>
								01604 352 235
							</li>
							<li class="footer-item__list-item list-item--payments">
								<p style="font-size:0.85rem;margin-bottom:0;">Payments accepted here:</p>
								<i class="fab fa-cc-visa"></i>
								<i class="fab fa-cc-mastercard"></i>
								<i class="fab fa-cc-amex"></i>
								<i class="fab fa-cc-paypal"></i>
							</li>
						</ul>
					</section>
				</div>
				<div class="copyright">
					<p class="copyright__text">Copyright &copy; 2019 Painting By Numbers.</p>
				</div>
			</div>
		</footer>

		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
		></script>
		<script src="/scripts/script.js"></script>
	</body>
</html>
