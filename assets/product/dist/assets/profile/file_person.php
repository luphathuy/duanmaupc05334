<?php foreach (getUserId($id) as $item) :
  //Setting image
  if (!empty($item['image'])) {
    $item['image'];
  } else {
    $item['image'] = "default_img.jpg";
  }
?>
  <section class="bg-dark bg-opacity-75 py-5 mt-5 pb-4">
    <div class="container py-4 pb-2">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="./index.php?pages=home" class="text-danger text-decoration-none">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="./index.php?pages=products&action=list" class="text-danger text-decoration-none">Sản phẩm</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= $item['name']; ?></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-3">
            <div class="card-body text-center pt-2 pb-1">
              <img src="./assets/admin/uploaded_img/<?= $item['image']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3 mt-4 text-uppercase"><?= $item['name']; ?></h5>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <a href="<?= $item['facebook']; ?>" class="mb-0 truncate-text ms-4 text-black" target="_blank" style="color: #3b5998;"><?= $item['facebook']; ?></a>
                </li>
                <li class="list-group-item align-items-center p-3">
                  <i class="fa-brands fa-tiktok"></i>
                  <a href="<?= $item['tiktok']; ?>" class="mb-0 truncate-text ms-4 text-black" target="_blank"><?= $item['tiktok']; ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class=" col-lg-8">
          <div class="card mb-4">
            <div class="card-body p-4">
              <div class="row mt-3">
                <div class="col-sm-3">
                  <p class="mb-0">Tên</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $item['name']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $item['email']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $item['phone']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Giới tính</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $item['sex']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Ngày sinh</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $item['date_birth']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endforeach ?>