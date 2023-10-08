<section class="py-5 pb-0">
  <div class="d-flex align-items-center mt-5 ms-3 pt-2">
    <?php
    if (isset($user_id)) {
      foreach (getUserSession($user_id) as $item) : ?>
        <a href="./index.php?pages=profile&action=file&id_comment=<?= $item['id'] ?>"><i class="fa fa-arrow-left" style="font-size: 24px;"></i></a>
      <?php endforeach ?>
    <?php } else {
      echo '';
    } ?>
    <h4 class="ms-3 mt-2 text-uppercase">Đơn hàng</h4>
  </div>
  <table class="table mb-0">
    <thead>
      <tr>
        <th scope="col" class="ps-4 p-3">Mã đơn</th>
        <th scope="col" class="p-3">Tên</th>
        <th scope="col" class="p-3">Email</th>
        <th scope="col" class="p-3">Số điện thoại</th>
        <th scope="col" class="p-3">Địa chỉ</th>
        <th scope="col" class="p-3">Ghi chú</th>
        <th scope="col" class="p-3">Tổng tiền</th>
        <th scope="col" class="p-3">Hình thức</th>
        <th scope="col" class="p-3">Ngày đặt</th>
        <th scope="col" class="p-3">Trạng thái</th>
        <th scope="col" class="p-3">Chi tiết</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($user_id)) {
        foreach (getBill($user_id) as $item) : ?>
          <?php if ($item['pay'] == 0) {
            $item['pay'] = 'Tiền mặt';
          } else {
            $item['pay'] = 'Chuyển khoản';
          }
          if ($item['status'] == 0) {
            $item['status'] = 'Chờ xác nhận';
          } elseif ($item['status'] == 1) {
            $item['status'] = 'Đang chuẩn bị';
          } elseif ($item['status'] == 2) {
            $item['status'] = 'Đang giao hàng';
          } elseif ($item['status'] == 3) {
            $item['status'] = 'Đã giao';
          }
          ?>
          <tr>
            <td class="ps-4 p-3">#<?= $item['id'] ?></td>
            <td class="p-3"><?= $item['name'] ?></td>
            <td class="p-3"><?= $item['email'] ?></td>
            <td class="p-3"><?= $item['phone'] ?></td>
            <td class="p-3"><?= $item['address'] ?></td>
            <td class="p-3"><?= $item['note'] ?></td>
            <td class="p-3"><?= number_format($item['total'], 3) ?>đ</td>
            <td class="p-3"><?= $item['pay'] ?></td>
            <td class="p-3"><?= $item['create_at'] ?></td>
            <td class="p-3"><?= $item['status'] ?></td>
            <td class="p-3">
              <?php
              foreach (getUserSession($user_id) as $user) : ?>
                <a class="btn btn-danger mb-2" title="Xem chi tiết" href="./index.php?pages=profile&action=vieworder&vieworder=<?= $item['id'] ?>&id=<?= $user['id'] ?>"><i class="fa fa-eye"></i></a>
              <?php endforeach ?>
            </td>
          </tr>
        <?php endforeach ?>
      <?php } else {
        echo '';
      } ?>
    </tbody>
  </table>
</section>