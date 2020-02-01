<main class="admin">
<?php if(isset($errors)){ ?>
   <h3 style="color:red;"> Errors </h3> 
  <?php  foreach($errors as $error){?>
        <p style="color:red;"><?=$error?></p>
    <?php }}?>
<form action="/admin/staff" method="POST">
<label>Enter a username</label>
<input type="text" name="user[username]">
<label>Enter a password</label>
<input type="text" name="user[password]">
<input type="submit" name="save" value="Create Admin">
</form>
<?php foreach($staff as $user){ ?>
    <form action="/admin/staff" method="POST">
<input type="hidden" name="user[id]" value="<?=$user->id?>">
<label>username</label>
<input type="text" name="user[username]" value="<?=$user->username?>">
<label>password</label>
<input type="text" name="user[password]" value="<?=$user->password?>">
<input type="submit" name="delete" value="Remove Admin">
</form>
<?php } ?>
</main>