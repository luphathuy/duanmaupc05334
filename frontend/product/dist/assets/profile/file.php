<?php foreach (getUserId($id) as $getUserId) : ?>
<section class="bg-dark bg-opacity-75">
  <div class="container py-5 pb-2">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/index.php" class="text-danger text-decoration-none">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hồ sơ</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-body text-center">
            <img src="admin/uploaded_img/<?= $getUserId['image']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?= $getUserId['name']; ?></h5>
            <div class="row">
              <p class="text-muted mb-2 col-12">Lượt bình luận: 6</p>
              <p class="col-12 mb-2"><a href="" class="text-info">Xem lịch sử bình luận</a></p>
              <p class="col-12 m-0"><a href="" class="text-info">Xem lịch sử liên hệ</a></p>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <a href="<?= $getUserId['facebook']; ?>" class="mb-0 truncate-text ms-4 text-black" target="_blank" style="color: #3b5998;"><?= $getUserId['facebook']; ?></a>
              </li>
              <li class="list-group-item align-items-center p-3">
                <i class="fa-brands fa-tiktok"></i>
                <a href="<?= $getUserId['tiktok']; ?>" class="mb-0 truncate-text ms-4 text-black" target="_blank"><?= $getUserId['tiktok']; ?></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class=" col-lg-8">
        <div class="card mb-4">
          <a href="./index.php?pages=profile&action=edit_file&edit=<?= $getUserId['id']; ?>&sex=<?= $getUserId['id_sex']; ?>" class="text-black text-decoration-none position-absolute top-0 end-0 me-4 mt-3"><i class="fa fa-edit"></i> Chỉnh sửa</a>
          <div class="card-body p-4">
            <div class="row mt-3">
              <div class="col-sm-3">
                <p class="mb-0">Tên</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $getUserId['name']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $getUserId['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Số điện thoại</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $getUserId['phone']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Giới tính</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $getUserId['name_sex']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Số CCCD</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $getUserId['citizen_id']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ngày sinh</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $getUserId['date_birth']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Địa chỉ</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-3"><?= $getUserId['address']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endforeach ?>