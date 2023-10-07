<section class="bg-dark bg-opacity-75 mt-5 py-5">
  <div class="container h-100 mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-3">Đăng nhập</h3>
            <form action="" method="post">
              <?php
              if (isset($message)) {
                foreach ($message as $message) {
                  echo '<p class="mb-md-2 bg-warning text-black p-2 rounded-3 col-md-12">' . $message . '</p>';
                }
              }
              ?>
              <div class="form-outline mb-4">
                <label class="form-label float-start ms-1">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" />
              </div>
              <div class="form-outline mb-4">
                <label class="form-label float-start ms-1">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" />
              </div>
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" value="" />
                <label class="form-check-label ms-2"> Nhớ mật khẩu </label>
              </div>
              <button class="btn btn-primary btn-lg btn-block w-100 text-black" name="submit_login" type="submit">Đăng nhập</button>
              <a href="./index.php?pages=account&action=register" class="btn btn-primary text-black btn-lg btn-block w-100 mt-3">Đăng ký</a>
              <a class="text-decoration-none text-black float-start mt-3" href="./index.php?pages=account&action=forgot">Quên mật khẩu</a>
              <hr class="my-5 mb-3">
              <button class="btn btn-lg btn-block btn-primary w-100 text-black" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Đăng nhập với Google</button>
              <button class="btn btn-lg btn-block btn-primary mb-2 w-100 mt-3 text-black" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i>Đăng nhập với Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>