<div id="layoutSidenav_content">
  <form action="" method="post" enctype="multipart/form-data" class="container-fluid px-4">
    <h1 class="text-black mt-4 mb-4 text-uppercase">Cập nhật trạng thái</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<p class="text-primary">' . $message . '</p>';
      }
    }
    ?>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Tên loại</span>
      <?php foreach (getOneBillId($id) as $item) :
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
        <select class="w-100 p-2 rounded-2 border mb-md-3" name="status">
          <option class="text-black" value="<?= $item['status'] ?>"><?= $item['status'] ?></option>
          <option class="text-black" value="0">Chờ xác nhận</option>
          <option class="text-black" value="1">Đang chuẩn bị</option>
          <option class="text-black" value="2">Đang giao hàng</option>
          <option class="text-black" value="3">Đã giao</option>
        </select>
    </div>
    <div class="modal-footer mb-3">
      <a class="btn btn-success float-end" href="./index.php?pages=order&action=list"><i class="fas fa-angle-left"></i> Trở Lại</a>
      <input type="submit" class="btn btn-success float-end ms-2" name="edit_order" value="Cập nhật">
    <?php endforeach ?>
    </div>
  </form>