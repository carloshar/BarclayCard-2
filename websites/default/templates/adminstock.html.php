<h2>Cars</h2>
<a class="new" href="/admin/stock/edit">Add new stock_item</a>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th style="width: 10%">Price</th>
      <th style="width: 10%">Quantity</th>
      <th style="width: 10%">Added by</th>
      <th style="width: 5%">&nbsp;</th>
      <th style="width: 5%">&nbsp;</th>
      <th style="width: 5%">&nbsp;</th>
    </tr>
    <?php
    foreach ($stock as $stock_item) {
      //only load stock that are not archived
      if ($stock_item->archived != '1') { ?>
        <tr>
          <td><?=$stock_item->name?></td>
          <td><?=$stock_item->price?></td>
          <?php //displays sale price if it is set
          if ($stock_item->saleprice != '' && $stock_item->saleprice != $stock_item->price){ ?>
            <td><?=$stock_item->saleprice?></td>
            <?php
          }
          else { ?>
            <td>Not set</td>
            <?php
          }
          ?>
          <td><?=$stock_item->getUser()->firstname?></td>
          <td><a style="float: right" href="/admin/stock/edit?id=<?=$stock_item->id?>">Edit</a></td>
          <td>
            <form method="post" action="/admin/stock/archive">
              <input type="hidden" name="stock[id]" value="<?=$stock_item->id?>" />
              <input type="submit" name="submit" value="Archive" />
            </form>
          </td>
          <td>
            <form method="post" a8ction="/admin/stock/delete">
              <input type="hidden" name="stock" value="<?=$stock_item?>" />
              <input type="submit" name="submit" value="Delete" />
            </form>
          </td>
        </tr>
        <?php
      }
    }
    ?>
  </thead>
</table>
