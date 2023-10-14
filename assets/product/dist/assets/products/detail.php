<!-- Product section-->
<section class="py-5 mt-5">
  <a href="./index.php?pages=products&action=list" class="d-flex ms-3 mt-3">
    <i class="fa fa-arrow-left" style="font-size: 24px;"></i>
    <h4 class="ms-2 text-uppercase">Sản phẩm</h4>
  </a>
  <div class="container px-4 px-lg-5 my-5">
    <?php foreach (getProductDetail($detail) as $item) : ?>
      <?php
      $product_price = $item['product_price'];
      $product_sale = $item['product_sale'];

      // Tính phần trăm giảm
      $discount = (($product_price - $product_sale) / $product_price) * 100;
      ?>
      <form method="post" action="./index.php?pages=products&action=detail&detail=<?= $item['id']; ?>&category=<?= $item['category']; ?>&id=<?= $item['id'] ?>">
        <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-6 text-center"><img class="card-img-top mb-5 mb-md-0 w-100" src="./assets/admin/uploaded_img/<?= $item['image']; ?>" alt="..." /></div>
          <div class="col-md-6">
            <div class="small mb-1">Danh Mục: <?= $item['name_cate']; ?></div>
            <h1 class="h4 mt-2 mb-2 fw-bolder"><?= $item['product_name']; ?></h1>
            <div class="fs-6">
              <span class="text-decoration-line-through"><?= number_format($item['product_price'], 3); ?>đ</span>
              <span class="text-danger h5 ms-2"><?= number_format($item['product_sale'], 3); ?>đ</span>
            </div>
            <div class="fs-6">
              <?php foreach (getViewProduct($detail) as $getViewProduct) : ?>
                <label class="mt-2 mb-1"><?= $getViewProduct['view_count']; ?> Lượt xem</label>
              <?php endforeach ?>
            </div>
            <p class="lead"><?= $item['describe']; ?></p>
            <div class="d-flex">
              <input class="form-control text-center me-3" id="inputQuantity" type="num" name="quantity" value="1" style="max-width: 5rem" />
              <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="add_to_cart" <?php if (isset($lock)) {
                                                                                                    echo $lock; ?> <?php
                                                                                                                                          } else {
                                                                                                                                            $lock = '';
                                                                                                                                          }
                                                                                                                                            ?>>
                <i class="bi-cart-fill me-1"></i>
                Thêm vào giỏ hàng
              </button>
              <input type="hidden" name="name" value="<?= $item['product_name'] ?>">
              <input type="hidden" name="price" value="<?= $item['product_sale'] ?>">
              <input type="hidden" name="image" value="<?= $item['image'] ?>">
            </div>
          </div>
        </div>
      </form>
    <?php endforeach ?>
  </div>
