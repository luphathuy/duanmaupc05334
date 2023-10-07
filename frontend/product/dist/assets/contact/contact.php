<section class="page-section py-5 mt-5 row m-0" id="contact">
  <div class="col-12 p-5">
    <div>
      <h3 class="section-heading text-uppercase mb-4">Địa chỉ Google Maps</h3>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15716.78305713952!2d105.77034015000001!3d10.0006823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1696320994823!5m2!1sen!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="col-12 container p-5">
    <div>
      <h3 class="section-heading text-uppercase mb-4">Liên Hệ</h3>
    </div>
    <div class="text-center">
      <?php
      if (isset($mess)) {
        foreach ($mess as $mess) {
          echo '<p class="text-primary">' . $mess . '</p>';
        }
      }
      ?>
    </div>
    <form id="contactForm" action="" method="post">
      <div class="row align-items-stretch mb-5">
        <div class="col-md-6">
          <div class="form-group">
            <!-- Name input-->
            <label class="mb-2 text-white">Tên <label class="text-danger">*</label></label>
            <input class="form-control" name="name" id="name" type="text">
          </div>
          <div class="form-group">
            <!-- Email address input-->
            <label class="mb-2 text-white">Email <label class="text-danger">*</label></label>
            <input class="form-control" name="email" id="email" type="email">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <!-- Phone number input-->
            <label class="mb-2 text-white">Số điện thoại <label class="text-danger">*</label></label>
            <input class="form-control" name="phone" id="phone" type="text">
          </div>
          <div class="form-group form-group-textarea mb-md-0">
            <!-- mess input-->
            <label class="mb-2 text-white">Nội dung <label class="text-danger">*</label></label>
            <input class="form-control" type="text" name="content" id="mess">
          </div>
        </div>
      </div>
      <div class="text-center"><input class="btn btn-primary w-auto btn-xl text-uppercase" name="submit_contact" type="submit" value="Gửi"></div>
    </form>
  </div>
</section>