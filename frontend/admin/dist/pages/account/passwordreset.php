<?php
session_start();
@include '../../../../config/config.php';
$message = array();
$user_id = $_SESSION['user_id'];
if (isset($_POST['submit'])) {
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  if ($password === $cpassword) {
    $reset_pass = mysqli_query($conn, "UPDATE users SET password = '$password' WHERE id = '$user_id'");
    if ($reset_pass > 0) {
      $message[] = 'Đã Thay Đổi Mật Khẩu <a href="http://good-wine/index.php" class="text-danger">Bấm Vào Đây</a> Để Trở Về Đăng Nhập';
    } else {
      $message[] = 'Lỗi không xác định!';
    }
  } else {
    $message[] = 'Mật khẩu không trùng khớp, vui lòng nhập lại!';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Nhập mật khẩu mới</title>
  <link rel="shortcut icon" type="image/png" href="../../assets/img/logo1.png" />
</head>

<body>
  <section class="bg-dark vh-100 bg-opacity-75">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center w-100 align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center bg-secondary bg-opacity-25">
              <h3 class="mb-2">Tìm tài khoản</h3>
              <?php
              if (isset($message)) {
                foreach ($message as $message) {
                  echo '<p class="rounded-3 col-md-12 pt-2 pb-2">' . $message . '</p>';
                }
              }
              ?>
              <form action="" method="post">
                <div class="form-outline mb-4">
                  <label class="form-label float-start h6">Mật khẩu mới</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="password" name="password">
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label float-start h6">Nhập lại mật khẩu mới</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="password" name="cpassword">
                </div>
                <div class="col-md-12">
                  <input class="btn btn-danger w-100 mt-3" name="submit" type="submit" value="Thay đổi">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>