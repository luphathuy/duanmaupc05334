<section style="background-color: #9A616D;">
  <div class="container h-100 mt-5 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-6 col-lg-6 col-xl-6 order-2 order-lg-2">
                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">Đăng ký</p>
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<p class="form-outline flex-fill mb-0 text-center text-danger">' . $message . '</p>';
                  }
                }
                ?>
                <form method="post" class="mx-1 mx-md-4">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Tên</label>
                      <input type="text" name="name" id="form3Example1c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email</label>
                      <input type="email" name="email" id="form3Example3c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Số điện thoại</label>
                      <input type="tel" name="phone" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Mật khẩu</label>
                      <input type="password" name="password" id="form3Example4c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Nhập lại mật khẩu</label>
                      <input type="password" name="cpassword" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-face-smile fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Giới tính</label>
                      <select class="form-control m-0" name="sex">
                        <option class="text-black" value="Nam">Nam</option>
                        <option class="text-black" value="Nữ">Nữ</option>
                      </select>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-calendar-days fa-lg me-3 mt-4 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Ngày sinh</label>
                      <input type="date" name="date_birth" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>
                  <input type="hidden" name="role" value="3" id="form3Example4cd" class="form-control" />


                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                    <label class="form-check-label" for="form2Example3">
                      Tôi đồng ý tất cả <a href="#!">điều khoản & dịch vụ</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button name="submit" type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>
                  <div class="text-center">
                    <p class="text-black">Bạn đã có tài khoản?<a class="text-danger text-decoration-none ms-md-1" href="./index.php?pages=account&action=login">Đăng Nhập</a></p>
                  </div>

                </form>

              </div>
              <div class="col-md-6 col-lg-6 col-xl-6 d-flex align-items-center order-1 order-lg-1">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>