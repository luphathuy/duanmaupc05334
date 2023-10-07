<footer class="footer py-4 border-top">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-lg-start">Copyright &copy; GWine 2023</div>
      <div class="col-lg-4 my-3 my-lg-0">
        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/profile.php?id=61551578563435" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-dark btn-social mx-2" href="https://www.tiktok.com/@ravanzach" target="_blank" aria-label="Titkok"><i class="fa-brands fa-tiktok"></i></a>
      </div>
      <div class="col-lg-4 text-lg-end">
        <a class="link-dark text-decoration-none me-3" href="#!">Điều Khoản Sử Dụng</a>
        <a class="link-dark text-decoration-none" href="#!">Chính Sách</a>
      </div>
    </div>
  </div>
</footer>
<div class="progress-bar">
  <button class="back-to-top hidden bg-danger">
    <i class="fa fa-arrow-up "></i>
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
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="../../../product/dist/js/scripts.js"></script>
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