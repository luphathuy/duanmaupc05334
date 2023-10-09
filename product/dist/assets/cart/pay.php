<?php
$total = 0;
$soPhanTu = 0;
if (isset($_SESSION['cart'])) {
  $soPhanTu += count($_SESSION['cart']);
  foreach ($_SESSION['cart'] as $data) {
    // Tính tổng giá tiền
    $total += $data['price'] * $data['quantity'];
  }
?>
  <section class="py-5 pb-0">
    <form method="post" action="./index.php?pages=cart&action=bill" class="pb-0">
      <div class="row m-0">
        <div class="col-md-8 cart position-relative pt-5 pb-5">
          <h5><b>THÔNG TIN NGƯỜI MUA</b></h5>
          <?
          if (isset($message)) {
            foreach ($message as $message) {
              echo '<p class="text-danger ms-2 m-0">' . $message . '</p>';
            }
          }
          ?>
          <?php
          if (isset($user_id)) {
            foreach (getUserSession($user_id) as $item) : ?>
              <div class="row m-0">
                <input type="hidden" name="id" value="<?= $item['id'] ?>" class="form-control">
                <div class="col-12 mb-3 mt-3">
                  <label class="mb-1">Tên</label>
                  <input type="text" name="name" class="form-control" value="<?= $item['name'] ?>" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="mb-1">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= $item['email'] ?>" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="mb-1">Số điện thoại</label>
                  <input type="text" name="phone" class="form-control" value="<?= $item['phone'] ?>" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="mb-1">Địa chỉ</label>
                  <input type="text" name="address" class="form-control" value="<?= $item['address'] ?>" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="mb-1">Ghi Chú</label>
                  <input type="text" name="note" class="form-control" placeholder="Gói hàng kĩ kĩ xíu nha ní!">
                </div>
              </div>
            <?php endforeach ?>
          <?php
          } else {
            $user_id = '';
          }
          ?>
          <div class="back-to-shop position-absolute bottom-0 right-0 mb-3"><a href="./index.php?pages=home"><i class="fa fa-arrow-left"></i> Trở lại</a></div>
        </div>
        <div class="col-md-4 summary rounded-0 cart pt-5 pb-5">
          <div>
            <h5 class="mb-5"><b>TÓM TẮT</b></h5>
          </div>
          <hr>
          <div class="col" style="padding-left:0;"><?php echo $soPhanTu; ?> Sản Phẩm</div>
          <hr>
          <?php
          if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) : ?>
              <div class="row main align-items-center">
                <div class="col-2"><img class="img-fluid" src="./admin/uploaded_img/<?php echo $value['image'] ?>" width="100px"></div>
                <div class="col text-center">
                  <div class=""><?php echo number_format($value['price'], 3); ?>đ</div>
                </div>
                <div class="col-1 text-center d-flex justify-content-center align-items-center">
                  <label name="quantity" class="ms-2 me-2 btn btn-dark" min='1'>x<?php echo $value['quantity']; ?></label>
                </div>
                <div class="col text-center"><?php echo number_format($value['price'] * $value['quantity'], 3) ?>đ</div>
              </div>
            <?php endforeach ?>
          <?php } else {
            echo '';
          } ?>
          <hr>
          <div>
            <select name="pay" class="mb-0">
              <option class="text-muted" value="0">Thanh toán khi nhận hàng</option>
              <option class="text-muted" value="1">Chuyển khoản</option>
            </select>
          </div>
          <hr>
          <div class="row mb-4">
            <div class="col-8">TỔNG THANH TOÁN</div>
            <div class="col-4 text-right">
              <div><?php echo number_format($total, 3); ?>đ</div>
              <input type="hidden" name="total" value="<?php echo $total; ?>">
            </div>
          </div>
          <button name="payCart" type="submit" class="btn btn-dark w-100">Hoàn tất</button>
        </div>
      </div>
    </form>
  </section>
<?php
} else {
  echo '';
}
?>