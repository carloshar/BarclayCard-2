<h2>Categories</h2>
<a class="new" href="/admin/categories/edit">Add new category</a>
<table>
    <thead>
        <tr>
	        <th>Name</th>
	        <th style="width: 5%">&nbsp;</th>
	        <th style="width: 5%">&nbsp;</th>
	    </tr>
        <?php
		foreach ($cats as $cat) {
        ?>
        <tr>
			<td><?=$cat->name?></td>
			<td><a style="float: right" href="/admin/categories/edit?id=<?=$cat->id?>">Edit</a></td>
			<td>
                <form method="post" action="/admin/categories/delete">
                	<input type="hidden" name="id" value="<?=$cat->id?>" />
                	<input type="submit" name="submit" value="Delete" />
        		</form>
            </td>
		</tr>
        <?php
        }
        ?>
	</thead>
</table>
