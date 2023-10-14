<section style="background-color: #9A616D;">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center
          min-vh-100">
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="mb-2">
              <h5>Quên mật khẩu?</h5>
              <p class="m-0 p-0">Hãy điền email của bạn vào
              </p>
            </div>
            <?php
            if (isset($message)) {
              foreach ($message as $message) {
                echo '<p class="form-outline flex-fill mb-0 text-danger">' . $message . '</p>';
              }
            }
            ?>
            <form method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="resetPass" id="email" class="form-control" placeholder="Email của bạn">
              </div>
              <div class="mb-3 d-grid">
                <button name="submit_manager" type="submit" class="btn btn-dark">
                  Tìm
                </button>
              </div>
              <span>Trở về trang <a href="./index.php?pages=account&action=login">đăng nhập</a></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>