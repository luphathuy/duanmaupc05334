<!-- Masthead-->
<header class="masthead mt-5">
    <div class="container">
        <div class="masthead-subheading text-uppercase">Chào Mừng Đến Với GWine!</div>
        <div class="masthead-heading text-uppercase">Rất Vui Được Gặp Bạn</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Xem Ngay</a>
    </div>
</header>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase pb-5">Rượu Mới Nhất</h2>
        </div>
        <div class="row">
            <?php foreach (getAllProductType() as $item) :
                $product_price = $item['product_price'];
                $product_sale = $item['product_sale'];
                // Tính phần trăm giảm
                $discount = (($product_price - $product_sale) / $product_price) * 100;
            ?>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <form method="post" action="./index.php?id=<?= $item['id'] ?>">
                        <div class="portfolio-item border border-dark">
                            <div class="position-relative">
                                <button class="top-0 mt-3 position-absolute start-0 btn btn-social btn-danger">-<?php echo number_format($discount); ?>%</button>
                                <a data-bs-toggle="modal" href="./index.php?pages=products&action=detail&detail=<?= $item['id']; ?>&category=<?= $item['category']; ?>" title="Xem chi tiết">
                                    <img class="img-fluid mb-4" src="./assets/admin/uploaded_img/<?= $item['image'] ?>" alt="Ảnh sản phẩm" />
                                    <a href="./index.php?pages=products&action=detail&detail=<?= $item['id'] ?>&category=<?= $item['category']; ?>" class="bottom-0 position-absolute start-0 w-100 btn btn-danger rounded-0">Xem chi tiết</a>
                                </a>
                            </div>
                            <div class="portfolio-caption">
                                <small class="truncate-text mb-1"><?= $item['name_cate'] ?></small>
                                <div class="portfolio-caption-heading truncate-text mb-1"><?= $item['product_name'] ?></div>
                                <div class="portfolio-caption-subheading text-muted truncate-text mb-2"><?= $item['describe'] ?></div>
                                <div class="d-flex justify-content-center">
                                    <div class="portfolio-caption-subheading text-danger h5 me-2"><?= number_format($item['product_sale'], 3) ?>đ</div>
                                    <s class="portfolio-caption-subheading text-muted ms-2"><?php echo number_format($item['product_price'], 3) ?>đ</s>
                                </div>
                                <div class="mt-2">
                                    <input class="btn btn-danger me-1" type="submit" name="add_to_cart" value="Mua Ngay" <?php if (isset($lock)) {
                                                                                                                                echo $lock; ?> <?php
                                                                                                                                            } else {
                                                                                                                                                $lock = '';
                                                                                                                                            }
                                                                                                                                                ?>>
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
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center pb-5">
            <h2 class="section-heading text-uppercase">Dịch Vụ</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Giao Hàng Nhanh</h4>
                <p class="text-muted">Giao hàng nhanh đem lại sự tiện lợi và tốc độ cho người tiêu dùng. Với dịch vụ này, sản phẩm có
                    thể đến tay khách hàng trong thời gian ngắn, giúp đáp ứng nhu cầu mua sắm và kinh doanh một cách hiệu quả.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-thumbs-up fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Chất Lượng Sản Phẩm</h4>
                <p class="text-muted">Chất lượng sản phẩm là tiêu chí quan trọng quyết định sự hài lòng của khách hàng.
                    Nó đòi hỏi sự tập trung vào sự hoàn hảo, đáng tin cậy và sự đáp ứng đúng những yêu cầu của người tiêu dùng.
                    Chất lượng sản phẩm đóng vai trò quan trọng trong sự thành công của mọi doanh nghiệp.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-repeat fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Đổi Trả Nhanh Chóng</h4>
                <p class="text-muted">Dịch vụ đổi trả nhanh chóng mang lại sự an tâm cho khách hàng. Nó cho phép người mua sắm thay đổi hoặc trả lại sản phẩm dễ
                    dàng trong trường hợp không hài lòng hoặc có lỗi. Điều này tạo lòng tin và thúc đẩy mua sắm online và offline.</p>
            </div>
        </div>
    </div>
</section>
<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase pb-5">Giới Thiệu</h2>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="https://i.pinimg.com/564x/da/ee/e9/daeee99161777ebb8e21c88ef9da4b6a.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2017-2022</h4>
                        <h4 class="subheading">Đi Khắp Thế Giới</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Chúng Tôi Tìm Hiểu Tất Cả Các Hãng Rượu Nổi Tiếng Trên Thế Giới!</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="https://i.pinimg.com/564x/38/6f/26/386f26b145575b3594b66e5d69278831.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2023</h4>
                        <h4 class="subheading">Chai Rượu Đầu Tiên</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Vào Đầu Năm 2023 Chúng Tôi Đã Xuất Khẩu Ra Loại Rượu Chất Lượng, Hương Thơm Từ Thiên Nhiên!</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="https://i.pinimg.com/564x/6c/ff/74/6cff74de9ea5938964f20014ccf55866.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2023 - Tương Lai</h4>
                        <h4 class="subheading">Tiếp Tục Phát Triển</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Chúng Tôi Sẽ Tiếp Tục Nghiên Cứu Và Xuất Khẩu Ra Các Loại Rượu Ngon Nhất, Chất Lượng Nhất!</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercas">Liên Hệ</h2>
        </div>
        <div class="text-center">
            <?php
            if (isset($mess)) {
                foreach ($mess as $mess) {
                    echo '<p class="text-primary">' . $mess . '</p>';
                }
            }
            if (isset($errorsend)) {
                foreach ($errorsend as $errorsend) {
                    echo '<p class="text-primary">' . $errorsend . '</p>';
                }
            }
            ?>
        </div>
        <form id="contactForm" action="" method="post">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <label class="mb-2 text-white">Tên <label class="text-danger">*</label></label>
                        <input class="form-control" name="name" id="name" type="text">
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <label class="mb-2 text-white">Email <label class="text-danger">*</label></label>
                        <input class="form-control" name="email" id="email" type="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Phone number input-->
                        <label class="mb-2 text-white">Số điện thoại <label class="text-danger">*</label></label>
                        <input class="form-control" name="phone" id="phone" type="text">
                    </div>
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <label class="mb-2 text-white">Nội dung <label class="text-danger">*</label></label>
                        <input class="form-control" type="text" name="content" id="message">
                    </div>
                </div>
            </div>
            <div class="text-center"><input class="btn btn-primary w-auto btn-xl text-uppercase" name="submit_contact" type="submit" value="Gửi"></div>
        </form>
    </div>
</section>