<h2>Stock</h2>
<a class="new" href="/admin/stock/edit">Add new stock item</a>
<table>
    <thead>
        <tr>
            <th style="width: 100px">Name</th>
            <th style="width: 100px">Price</th>
            <th style="width: 100px">Sales Price</th>
            <th style="width: 20%">Quantity</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 5%">&nbsp;</th>
        </tr>
        <?php
        foreach ($stock as $stock_item) {
            //only load stock that are not archived
            if ($stock_item->archived != '1') {
                $sale_price = $stock_item->sale_price;
                $current_price = $stock_item->price;
                ?>
                <tr>
                    <td><?=$stock_item->name?></td>
                    <td><?=$current_price?></td>
                    <?php //displays sale price if it is set
                    if ($sale_price != 0 && $sale_price != $current_price){ ?>
                        <td><?=$sale_price?></td>
                        <?php
                    }
                    else { ?>
                        <td>Not set</td>
                        <?php
                    }
                    <td><?$stock_item->quantity?></td>
                    ?>
                    <td><a style="float: right" href="/admin/stock/edit?id=<?=$stock_item->product_id?>">Edit</a></td>
                    <td>
                        <form method="post" action="/admin/stock/archive">
                            <input type="hidden" name="stock[id]" value="<?=$stock_item->product_id?>" />
                            <input type="submit" name="submit" value="Archive" />
                        </form>
                    </td>
                    <td>
                        <form method="post" a8ction="/admin/stock/delete">
                            <input type="hidden" name="stock" value="<?=$stock_item->product_id?>" />
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
