<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Đơn hàng</h1>
    <table class="table">
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
          <th scope="col" class="p-3">Hành động</th>
        </tr>
      </thead>
      <?php
      foreach (getAllBill() as $item) : ?>
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
              <a class="btn btn-danger mb-1" title="Chỉnh trạng thái" href="./index.php?pages=order&action=edit&edit=<?= $item['id'] ?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger mb-1" title="Xem chi tiết" href="./index.php?pages=order&action=detail&vieworder=<?= $item['id'] ?>"><i class="fa fa-eye"></i></a>
              <a class="btn btn-danger mb-1" href="./index.php?pages=order&action=list&delete=<?= $item['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?'); "><i class="fa fa-trash"></i></a>
            <?php endforeach ?>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>