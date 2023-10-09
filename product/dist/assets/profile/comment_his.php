<section class="py-5 pb-0 mb-5">
  <div class="d-flex align-items-center mt-5 ms-3 pt-2">
    <?php
    if (isset($user_id)) {
      foreach (getUserSession($user_id) as $item) : ?>
        <a href="./index.php?pages=profile&action=file&id_comment=<?= $item['id'] ?>"><i class="fa fa-arrow-left" style="font-size: 24px;"></i></a>
      <?php endforeach ?>
    <?php } else {
      echo '';
    } ?>
    <h4 class="ms-3 mt-2 text-uppercase">Lịch sử bình luận</h4>
  </div>
  <table class="table mb-0 mt-3">
    <thead>
      <tr>
        <th scope="col" class="ps-4 p-3">Sản phẩm bình luận</th>
        <th scope="col" class="p-3">Nội dung bình luận</th>
        <th scope="col" class="p-3">Ngày bình luận</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['id'])) {
        foreach (getCommentIdUser($user_id) as $item) : ?>
          <tr>
            <td class="ps-4 p-3"><?= $item['product_name'] ?></td>
            <td class="p-3"><?= $item['content'] ?></td>
            <td class="p-3"><?= $item['comment_at'] ?></td>
          </tr>
        <?php endforeach ?>
      <?php } else {
        echo '';
      } ?>
    </tbody>
  </table>
</section>