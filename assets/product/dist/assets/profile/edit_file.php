<?php foreach (getUserSession($user_id) as $item) :
  //Setting image
  if (!empty($item['image'])) {
    $item['image'];
  } else {
    $item['image'] = "default_img.jpg";
  }
?>
  <section class="bg-dark bg-opacity-75 py-5 pb-2">
    <form action="" method="post" enctype="multipart/form-data" class="p-0 m-0">
      <div class="container py-4 pb-0 mt-5">
        <div class="row m-0">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/index.php" class="text-danger text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="./index.php?pages=profile&action=file" class="text-danger text-decoration-none">Hồ sơ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa hồ sơ</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <?php
          if (isset($message)) {
            foreach ($message as $message) {
              echo '<p class="text-danger">' . $message . '</p>';
            }
          }
          ?>
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="./assets/admin/uploaded_img/<?= $item['image'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?= $item['name']; ?></h5>
                <p class="text-muted mb-2"><?= $item['email']; ?></p>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                    <input class="w-100 ms-3 ps-2" type="text" name="facebook" value="<?= $item['facebook']; ?>" placeholder="Link facebook">
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fa-brands fa-tiktok"></i>
                    <input class="w-100 ms-3 ps-2" type="text" name="tiktok" value="<?= $item['tiktok']; ?>" placeholder="Link tiktok">
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body p-4">
                <div class="row mt-1 align-items-center">
                  <div class="col-3">
                    <p class="mb-0">Ảnh đại diện</p>
                  </div>
                  <div class="col-9">
                    <input class="w-100 border border-dark p-2" type="file" name="image">
                  </div>
                </div>
                <hr>
                <div class="row mt-1">
                  <div class="col-3">
                    <p class="mb-0">Tên</p>
                  </div>
                  <div class="col-9">
                    <input class="w-100" type="text" name="name" value="<?= $item['name']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-9">
                    <input class="w-100" type="text" name="email" value="<?= $item['email']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-9 ">
                    <input class="w-100" type="text" name="phone" value="<?= $item['phone']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-3">
                    <p class="mb-0">Giới tính</p>
                  </div>
                  <div class="col-9">
                    <select name="sex" class="w-100 mb-0">
                      <option class="text-black" value="<?= $item['sex']; ?>"><?= $item['sex']; ?></option>
                      <option class="text-black" value="Nam">Nam</option>
                      <option class="text-black" value="Nữ">Nữ</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-3">
                    <p class="mb-0">Số CCCD</p>
                  </div>
                  <div class="col-9">
                    <input class="w-100" type="text" name="citizen_id" value="<?= $item['citizen_id']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-3">
                    <p class="mb-0">Ngày sinh</p>
                  </div>
                  <div class="col-9">
                    <input class="w-100" type="date" name="date_birth" value="<?= $item['date_birth']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-3">
                    <p class="mb-0">Địa chỉ</p>
                  </div>
                  <div class="col-9">
                    <input class="w-100" type="text" name="address" value="<?= $item['address']; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer mb-3">
          <a href="./index.php?pages=profile&action=file" class="btn btn-light float-end me-3 w-auto">Trở lại</a>
          <input type="submit" class="btn btn-danger float-end me-3 w-auto" name="edit_file" value="Cập nhật">
        </div>
      </div>
    </form>
  </section>
<?php endforeach ?>