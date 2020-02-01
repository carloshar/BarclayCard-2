<main class="admin">
<?php if(isset($errors)){ ?>
   <h3 style="color:red;"> Errors </h3> 
  <?php  foreach($errors as $error){?>
        <p style="color:red;"><?=$error?></p>
    <?php }}?>
    <p>Here you can create a category</p>
<form action="/admin/category" method="POST">
    <input type="hidden" name="category[id]">
    <label>Category Name</label>
    <input type="text" name="category[name]">
    <input type="submit" name="save" value="Create Category">
    </form>
    <p>Here are all categorys saved</p>
<?php foreach($categories as $cat){ ?>
    <form action="/admin/category" method="POST">
    <input type="hidden" value="<?=$cat->id?>" name="category[id]">
    <label>Category Name</label>
    <input type="text" value="<?=$cat->name?>" name="category[name]">
    <input type="submit" name="save" value="Save Category">
    <input type="submit" name="delete" value="Delete Category">
    </form>

<?php }?>
</main>