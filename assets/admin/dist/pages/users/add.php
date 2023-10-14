<div id="layoutSidenav_content">
  <form action="" method="post" enctype="multipart/form-data" class="container-fluid px-4">
    <h1 class="text-black mt-4 mb-4">Thêm Người Dùng</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<p class="text-danger">' . $message . '</p>';
      }
    }
    ?>
    <?php
    if ($item['status'] == 0) {
      $item['status'] = 'Hoạt động';
    } else {
      $item['status'] = 'Khóa tài khoản';
    }
    ?>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Ảnh</span>
      <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-100 p-2 rounded-2 border mb-md-3">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Tên</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="name">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Mật khẩu</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="password">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Email</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="email">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Số điện thoại</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="phone">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Giới Tính</span>
      <select class="w-100 p-2 rounded-2 border mb-md-3" name="sex">
        <option class="text-black" value="Nam">Nam</option>
        <option class="text-black" value="Nữ">Nữ</option>
      </select>
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Địa chỉ</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="address">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Số CCCD</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="citizen_id">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Ngày Sinh</span>
      <input type="date" class="w-100 p-2 rounded-2 border mb-md-3" name="date_birth">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Trạng thái</span>
      <select class="w-100 p-2 rounded-2 border mb-md-3" name="status">
        <option class="text-black" value="0">Hoạt động</option>
        <option class="text-black" value="1">Khóa tài khoản</option>
      </select>
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Vai Trò</span>
      <select class="w-100 p-2 rounded-2 border mb-md-3" name="role">
        <option class="text-black" value="1">Admin</option>
        <option class="text-black" value="2">Nhân viên</option>
        <option class="text-black" value="3">Khách hàng</option>
      </select>
    </div>
    <div class="modal-footer mb-3">
      <a class="btn btn-success float-end" href="./index.php?pages=users&action=list"><i class="fas fa-angle-left"></i> Trở Lại</a>
      <input type="submit" class="btn btn-success float-end ms-2" name="add_users" value="Thêm Mới">
    </div>
  </form>