<section class="bg-dark bg-opacity-75 mt-5 py-5">
  <div class="container h-100 mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-3">Đăng ký</h3>
            <form action="" method="post">
              <?php
              if (isset($message)) {
                foreach ($message as $message) {
                  echo '<p class="mb-md-2 bg-warning text-black p-2 rounded-3 col-md-12">' . $message . '</p>';
                }
              }
              ?>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Tên</label>
                <input class="col-md-12 text-black p-2 rounded-1 border" type="text" name="name">
              </div>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Email</label>
                <input class="col-md-12 text-black p-2 rounded-1 border" type="email" name="email">
              </div>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Số điện thoại</label>
                <input class="col-md-12 text-black p-2 rounded-1 border" type="text" name="phone">
              </div>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Mật khẩu</label>
                <input class="col-md-12 text-black p-2 rounded-1 border" type="password" name="password">
              </div>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Nhập lại mật khẩu</label>
                <input class="col-md-12 text-black p-2 rounded-1 border" type="password" name="cpassword">
              </div>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Giới tính</label>
                <select class="col-md-12 p-2 rounded-1 border text-black" name="sex">
                  <option class="text-black" value="Nam">Nam</option>
                  <option class="text-black" value="Nữ">Nữ</option>
                </select>
              </div>
              <div class="mt-2 form-outline">
                <label class="form-label float-start ms-1" for="typeEmailX-2">Ngày sinh</label>
                <input class="col-md-12 text-black p-2 rounded-1 border" type="date" name="date_birth">
              </div>
              <div class="mt-2 form-outline">
                <input class="col-md-12 text-black p-2 rounded-1 border" type="hidden" name="role" value="3">
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary btn-lg btn-block w-100 mt-3 text-black" name="submit" type="submit">Đăng ký</button>
                <div class="d-flex mt-2">
                  <p class="text-black">Bạn đã có tài khoản?<a class="text-danger text-decoration-none ms-md-1" href="./index.php?pages=account&action=login">Đăng Nhập</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>