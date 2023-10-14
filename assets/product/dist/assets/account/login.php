<section style="background-color: #9A616D;">
  <div class="container py-5 h-100 mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg  " alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <div class="d-flex align-items-center mb-3 pb-1">
                  <i class="fas fa-wine-bottle fa-2x me-3" style="color: #ff6219;"></i>
                  <span class="h1 fw-bold mb-0">GWINE</span>
                </div>
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<p class="form-outline flex-fill mb-0 text-danger">' . $message . '</p>';
                  }
                }
                ?>
                <form method="post">



                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name="submit_login" type="submit">Đăng nhập</button>
                  </div>

                  <a class="small text-muted" href="./index.php?pages=account&action=forgot">Quên mật khẩu?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? <a href="./index.php?pages=account&action=register" class="text-danger">Đăng ký</a></p>
                  <a href="#!" class="small text-muted">Điều khoản &</a>
                  <a href="#!" class="small text-muted">Chính sách bảo mật</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>