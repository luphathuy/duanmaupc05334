<div id="layoutSidenav_content" class="bg-dark bg-opacity-75">
  <div class="container h-100">
    <div class="row d-flex justify-content-center w-100 align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-3">Đổi mật khẩu</h3>
            <?php
            if (isset($message)) {
              foreach ($message as $message) {
                echo '<p class="rounded-3 col-md-12 pb-2">' . $message . '</p>';
              }
            }
            ?>
            <form action="" method="post">
              <div class="form-outline mb-4">
                <label class="form-label float-start h6">Mật khẩu mới</label>
                <input class="form-control form-control-lg" type="password" name="password">
              </div>
              <div class="form-outline mb-4">
                <label class="form-label float-start h6">Nhập lại mật khẩu mới</label>
                <input class="form-control form-control-lg" type="password" name="cpassword">
              </div>
              <div class="col-md-12">
                <input class="btn btn-warning w-100 pt-3 pb-3 mt-3 text-black" name="resetpassadmin" type="submit" value="Thay đổi">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>