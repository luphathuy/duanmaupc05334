<section style="background-color: #9A616D;">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center
          min-vh-100">
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="mb-2">
              <h5>Thay đổi mật khẩu</h5>
              <p class="m-0 p-0">Hãy điền mật khẩu mới của bạn vào
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
                <label for="email" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="email" class="form-control" placeholder="Mật khẩu">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="cpassword" id="email" class="form-control" placeholder="Nhập lại mật khẩu">
              </div>
              <div class="mb-3 d-grid">
                <button name="resetpass" type="submit" class="btn btn-dark mt-3">
                  Thay đổi
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>