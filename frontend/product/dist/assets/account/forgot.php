<section class="bg-dark vh-100 bg-opacity-75">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-3">Quên mật khẩu</h3>
            <form action="" method="post">
              <?php
              if (isset($message)) {
                foreach ($message as $message) {
                  echo '<p class="mb-md-2 bg-warning text-black p-1 rounded-3 col-md-12">' . $message . '</p>';
                }
              }
              ?>
              <div class="form-outline mb-4">
                <label class="form-label float-start ms-1">Email</label>
                <input type="email" name="resetPass" class="form-control form-control-lg" />
              </div>
              <button class="btn btn-primary btn-lg btn-block w-100 text-black" name="submit_manager" type="submit">Tìm tài khoản</button>
              <a href="./index.php?pages=account&action=login" class="btn btn-primary btn-lg btn-block text-black w-100 mt-3">Trở lại</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>