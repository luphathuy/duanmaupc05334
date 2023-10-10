<section class="py-5 pb-0 mb-3" style="overflow-x: scroll;">
  <?php
  if (isset($user_id)) {
    foreach (getUserSession($user_id) as $item) : ?>
      <a href="./index.php?pages=profile&action=file&id_comment=<?= $item['id'] ?>" class="d-flex mt-5 pt-2 ms-2"><i class="fa fa-arrow-left" style="font-size: 24px;"></i>
        <h4 class="ms-3 text-uppercase">Lịch sử liên hệ</h4>
      </a>
    <?php endforeach ?>
  <?php } else {
    echo '';
  } ?>
  <table class="table mb-0">
    <thead>
      <tr>
        <th scope="col" class="ps-4 p-3">Tên</th>
        <th scope="col" class="p-3">Email</th>
        <th scope="col" class="p-3">Số điện thoại</th>
        <th scope="col" class="p-3">Nội dung</th>
        <th scope="col" class="p-3">Ngày gửi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['id'])) {
        foreach (getContactSession($user_id) as $item) : ?>
          <tr>
            <td class="ps-4 p-3"><?= $item['name'] ?></td>
            <td class="p-3"><?= $item['email'] ?></td>
            <td class="p-3"><?= $item['phone'] ?></td>
            <td class="p-3"><?= $item['content'] ?></td>
            <td class="p-3"><?= $item['create_at'] ?></td>
          </tr>
        <?php endforeach ?>
      <?php } else {
        echo '';
      } ?>
    </tbody>
  </table>
</section>