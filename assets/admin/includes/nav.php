<?php
//Setting role
if (isset($_SESSION['user_role'])) {
    $role = $_SESSION['user_role'];
    if ($role === '2') {
        $css = 'd-none';
    } elseif ($role === '3') {
        header('Location: ./dist/401.php');
    }
} else {
    header('Location: ./dist/401.php');
}
?>
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
    <link rel="shortcut icon" type="image/png" href="adist/assets/img/logo1.png" />
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

.content {
  width: 100%;
  /* Chiều rộng của nội dung */
  height: 100%;
  /* Chiều cao của nội dung */
  overflow-y: scroll;
  /* Hiển thị thanh cuộn dọc tùy chỉnh */
}

/* Tạo thanh cuộn tùy chỉnh */
.content::-webkit-scrollbar {
  width: 0;
  /* Chiều rộng của thanh cuộn tùy chỉnh */
}
</style>
<?php foreach (getUserSession($user_id) as $item) :
    //Setting image
    if (!empty($item['image'])) {
        $item['image'];
    } else {
        $item['image'] = "default_img.jpg";
    }
    if ($item['role'] = 1) {
        $item['role'] = 'Admin';
    } else {
        $item['role'] = 'Nhân viên';
    }
?>

    <body class="sb-nav-fixed content">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
            <!-- Navbar Brand-->
            <div class="d-flex align-items-center">
                <a class="navbar-brand ps-3 w-100 me-3" href="index.php"><img src="../admin/dist/assets/img/logo1.png" width="50" height="50" alt="">GWINE</a>
            </div>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-md-5" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-flex nav-link position-relative ms-auto" name="search" role="search">
                <input class="form-control ps-5 rounded-5" type="search" aria-label="Search">
                <button class="btn border-0 position-absolute" type="submit"><i class="fa fa-search ms-1" style="font-size: 15px;"></i></button>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../admin/uploaded_img/<?= $item['image']; ?>" alt="Ảnh đại diện" width="40" class="rounded-5">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item mb-1" href="./index.php?pages=account&action=forgot">Quên mật khẩu</a></li>
                        <form class="m-0 p-0" method="post">
                            <li><button type="submit" name="forgot" class="dropdown-item mt-1 <?php echo $logout; ?>">Đăng xuất</button></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark scroll-none" id="sidenavAccordion">
                    <div class="sb-sidenav-menu content">
                        <div class="nav bg-black border-top">
                            <div class="sb-sidenav-menu-heading">Trang Chủ</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng Điều Khiển
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản Lí</div>
                            <a class="nav-link <?php echo $css; ?>" href="./index.php?pages=users&action=list"><i class="fas fa-user pe-2"></i>Người Dùng</a>
                            <a class="nav-link" href="./index.php?pages=products&action=list"><i class="fas fa-shopping-bag pe-2"></i>Sản Phẩm</a>
                            <a class="nav-link" href="./index.php?pages=order&action=list"><i class="fa-brands fa-shopify pe-2"></i>Đơn hàng</a>
                            <a class="nav-link" href="./index.php?pages=category&action=list"><i class="fas fa-edit pe-2"></i>Phân Loại</a>
                            <a class="nav-link" href="./index.php?pages=type&action=list"><i class="fa-solid fa-layer-group pe-2"></i></i>Loại</a>
                            <a class="nav-link" href="./index.php?pages=comments&action=list"><i class="fas fa-message pe-2"></i>Bình Luận</a>
                            <a class="nav-link" href="./index.php?pages=contacts&action=list"><i class="fas fa-envelope pe-2"></i>Liên Hệ</a>
                            <a class="nav-link" href="./index.php?pages=views&action=list"><i class="fas fa-eye pe-2"></i>Lượt Xem</a>
                            <div class="sb-sidenav-menu-heading">Trang</div>
                            <a class="nav-link" href="/index.php"><i class="fas fa-globe pe-2"></i>Website</a>
                            <a class="nav-link" href="https://www.facebook.com/profile.php?id=61551578563435" target="_blank"><i class="fa-brands fa-facebook-f pe-2"></i>Fanpage</a>
                            <a class="nav-link" href="https://www.tiktok.com/@ravanzach" target="_blank"><i class="fa-brands fa-tiktok pe-2"></i>Tiktok</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer bg-black bg-gradient">
                        <div class="small text-uppercase">TÔI LÀ : <?= $item['name'] . " (" . $item['role'] . ")"; ?></div>
                        Copyright © GWine 2023
                    </div>
                </nav>
            </div>
        <?php endforeach ?>