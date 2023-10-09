<div id="layoutSidenav_content">
  <form action="" method="post" enctype="multipart/form-data" class="container-fluid px-4">
    <h1 class="text-black mt-4 mb-4 text-uppercase">Cập nhật người dùng</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<p class="text-danger">' . $message . '</p>';
      }
    }
    ?>
    <?php foreach (getUserId($id) as $item) : ?>
      <?php //Setting image
      if (!empty($item['image'])) {
        $item['image'];
      } else {
        $item['image'] = "default_img.jpg";
      }
      ?>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Ảnh đại diện</span>
        <img src="../admin/uploaded_img/<?= $item['image'] ?>" style="width: 100px; height: 100px;" class="mb-md-3" alt="">
        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-100 p-2 rounded-2 border mb-md-3">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Tên</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="name" value="<?= $item['name'] ?>">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Email</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="email" value="<?= $item['email'] ?>">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Số điện thoại</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="phone" value="<?= $item['phone'] ?>">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Giới Tính</span>
        <select class="w-100 p-2 rounded-2 border mb-md-3" name="sex">
            <option class="text-black" value="<?= $item['sex'] ?>"><?= $item['sex'] ?></option>
            <option class="text-black" value="Nam">Nam</option>
            <option class="text-black" value="Nữ">Nữ</option>
        </select>
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Địa chỉ</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="address" value="<?= $item['address'] ?>">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Số CCCD</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="citizen_id" value="<?= $item['citizen_id'] ?>">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Ngày Sinh</span>
        <input type="date" class="w-100 p-2 rounded-2 border mb-md-3" name="date_birth" value="<?= $item['date_birth'] ?>">
      </div>
      <div class="modal-footer mb-3">
        <a class="btn btn-success float-end" href="./index.php?pages=users&action=list"><i class="fas fa-angle-left"></i> Trở Lại</a>
        <input type="submit" class="btn btn-success float-end ms-2" name="edit_users" value="Cập nhật">
      </div>
    <?php endforeach ?>
  </form>