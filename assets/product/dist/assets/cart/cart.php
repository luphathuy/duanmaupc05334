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
        if (isset($cart)) {
          foreach ($cart as $cart) {
            echo '<p class="text-danger text-center p-0 mt-2 mb-2">' . $cart . '</p>';
          }
        }
        ?>
        <?php
        if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $value) :
        ?>
            <hr class="p-0 m-0">
            <div class="row main align-items-center m-0">
              <div class="col-md-2 col-6"><img class="img-fluid" src="./assets/admin/uploaded_img/<?= $value['image'] ?>" width="100px"></div>
              <div class="col-md-2 col-6 text-center">
                <div class="text-center"><?= $value['name'] ?></div>
              </div>
              <div class="col-md-2 col-4 mt-3 mt-md-0 text-center">
                <div class="">Giá: <?php echo number_format($value['price'], 3); ?>đ</div>
              </div>
              <div class="col-md-2 col-4 mt-3 mt-md-0 text-center d-flex justify-content-center align-items-center">
                <a href="./index.php?pages=cart&action=cart&ac=decrease&id=<?= $value['id'] ?>"><i class="fa fa-minus"></i></a>
                <label name="quantity" class="ms-2 me-2 btn btn-dark" min='1'><?= $value['quantity']; ?></label>
                <a href="./index.php?pages=cart&action=cart&ac=increase&id=<?= $value['id'] ?>"><i class="fa fa-plus"></i></a>
              </div>
              <div class="col-md-2 col-4 mt-3 mt-md-0 text-center">= <?php echo number_format($value['price'] * $value['quantity'], 3) ?>đ</div>
              <div class="col-md-2 col-12 mt-5 mt-md-0 text-center"><a href="./index.php?pages=cart&action=cart&ac=remove&id=<?= $value['id'] ?>"><i class="fa fa-xmark" title="Xóa"></i></a></div>
            </div>
          <?php endforeach ?>
        <?php } else {
          echo '';
        } ?>
        <hr>
        <div class="row m-0 main">
          <?php if (isset($total)) { ?>
            <div class="col-md-8">

            </div>
            <div class="col-md-2 col-6 text-center mb-4">=
              <?php
              echo number_format($total, 3);
              ?>đ
            </div>
            <div class="col-md-2 col-6 text-center">
              <a href="./index.php?pages=cart&action=cart&ac=clearall" title="Xóa tất cả">
                <i class="fa fa-trash"></i>
              </a>
            </div>
        </div>
        <hr>
        <div class="text-center mt-3">
          <a href="./index.php?pages=cart&action=pay" class="btn btn-dark me-3 w-auto pt-3 pb-3 
          <?php
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