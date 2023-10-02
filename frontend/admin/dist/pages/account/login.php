<?php
session_start();
$message = array();
@include '../../../../config/config.php';
if (isset($_POST['submit_login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $select = mysqli_query($conn, "SELECT id, email, password, role FROM users WHERE email = '$email' AND password = '$password'");
  if (empty($email) || empty($password)) {
    $message[] = 'Vui lòng điền thông tin đăng nhập!';
  } elseif (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_role'] = $row['role'];
    $_SESSION['id'] = $row['id'];
    header('Location: /index.php?pages=home');
  } else {
    $message[] = 'Email và mật khẩu chưa đúng!';
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
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-3">Đăng nhập</h3>
              <form action="" method="post">
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<p class="mb-md-2 bg-warning text-black p-2 rounded-3 col-md-12">' . $message . '</p>';
                  }
                }
                ?>
                <div class="form-outline mb-4">
                  <label class="form-label float-start ms-1">Email</label>
                  <input type="email" name="email" class="form-control form-control-lg" />
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label float-start ms-1">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" />
                </div>
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" value="" />
                  <label class="form-check-label ms-2"> Nhớ mật khẩu </label>
                </div>
                <button class="btn btn-primary btn-lg btn-block w-100" name="submit_login" type="submit">Đăng nhập</button>
                <a href="./index.php?pages=account&action=register" class="btn btn-primary btn-lg btn-block w-100 mt-3">Đăng ký</a>
                <a class="text-decoration-none text-black float-start mt-3" href="./index.php?pages=account&action=forgot">Quên mật khẩu</a>
                <hr class="my-5 mb-3">
                <button class="btn btn-lg btn-block btn-primary w-100" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Đăng nhập với Google</button>
                <button class="btn btn-lg btn-block btn-primary mb-2 w-100 mt-3" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i>Đăng nhập với Facebook</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>