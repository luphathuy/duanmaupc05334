<!-- Footer -->
<footer class="text-center text-lg-start bg-black text-muted">
  <!-- Section: Social media -->
  <div class="d-flex justify-content-md-center justify-content-end p-4 border-bottom">
    <!-- Left -->
    <div class="me-3 d-none d-lg-block">
      <span>Hãy kết nối với chúng tôi trên các mạng xã hội:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="https://www.facebook.com/profile.php?id=61551578563435" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://mail.google.com/mail/u/0/#inbox" class="me-4 text-reset">
        <i class="fa fa-envelope"></i>
      </a>
      <a href="https://www.tiktok.com/@ravanzach" class="me-4 text-reset">
        <i class="fa-brands fa-tiktok"></i>
      </a>
      <a href="https://github.com/luphathuy" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="p-3">
    <div class="container text-center text-md-start mb-2">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <div class="d-flex justify-content-center justify-content-md-start">
            <img src="/product/dist/assets/img/logo1.png" alt="" width="50">
            <p class="p-0 ms-2 mt-2">GWINE</p>
          </div>

          <p>
            Chúng tôi bắt đầu tìm hiểu và thành lập chi nhánh bán Rượu từ năm 2017
            . Từ đây, chúng tôi luôn luôn cố gắng đem đến cho tất cả mọi người
            những loại Rượu ngon nhất, chất lượng nhất.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 mt-2">
            Danh Mục
          </h6>
          <?php foreach (getAllCategory() as $item) : ?>
            <div class="mb-2">
              <a href="./index.php?pages=products&action=list_category&id_category=<?= $item['id']; ?>" class="text-reset"><?= $item['name']; ?></a>
            </div>
          <?php endforeach ?>
        </div>
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 mt-2">
            Fanpage
          </h6>
          <div>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D61551578563435&tabs=timeline&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="150" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
          </div>
        </div>
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 mt-2">Liên hệ</h6>
          <p><i class="fas fa-home me-3"></i> Hưng Thạnh, Cái Răng, Cần Thơ</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            huylppc05334@fpt.edu.vn
          </p>
          <p><i class="fas fa-phone me-3"></i> +84 945 567 048</p>
        </div>
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-3 border-top">
    Copyright &copy; GWine 2023
  </div>
  <!-- Copyright -->
</footer>
<div class="progress-bar">
  <button class="back-to-top hidden bg-danger">
    <i class="fa fa-arrow-up"></i>
  </button>
</div>
<!-- Thong bao pupup -->
<?php
if (isset($_POST['add_to_cart'])) { ?>
  <div class="tbpopup" id="tbpopup-1">
    <div class="tboverlay"></div>
    <div class="tbcontent bg-dark text-white p-5">
      <div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
      <div style="font-size:30px;font-weight:bold"><b>GWine</b> Thông Báo</div>
      <?php
      if (isset($sp)) {
        foreach ($sp as $sp) {
          echo '<p class="mt-4">' . $sp . '</p>';
        }
      }
      ?>
    </div>
  </div>
<?php } ?>
</body>
<script>
  const showOnPx = 100;
  const backToTopButton = document.querySelector(".back-to-top");
  const pageProgressBar = document.querySelector(".progress-bar");

  const scrollContainer = () => {
    return document.documentElement || document.body;
  };

  const goToTop = () => {
    document.body.scrollIntoView({
      behavior: "smooth"
    });
  };

  document.addEventListener("scroll", () => {
    console.log("Scroll Height: ", scrollContainer().scrollHeight);
    console.log("Client Height: ", scrollContainer().clientHeight);

    const scrolledPercentage =
      (scrollContainer().scrollTop /
        (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
      100;

    pageProgressBar.style.width = `${scrolledPercentage}%`;

    if (scrollContainer().scrollTop > showOnPx) {
      backToTopButton.classList.remove("hidden");
    } else {
      backToTopButton.classList.add("hidden");
    }
  });

  backToTopButton.addEventListener("click", goToTop);
</script>
<!-- Core theme JS-->
<script src="/assets/product/dist/js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<!-- js thong bao popup -->
<script>
  function thongbaopopup() {
    document.getElementById("tbpopup-1").classList.toggle("active");
  }
</script>

</html>