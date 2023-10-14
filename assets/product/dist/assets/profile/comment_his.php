<section class="py-5 pb-0 mb-3" style="overflow-x: scroll;">
  <?php
  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    foreach (getUserSession($user_id) as $item) : ?>
      <a href="./index.php?pages=profile&action=file&id_comment=<?= $item['id'] ?>" class="d-flex mt-5 pt-2 ms-2"><i class="fa fa-arrow-left" style="font-size: 24px;"></i>
        <h4 class="ms-3 text-uppercase">Lịch sử bình luận</h4>
      </a>
    <?php endforeach ?>
  <?php } else {
    echo '';
  } ?>
  <table class="table mb-0 mt-3">
    <thead>
      <tr>
        <th scope="col" class="ps-4 p-3">Mã sản phẩm</th>
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
            <td class="ps-4 p-3">#<?= $item['id_product'] ?></td>
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