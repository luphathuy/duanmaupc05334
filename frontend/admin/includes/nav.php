<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GWine</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="dist/css/styles.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="dist/assets/img/logo1.png" />
</head>
<style>
    .truncate-text {
        white-space: nowrap;
        /* Ngăn văn bản xuống dòng */
        overflow: hidden;
        /* Ẩn các nội dung dư thừa */
        text-overflow: ellipsis;
        /* Hiển thị dấu ba chấm (...) khi bị cắt */
        max-width: 200px;
    }
</style>
<?php
//Setting role
if (!empty($_SESSION['user_role'])) {
    $role = $_SESSION['user_role'];
    if ($role === '2') {
        $css = 'd-none';
    }
} else {
    header('Location: /product/index.php');
}
//Setting image
if (!empty($item['image'])) {
    $item['image'];
} else {
    $item['image'] = "default_img.jpg";
}
?>
<?php foreach (getUserID($id) as $item) : ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">GWine Control</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-2 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Tìm Kiếm..." aria-label="Tìm Kiếm..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../admin/uploaded_img/<?= $item['image']; ?>" alt="Ảnh đại diện" width="40" class="rounded-5">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./dist/pages/account/forgot.php">Quên mật khẩu</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="./dist/pages/account/logout.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark scroll-none" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Trang Chủ</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng Điều Khiển
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản Lí</div>
                            <a class="nav-link <?php echo $css; ?>" href="./index.php?pages=users&action=list"><i class="fas fa-user pe-2"></i>Người Dùng</a>
                            <a class="nav-link" href="./index.php?pages=products&action=list"><i class="fas fa-shopping-bag pe-2"></i>Sản Phẩm</a>
                            <a class="nav-link" href="./index.php?pages=category&action=list"><i class="fas fa-edit pe-2"></i>Phân Loại</a>
                            <a class="nav-link" href="./index.php?pages=type&action=list"><i class="fas fa-edit pe-2"></i>Loại</a>
                            <a class="nav-link" href="./index.php?pages=comments&action=list"><i class="fas fa-message pe-2"></i>Bình Luận</a>
                            <a class="nav-link" href="./index.php?pages=contacts&action=list"><i class="fas fa-envelope pe-2"></i>Liên Hệ</a>
                            <div class="sb-sidenav-menu-heading">Trang</div>
                            <a class="nav-link" href="/index.php"><i class="fas fa-globe pe-2"></i>Website</a>
                            <a class="nav-link" href="https://www.facebook.com/profile.php?id=61551578563435" target="_blank"><i class="fa-brands fa-facebook-f pe-2"></i>Fanpage</a>
                            <a class="nav-link" href="https://www.tiktok.com/@ravanzach" target="_blank"><i class="fa-brands fa-tiktok pe-2"></i>Tiktok</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small text-uppercase">TÔI LÀ : <?= $item['name'] . " (" . $item['name_role'] . ")"; ?></div>
                        GWine
                    </div>
                </nav>
            </div>
        <?php endforeach ?>