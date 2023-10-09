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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

  /* Thong bao Popup  */
  .tbpopup .tboverlay {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1;
    display: none;
  }

  .tbpopup .tbcontent {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    background: #fff;
    max-width: 500px;
    z-index: 2;
    text-align: center;
    padding: 20px;
    box-sizing: border-box;
    font-family: "Open Sans", sans-serif;
    border-radius: 20px;
    display: block;
    position: fixed;
    box-shadow: 0px 0px 10px #111;
  }

  @media (max-width: 700px) {
    .tbpopup .tbcontent {
      width: 90%;
    }
  }

  .tbpopup .tbclose-btn {
    cursor: pointer;
    position: absolute;
    right: 20px;
    top: 20px;
    width: 35px;
    height: 35px;
    color: #ff4444;
    font-size: 30px;
    font-weight: 600;
    line-height: 35px;
    text-align: center;
    border-radius: 50%;
  }

  .tbpopup.active .tboverlay {
    display: block;
  }

  .tbpopup.active .tbcontent {
    transition: all 300ms ease-in-out;
    transform: translate(-50%, -50%) scale(1);
  }

  .tbbuttom {
    background: #00cc00;
    color: #fff
  }
</style>

<body id="page-top" class='content' onload="thongbaopopup()">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-black" id="mainNav">
    <div class="container">
      <a class="" href="./index.php?pages=home"><img src="product/dist/assets/img/logo1.png" alt="logo" width="75" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="align-items-md-center navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=home">Trang Chủ</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=products&action=list">Sản Phẩm</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=service">Dịch Vụ</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=introduce">Giới Thiệu</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=contact">Liên Hệ</a></li>
          <li class="nav-item">
            <form class="d-flex nav-link position-relative" role="search" action="" method="">
              <input class="form-control ps-5 rounded-5" type="search" id="search" name="search" aria-label="Search">
              <button class="btn border-0 position-absolute" type="submit"><i class="fa fa-search ms-1" style="font-size: 15px;"></i></button>
            </form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="./admin/uploaded_img/<?php echo $images ?>" class="rounded-5 border" alt="" width="40">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <?php
              if (isset($user_id)) {
              foreach (getUserSession($user_id) as $item) : ?>
              <li><a class="dropdown-item mt-2 mb-2 <?php echo $css; ?>" href="./index.php?pages=profile&action=file&id_comment=<?= $item['id']?>">Xem hồ sơ</a></li>
              <?php endforeach ?>
              <?php }else {
                echo '';
              } ?>
              <li><a class="dropdown-item mb-2 mt-2 <?php echo $login; ?>" href="./index.php?pages=account&action=login">Đăng nhập</a></li>
              <form class="m-0 p-0" method="post">
                <li><button type="submit" name="forgot" class="dropdown-item mb-2 mt-2 text-uppercase <?php echo $logout; ?>">Đăng xuất</button></li>
              </form>
              <li><a class="dropdown-item mb-2 <?php echo $css_control; ?>" href="admin/index.php">Quản trị webste</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="./index.php?pages=cart&action=cart"><i class="fas fa-shopping-basket" style='font-size:24px'></i></a></li>
        </ul>
      </div>
    </div>
  </nav>