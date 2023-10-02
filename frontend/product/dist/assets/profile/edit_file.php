<?php foreach (getUserId($id) as $getUserId) : ?>
  <section class="bg-dark bg-opacity-75">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container py-5 pb-2">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/index.php" class="text-danger text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="./index.php?pages=profile&action=file" class="text-danger text-decoration-none">Hồ sơ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="admin/uploaded_img/<?= $getUserId['image'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?= $getUserId['name']; ?></h5>
                <p class="text-muted mb-2"><?= $getUserId['email']; ?></p>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                    <input class="w-100 ms-3 ps-2" type="text" name="facebook" value="<?= $getUserId['facebook']; ?>" placeholder="Link facebook">
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fa-brands fa-tiktok"></i>
                    <input class="w-100 ms-3 ps-2" type="text" name="tiktok" value="<?= $getUserId['tiktok']; ?>" placeholder="Link tiktok">
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body p-4">
                <div class="row mt-1 align-items-center">
                  <div class="col-sm-3">
                    <p class="mb-0">Ảnh đại diện</p>
                  </div>
                  <div class="col-sm-9">
                    <input class="w-100 border border-dark p-2" type="file" name="image">
                  </div>
                </div>
                <hr>
                <div class="row mt-1">
                  <div class="col-sm-3">
                    <p class="mb-0">Tên</p>
                  </div>
                  <div class="col-sm-9">
                    <input class="w-100" type="text" name="name" value="<?= $getUserId['name']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <input class="w-100" type="text" name="email" value="<?= $getUserId['email']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9 ">
                    <input class="w-100" type="text" name="phone" value="<?= $getUserId['phone']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Giới tính</p>
                  </div>
                  <div class="col-sm-9">
                    <select name="sex" class="w-100">
                      <?php foreach (getAllSex() as $getAllSex) : ?>
                        <option class="text-black" <?= (isset($_GET['sex']) && $_GET['sex'] === $getAllSex['id']) ? 'selected' : '' ?> value="<?= $getAllSex['id'] ?>"><?= $getAllSex['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Số CCCD</p>
                  </div>
                  <div class="col-sm-9">
                    <input class="w-100" type="text" name="citizen_id" value="<?= $getUserId['citizen_id']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Ngày sinh</p>
                  </div>
                  <div class="col-sm-9">
                    <input class="w-100" type="date" name="date_birth" value="<?= $getUserId['date_birth']; ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Địa chỉ</p>
                  </div>
                  <div class="col-sm-9">
                    <input class="w-100" type="text" name="address" value="<?= $getUserId['address']; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer mb-3">
          <input type="submit" class="btn btn-danger float-end ms-2" name="edit_file" value="Cập nhật">
        </div>
      </div>
    </form>
  </section>
<?php endforeach ?>