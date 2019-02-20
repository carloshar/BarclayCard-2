<h2>Enquiries</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Preview</th>
      <th style="width: 5%">&nbsp;</th>
      <th style="width: 5%">&nbsp;</th>
    </tr>
    <?php
    foreach ($reviews as $review) {
      if ($review->approved == ''){
        //if the review is not already approved display it
        if (strlen($review->content) > 50) {
          //if the review is over 50 characters display a preview of it
          $reviewcontent = substr($review->content, 0, 50) . '...';
        }
        else {
          $reviewcontent = $review->content;
        }
        ?>
        <tr>
          <td><?=$review->id?></td>
          <td><?=$reviewcontent?></td>
          <td><a style="float: right" href="/admin/reviews/approve?id=<?=$review->id?>">Reply</a></td>
          <td>
            <form method="post" action="/admin/reviews/approve">
              <input type="hidden" name="id" value="<?=$review?>" />
              <input type="submit" name="submit" value="Approve" />
            </form>
          </td>
          <td>
            <form method="post" action="/admin/reviews/delete">
              <input type="hidden" name="id" value="<?=$review->id?>" />
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
