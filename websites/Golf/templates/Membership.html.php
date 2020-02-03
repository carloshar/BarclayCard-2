
<?php ?>
<main class="admin">

	<section class="left">
		<ul>
		<li><h3 style="color:white;">Info:-</h3></li>
		</ul>
	</section>

	<section class="right">

		<h1>Membership Sign Up / Login</h1>

	<ul class="furniture">


	<?php
        $today = date('Y-m-d');
	 ?>
     <?php if(!isset($_SESSION['loggedin'])){ ?>
		<li>
        <form action="/membership" method="post" enctype="multipart/form-data"> 
        <h3>Sign Up</h3>
		<label>Email:</label><input type="text" name="signup[email]">
        <label>Password:</label><input type="text" name="signup[pass]">
        <input type="hidden" name="signup[date]" value="<?=$today?>">
		<input type="submit" name="signupS" value="Add To Basket">
		</form>
		<?php if(isset($con)){ ?>
			<p> Your membership application has been added to your basket. </p>
		<?php } ?>
        </li><li>
        <h3>Login</h3>
        <form action="/membership" method="post" enctype="multipart/form-data"> 
		<label>Email:</label><input type="text" name="login[email]">
        <label>Password:</label><input type="text" name="login[pass]">
		<input type="submit" name="loginS" value="Login">
		</form>
        </li>
     <?php } ?>
        
        <?php if(isset($_SESSION['loggedin'])){ ?>
        <li>
        <form action="/membership" method="post" enctype="multipart/form-data"> 
		<input type="submit" name="logout" value="Logout">
		</form>
        </li>
        <?php } ?>
		
	

</ul>

</section>
	</main>