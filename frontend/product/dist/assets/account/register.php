<?php
session_start();
@include '../../../../config/config.php';
$message = array();
if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $sex = $_POST['sex'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $date_birth = $_POST['date_birth'];
  $role = $_POST['role'];
  $now = date("Y-m-d");
  $age = date_diff(date_create($date_birth), date_create($now))->y;


  $select = mysqli_query($conn, "SELECT email, password FROM users WHERE email = '$email'");

  if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($cpassword) || empty($date_birth)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin đăng ký!';
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Tài khoản đã tồn tại!';
  } else {
    if ($password != $cpassword) {
      $message[] = 'Mật khẩu nhập lại chưa trùng khớp!';
    } else if ($age < 18) {
      $message[] = 'Bạn chưa đủ 18 tuổi, Vui lòng thử lại!';
    } else {
      $insert = "INSERT INTO users (name, email, phone, sex, password, image, address, citizen_id, date_birth, facebook, tiktok, role) 
      VALUES ('$name', '$email', '$phone', '$sex', '$password', '', '', '', '$date_birth', '', '', '$role')";
      if (mysqli_query($conn, $insert)) {
        $message[] = 'Đăng ký thành công!';
        header('Location: login.php');
      } else {
        $message[] = 'Đăng ký không thành công, vui lòng kiểm tra lại!';
      }
    }
  }
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
  <link href="../../css/styles.css" rel="stylesheet" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" type="image/png" href="dist/assets/img/logo1.png" />
</head>

<body>
  <section class="bg-dark bg-opacity-75">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-3">Đăng ký</h3>
              <form action="" method="post">
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<p class="mb-md-2 bg-warning text-black p-2 rounded-3 col-md-12">' . $message . '</p>';
                  }
                }
                ?>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Tên</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="text" name="name">
                </div>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Email</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="email" name="email">
                </div>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Số điện thoại</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="text" name="phone">
                </div>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Mật khẩu</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="password" name="password">
                </div>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Nhập lại mật khẩu</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="password" name="cpassword">
                </div>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Giới tính</label>
                  <select class="col-md-12 p-2 rounded-1 border text-black" name="sex">
                    <option class="text-black" value="Nam">Nam</option>
                    <option class="text-black" value="Nữ">Nữ</option>
                  </select>
                </div>
                <div class="mt-2 form-outline">
                  <label class="form-label float-start ms-1" for="typeEmailX-2">Ngày sinh</label>
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="date" name="date_birth">
                </div>
                <div class="mt-2 form-outline">
                  <input class="col-md-12 text-black p-2 rounded-1 border" type="hidden" name="role" value="Khách hàng">
                </div>
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg btn-block w-100 mt-3" name="submit" type="submit">Đăng ký</button>
                  <div class="d-flex mt-2">
                    <p class="text-black">Bạn đã có tài khoản?<a class="text-danger text-decoration-none ms-md-1" href="login.php">Đăng Nhập</a></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>