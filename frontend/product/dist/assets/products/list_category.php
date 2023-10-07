<section class="row p-3 mt-5 m-0 py-5 pb-0">
  <div class="col-3 pt-0 pe-3 ps-3 mt-5">
    <div id="product_title">
      <h6 class="section-heading text-uppercase ms-2">Tìm kiếm</h6>
    </div>
    <form class="d-flex mb-3" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-danger" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div id="product_title">
      <h6 class="section-heading text-uppercase ms-2">Danh mục</h6>
    </div>
    <ul class="list-group">
      <?php foreach (getAllCategory() as $item) : ?>
        <a href="./index.php?pages=products&action=list_category&id_category=<?= $item['id']; ?>" class="list-group-item d-flex justify-content-between align-items-center pt-3 pb-3">
          <?= $item['name']; ?>
        <?php endforeach ?>
        </a>
    </ul>
  </div>
  <div class="col-9 mt-4">
    <section class="page-section pt-0" id="portfolio">
      <div id="product_title" class='m-0'>
        <h2 class="section-heading mb-0 text-uppercase">Sản phẩm</h2>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <div class="m-0">
          <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="/index.php" class="text-danger text-decoration-none">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="./index.php?pages=products&action=list" class="text-danger text-decoration-none">Sản phẩm</a></li>
            <?php foreach (getProductForCategory($id_category) as $row) : ?>
              <li class="breadcrumb-item active" aria-current="page">
                <a href="./index.php?pages=products&action=list_category&id_category=<?= $row['id']; ?>" class="text-danger text-decoration-none">
                  <?= $row['name']; ?>
                </a>
              </li>
              </li>
          </ol>
        </div>
        <div>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#product_title" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#product_title">1</a></li>
              <li class="page-item"><a class="page-link" href="#product_title">2</a></li>
              <li class="page-item"><a class="page-link" href="#product_title">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#product_title" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="">
        <div class="row">
          <?php foreach (getAllProductCategory($id_category) as $item) :
                $product_price = $item['product_price'];
                $product_sale = $item['product_sale'];

                // Tính phần trăm giảm
                $discount = (($product_price - $product_sale) / $product_price) * 100;
          ?>
            <div class="col-lg-3 col-sm-6 mb-4">
              <!-- Portfolio item 1-->
              <form method="post" action="./index.php?pages=products&action=list_category&id_category=<?= $row['id']; ?>&id=<?= $item['id'] ?>">
                <div class="portfolio-item border border-dark">
                  <div class="position-relative">
                    <button class="top-0 mt-3 position-absolute start-0 btn btn-social btn-danger">-<?php echo number_format($discount); ?>%</button>
                    <a class="!#" data-bs-toggle="modal" href="./index.php?pages=products&action=detail&detail=<?= $item['id']; ?>&category=<?= $item['category']; ?>" title="Xem chi tiết">
                      <img class="img-fluid mb-4" src="/admin/uploaded_img/<?= $item['image']; ?>" alt="Ảnh sản phẩm" />
                      <a href="./index.php?pages=products&action=detail&detail=<?= $item['id']; ?>&category=<?= $item['category']; ?>" class="bottom-0 position-absolute start-0 w-100 btn btn-danger rounded-0">Xem chi tiết</a>
                    </a>
                  </div>
                  <div class="portfolio-caption">
                    <small class="truncate-text mb-1"><?= $item['name_cate']; ?></small>
                    <div class="portfolio-caption-heading truncate-text mb-1"><?= $item['product_name']; ?></div>
                    <div class="portfolio-caption-subheading text-muted truncate-text mb-2"><?= $item['describe']; ?></div>
                    <div class="d-flex justify-content-center">
                      <div class="portfolio-caption-subheading text-danger h5 me-2"><?= number_format($item['product_sale'], 3); ?>đ</div>
                      <s class="portfolio-caption-subheading text-muted ms-2"><?php echo number_format($item['product_price'], 3); ?>đ</s>
                    </div>
                    <div class="mt-2">
                      <input class="btn btn-danger me-1" type="submit" name="add_to_cart" value="Mua Ngay">
                    </div>
                  </div>
                  <input type="hidden" name="name" value="<?= $item['product_name'] ?>">
                  <input type="hidden" name="price" value="<?= $item['product_sale'] ?>">
                  <input type="hidden" name="image" value="<?= $item['image'] ?>">
                  <input type="hidden" name="quantity" value="1">
                </div>
              </form>
            </div>
          <?php
              endforeach
          ?>
        <?php endforeach ?>
        </div>
      </div>
    </section>
  </div>
</section>