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
  <div class="mt-5 pb-0">
    <div class="row pt-3">
      <div class="col-md-8 cart position-relative">
        <h5><b>THÔNG TIN NGƯỜI MUA</b></h5>
        <?
        if (isset($message)) {
          foreach ($message as $message) {
            echo '<p class="text-danger ms-2 m-0">' . $message . '</p>';
          }
        }
        ?>
        <form method="post" action="./index.php?pages=cart&action=bill">
          <div class="row m-0">
            <div class="col-12 mb-3">
              <label class="mb-1">Tên</label>
              <input type="text" name="name" class="form-control" placeholder="Cristiano Ronaldo">
            </div>
            <div class="col-12 mb-3">
              <label class="mb-1">Email</label>
              <input type="email" name="email" class="form-control" placeholder="cr7@messi.com">
            </div>
            <div class="col-12 mb-3">
              <label class="mb-1">Số điện thoại</label>
              <input type="text" name="phone" class="form-control" placeholder="01 ai biết">
            </div>
            <div class="col-12 mb-3">
              <label class="mb-1">Địa chỉ</label>
              <input type="text" name="address" class="form-control" placeholder="Ấp nhà chồi, xã nhà lá, huyện nhà tường, tỉnh ngủ đi em ơi!">
            </div>
            <div class="col-12 mb-3">
              <label class="mb-1">Ghi Chú</label>
              <input type="text" name="note" class="form-control" placeholder="Gói hàng kĩ kĩ xíu nha ní!">
            </div>
          </div>
          <div class="back-to-shop position-absolute bottom-0 right-0 mb-3"><a href="./index.php?pages=home"><i class="fa fa-arrow-left"></i> Trở lại</a></div>
      </div>
      <div class="col-md-4 summary rounded-0 cart">
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
              <div class="col-2"><img class="img-fluid" src="../admin/uploaded_img/<?php echo $value['image'] ?>" width="100px"></div>
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
        </form>
      </div>
    </div>
  </div>
<?php
} else {
  echo '';
}
?>