</section>
<!-- Comments -->
<section class="p-0 bg-light">
  <div class="">
    <div class="">
      <div class="">
        <div class="">
          <div class="card-body p-4 ps-5 pe-5">
            <h4 class="ms-2">Bình luận</h4>
            <?php
            if (isset($message)) {
              foreach ($message as $message) {
                echo '<p class="text-danger ms-2">' . $message . '</p>';
              }
            }
            ?>
            <?php
            if (isset($_SESSION['id'])) {
              $user_id = $_SESSION['id'];
              foreach (getUserSession($user_id) as $getU) : ?>
                <div class="d-flex align-items-center justify-content-start ms-2 mb-4 mt-5">
                  <img class="rounded-circle shadow-1-strong me-3" src="./assets/admin/uploaded_img/<?= $getU['image'] ?>" alt="avatar" width="50" height="50" />
                  <form method="post" class="w-100 d-flex slidebar">
                    <?php foreach (getProductDetail($detail) as $item) : ?>
                      <?php
                      $tb = '';
                      if ($item['toggle'] == 0) {
                        $item['toggle'] = '';
                        $tb = 'Viết bình luận của bạn..';
                      } else {
                        $item['toggle'] = 'disabled';
                        $tb = 'Người quản trị đã tắt bình luận sản phẩm này';
                      }
                      ?>
                      <?php
                      if (isset($_SESSION['id'])) {
                        $user_id = $_SESSION['id'];
                        foreach (getUserSession($user_id) as $getUserSession) : ?>
                          <?php
                          if ($getUserSession['status'] == 1) {
                            $item['toggle'] = 'disabled';
                          }
                          ?>
                        <?php endforeach ?>
                      <?php } else {
                        $user_id = '';
                      } ?>
                      <input type="text" name="content" class="rounded-5 ps-3" placeholder="<?= $tb ?>" <?= $item['toggle'] ?>>
                      <input type="hidden" name="id_users" value="<?= $getU['id'] ?>">
                      <?php foreach (getProductDetail($detail) as $getIdProduct) : ?>
                        <input type="hidden" name="id_product" value="<?= $getIdProduct['id'] ?>">
                      <?php endforeach ?>
                      <button type="submit" name="submit_comment" class="border-0 bg-light w-auto ms-3" <?= $item['toggle'] ?>><i class="fa fa-paper-plane" title="Gửi" style="font-size: 24px;"></i></button>
                    <?php endforeach ?>
                  </form>
                </div>
              <?php endforeach ?>
            <?php } else {
              $err[] = 'Vui lòng đăng nhập vào <a href="./index.php?pages=account&action=login" class="text-danger text-decoration-underline">GWine</a> để bình luận!';
            } ?>
            <?php
            if (isset($err)) {
              foreach ($err as $err) {
                echo '<p class="text-black ms-2">' . $err . '</p>';
              }
            }
            ?>
            <?php foreach (getCommentWithIdProduct($detail) as $getCmt) : ?>
              <div class="row">
                <div class="col">
                  <div class="d-flex flex-start mb-3">
                    <!-- Comment -->
                    <a href="./index.php?pages=profile&action=file_person&profile_id=<?= $getCmt['id_users'] ?>" class=""><img class="rounded-circle shadow-1-strong mt-2 me-3" src="./assets/admin/uploaded_img/<?= $getCmt['user_image'] ?>" alt="avatar" width="50" height="50" /></a>
                    <div class="flex-grow-1 flex-shrink-1">
                      <div>
                        <div class="">
                          <p class="mb-1">
                            <?= $getCmt['user_name'] ?>
                          </p>
                          <p class="small mb-2">
                            <?= $getCmt['content'] ?>
                          </p>
                        </div>
                        <div class="d-flex align-items-center">
                          <span class="small me-3"><?= $getCmt['comment_at'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Related items section-->
<section class="card-body p-4 ps-5 pe-5">
  <h4 class="ms-2 mb-4 mt-4 pb-2 text-uppercase">Sản phẩm liên quan</h4>
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row">
      <?php foreach (getProductCategory($category) as $data) : ?>
        <?php
        $product_price = $data['product_price'];
        $product_sale = $data['product_sale'];

        // Tính phần trăm giảm
        $discount = (($product_price - $product_sale) / $product_price) * 100;
        ?>
        <div class="col-lg-3 col-sm-6 mb-4">
          <!-- Portfolio item 1-->
          <?php foreach (getProductDetail($detail) as $item) : ?>
            <form method="post" class="p-0 m-0" action="./index.php?pages=products&action=detail&detail=<?= $item['id']; ?>&category=<?= $item['category']; ?>&id=<?= $item['id'] ?>">
            <? endforeach ?>
            <div class="portfolio-item border border-dark">
              <div class="position-relative">
                <button class="top-0 mt-3 position-absolute start-0 btn btn-social btn-danger">-<?php echo number_format($discount); ?>%</button>
                <a data-bs-toggle="modal" href="./index.php?pages=products&action=detail&detail=<?= $data['id']; ?>&category=<?= $data['category']; ?>" title="Xem chi tiết">
                  <img class="img-fluid mb-4" src="./assets/admin/uploaded_img/<?= $data['image']; ?>" alt="Ảnh sản phẩm" />
                  <a href="./index.php?pages=products&action=detail&detail=<?= $data['id']; ?>&category=<?= $data['category']; ?>" class="bottom-0 position-absolute start-0 w-100 btn btn-danger rounded-0">Xem chi tiết</a>
                </a>
              </div>
              <div class="portfolio-caption text-center m-3 mt-2">
                <small class="truncate-text mb-1"><?= $data['name_cate']; ?></small>
                <div class="portfolio-caption-heading truncate-text mb-2 h5 mt-2"><?= $data['product_name']; ?></div>
                <div class="portfolio-caption-subheading text-muted truncate-text mb-2"><?= $data['describe']; ?></div>
                <div class="d-flex justify-content-center">
                  <s class="portfolio-caption-subheading text-muted me-1"><?php echo number_format($data['product_price'], 3); ?>đ</s>
                  <div class="portfolio-caption-subheading text-danger h5 ms-1"><?= number_format($data['product_sale'], 3); ?>đ</div>
                </div>
                <div class="mt-2">
                  <input class="btn btn-danger me-1 <?php echo $lock; ?>" type="submit" value="Mua Ngay" name="add_to_cart">
                </div>
                <input type="hidden" name="name" value="<?= $data['product_name'] ?>">
                <input type="hidden" name="price" value="<?= $data['product_sale'] ?>">
                <input type="hidden" name="image" value="<?= $data['image'] ?>">
                <input type="hidden" name="quantity" value="1">
              </div>
            </div>
            </form>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>