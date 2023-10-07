<?php
$total = 0;
$soPhanTu = 0;
if (!isset($_SESSION['cart']) || (count($_SESSION['cart']) == 0)) {
  $message[] = 'Không có sản phẩm nào trong giỏ hàng!';
} else {
  if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $data) {

      // Tính tổng giá tiền và số lượng sản phẩm
      $total += $data['price'] * $data['quantity'];
      $soPhanTu += $data['quantity'];
    }


    if (isset($_GET['ac'])) {
      if ($_GET['ac'] == "remove") {
        foreach ($_SESSION['cart'] as $key => $data) {
          if ($data['id'] == $_GET['id']) {
            unset($_SESSION['cart'][$key]);
            $total -= $data['price'] * $data['quantity'];
            $soPhanTu -= $data['quantity'];
          }
        }
      }
      if ($_GET['ac'] == "clearall") {
        unset($_SESSION['cart']);
        unset($total);
        unset($soPhanTu);
        $message[] = 'Không có sản phẩm nào trong giỏ hàng!';
      }
      if ($_GET['ac'] == "increase") {
        if ($data['id'] == $_GET['id']) {
          // Tăng số lượng sản phẩm lên 1
          $_SESSION['cart'][$key]['quantity'] += 1;
          $total += $data['price'];
          $soPhanTu += 1;
        }
      }
      if ($_GET['ac'] == "decrease") {
        // Giảm số lượng sản phẩm đi 1 (nếu lớn hơn 1)
        if ($_SESSION['cart'][$key]['quantity'] > 1) {
          $_SESSION['cart'][$key]['quantity'] -= 1;
          $total -= $data['price'];
          $soPhanTu -= 1;
        }
      }
    }
  } else {
    echo '';
  }
}
?>

<div class="mt-5 pb-0">
  <div class="row pt-4">
    <div class="col-md-12 cart">
      <div class="title">
        <div class="row">
          <div class="col">
            <h5><b>GIỎ HÀNG</b></h5>
          </div>
        </div>
      </div>
      <div class="row border-top">
        <?php
        if (isset($message)) {
          foreach ($message as $message) {
            echo '<p class="text-danger text-center p-0 mt-2 mb-2">' . $message . '</p>';
          }
        }
        ?>
        <?php
        if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $value) :
        ?>
            <hr class="p-0 m-0">
            <div class="row main align-items-center">
              <div class="col-2"><img class="img-fluid" src="../admin/uploaded_img/<?php echo $value['image'] ?>" width="100px"></div>
              <div class="col text-center">
                <div class="text-center"><?php echo $value['name'] ?></div>
              </div>
              <div class="col text-center">
                <div class="">Giá: <?php echo number_format($value['price'], 3); ?>đ</div>
              </div>
              <div class="col-1 text-center d-flex justify-content-center align-items-center">
                <a href="./index.php?pages=cart&action=cart&ac=decrease&id=<?php echo $value['id'] ?>"><i class="fa fa-minus"></i></a>
                <label name="quantity" class="ms-2 me-2 btn btn-dark" min='1'><?php echo $value['quantity']; ?></label>
                <a href="./index.php?pages=cart&action=cart&ac=increase&id=<?php echo $value['id'] ?>"><i class="fa fa-plus"></i></a>
              </div>
              <div class="col text-center">= <?php echo number_format($value['price'] * $value['quantity'], 3) ?>đ</div>
              <div class="col text-center"><a href="./index.php?pages=cart&action=cart&ac=remove&id=<?php echo $value['id'] ?>"><i class="fa fa-xmark" title="Xóa"></i></a></div>
            </div>
          <?php endforeach ?>
        <?php } else {
          echo '';
        } ?>
        <hr>
        <div class="row">
          <?php if (isset($total)) { ?>
          <div class="col-9 ms-4 text-end mb-4">= <?php
          echo number_format($total, 3); 
          ?>đ</div>
          <div class="col text-center"><a href="./index.php?pages=cart&action=cart&ac=clearall" title="Xóa tất cả"><i class="fa fa-trash"></i></a></div>
        </div>
        <hr>
        <div class="text-center mt-3">
          <a href="./index.php?pages=cart&action=pay" class="btn btn-dark me-3 w-25 pt-3 pb-3 <?php
          echo ($total > 1) ? '' : 'disabled'; 
          ?>">Thanh toán</a>
          <?php } else {
            $total = '';
          }
          ?>
        </div>
      </div>
      <div class="back-to-shop"><a href="./index.php?pages=home"><i class="fa fa-arrow-left"></i> Tiếp tục mua hàng</a></div>
    </div>

  </div>

</div>