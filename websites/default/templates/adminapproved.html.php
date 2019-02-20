<h2>Reviews</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Preview</th>
      <th>Answered by:</th>
      <th style="width: 5%">&nbsp;</th>
      <th style="width: 5%">&nbsp;</th>
    </tr>
    <?php
    foreach ($reviews as $review) {
      if ($review->approved == '1'){
        //shorten the content if it is longer than 50 character
        if (strlen($review->content) > 50) {
          $reviewcontent = substr($review->content, 0, 50) . '...';
        }
        else {
          $reviewcontent = $review->content;
        }
        ?>
        <tr>
          <td><?=$review->id?></td>
          <td><?=$reviewcontent?></td>
          <td><?=$review->getUser()->username?></td>
          <td>
            <form method="post" action="/admin/reviews/unapprove">
              <input type="hidden" name="id" value="<?=$review?>" />
              <input type="submit" name="submit" value="Unapprove" />
            </form>
          </td>
          <td>
            <form method="post" action="/admin/reviews/deleteapproved">
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
