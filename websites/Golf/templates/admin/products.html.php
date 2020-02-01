<main class="admin">
<?php if(isset($errors)){ ?>
   <h3 style="color:red;"> Errors </h3> 
  <?php  foreach($errors as $error){?>
        <p style="color:red;"><?=$error?></p>
    <?php }}?>
<form action="/admin/products" method="POST" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="prod[name]" >
<label>Description</label>
<input type="text" name="prod[description]" >
<label>Price</label>
<input type="text" name="prod[price]" >
<label>Category</label>
<select name="prod[categoryId]" >
<?php foreach($categories as $cat){?>
<option value= <?=$cat->id?>><?=$cat->name?></option>
<?php }?>
</select>
<label>Condition</label>
<select name="prod[state]">
<option value="NEW">New</option>
<option value="Second-Hand">Second-Hand</option>
</select>
<label>Hidden</label>
<select name="prod[hidden]">
<option value= 0 >Revealed</option>
<option value= 1 >Hidden</option>
</select>
<label>Number of Photos</label>
<input type="text" name="prod[photo]" value="4" >
<label>Image 1</label>
<input type="file" name="image1" >
<label>Image 2</label>
<input type="file" name="image2" >
<label>Image 3</label>
<input type="file" name="image3" >
<label>Image 4</label>
<input type="file" name="image4" >
<input type="submit" name="save" value="Create a Product">
</form>

<?php foreach($furniture as $item){ ?>
<form action="/admin/products" method="POST" enctype="multipart/form-data">
<input type="hidden" name="prod[id]" value="<?=$item->id?>">
<label>Name</label>
<input type="text" name="prod[name]" value="<?=$item->name?>" >
<label>Description</label>
<input type="text" name="prod[description]" value="<?=$item->description?>">
<label>Price</label>
<input type="text" name="prod[price]" value="<?=$item->price?>" >
<label>Category</label>
<select name="prod[categoryId]" >
<?php foreach($categories as $cat){
    if($item->categoryId == $cat->id){?>
        <option selected value="<?=$cat->id?>"><?=$cat->name?></option>
<?php }else{?>
    <option value="<?=$cat->id?>"><?=$cat->name?></option>
<?php }}?>
</select>
<label>Hidden</label>
<select name="prod[hidden]">
    <?php if($item->hidden == 0){?>
        <option selected value= "0" >Revealed</option>
        <option value= "1" >Hidden</option>
    <?php }else{?>
        <option value= "0">Revealed</option>
        <option selected value= "1">Hidden</option>
    <?php } ?>
</select>
<label>Condition</label>
<select name="prod[state]">
    <?php if($item->state == 'NEW' ){ ?>
        <option selected value="NEW">New</option>
        <option value="Second-Hand">Second-Hand</option>
    <?php }elseif($item->state == 'Second-Hand' ){ ?>
        <option value="New">New</option>
        <option selected value="Second-Hand">Second-Hand</option>
    <?php } ?>
</select>
<label>Number of Photos</label>
<input type="text" name="prod[photo]" value="<?=$item->photo?>" >
<?php for($i = 1; $i<=$item->photo; $i++){ ?>
    <label>Image <?=$i?></label>
    <input type="file" name="image<?=$i?>" >
		<?php if (file_exists('images/furniture/ID'. $item->id .'P'. $i . '.jpg')) { ?>
			<a href="/images/furniture/ID<?=$item->id?>P<?=$i?>.jpg"><img src="/images/furniture/ID<?=$item->id?>P<?=$i?>.jpg" style="width: 200px; clear: both" /></a>
		<?php } }?>
<input type="submit" name="save" value="Save">
<input type="submit" name="HR" value="Hide/Reveal">
<input type="submit" name="remove" value="Remove">
</form>
<?php } ?>

</main>