<div id="layoutSidenav_content" class="bg-dark bg-opacity-75">
<section class="py-5 mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-2">Tìm tài khoản</h3>
            <form action="" method="post">
              <?php
              if (isset($message)) {
                foreach ($message as $message) {
                  echo '<p class="mb-md-2 bg-warning text-black p-1 rounded-3 col-md-12">' . $message . '</p>';
                }
              }
              ?>
              <div class="form-outline mb-4">
                <label class="form-label float-start h6">Email</label>
                <input type="email" name="resetPass" class="form-control form-control-lg" />
              </div>
              <input class="btn btn-dark btn-lg btn-block mb-2" name="submit_admin" type="submit" value="Tìm kiếm">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>