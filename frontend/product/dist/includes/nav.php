<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>GWine</title>
  <!-- Favicon-->
  <link rel="shortcut icon" type="image/png" href="product/dist/assets/img/logo1.png" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="product/dist/css/styles.css" rel="stylesheet" />
</head>
<style>
  .truncate-text {
    white-space: nowrap;
    /* Ngăn văn bản xuống dòng */
    overflow: hidden;
    /* Ẩn các nội dung dư thừa */
    text-overflow: ellipsis;
    /* Hiển thị dấu ba chấm (...) khi bị cắt */
    max-width: 100%;
  }

  .back-to-top {
    position: fixed;
    right: 2rem;
    bottom: 2rem;
    border-radius: 100%;
    padding: 0.7rem 1rem 0.7rem 1rem;
    border: none;
    cursor: pointer;
    opacity: 100%;
    transition: opacity 0.5s;
  }

  .back-to-top:hover {
    opacity: 60%;
  }

  .hidden {
    opacity: 0%;
  }
</style>
<?php
if (!empty($_SESSION['user_role'])) {
  $role = $_SESSION['user_role'];
  if ($role === '3') {
    $login = 'd-none';
    $css_control = 'd-none';
  } elseif ($role === '1' || $role === '2') {
    $login = 'd-none';
  }
} else {
  $css = 'd-none';
  $logout = 'd-none';
  $css_control = 'd-none';
}
?>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="" href="./index.php?pages=home"><img src="product/dist/assets/img/logo1.png" alt="logo" width="75" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="align-items-md-center navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=products&action=list">Sản Phẩm</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Dịch Vụ</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">Giới Thiệu</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Liên Hệ</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../admin/uploaded_img/<?= $item['image']; ?>" class="rounded-5" alt="Ảnh đại diện" width="40">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item mt-2 mb-2 <?php echo $css; ?>" href="./index.php?pages=profile&action=file">Xem hồ sơ</a></li>
              <li><a class="dropdown-item mb-2 mt-2 <?php echo $login; ?>" href="product/dist/assets/account/login.php">Đăng nhập</a></li>
              <li><a class="dropdown-item mb-2 mt-2 <?php echo $logout; ?>" href="product/dist/assets/account/logout.php">Đăng xuất</a></li>
              <li><a class="dropdown-item mb-2 <?php echo $css_control; ?>" href="admin/index.php">Quản trị webste</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>