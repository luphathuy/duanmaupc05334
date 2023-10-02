<?php
session_start();
@include '../../../../config/config.php';
$message = array();
if (isset($_POST['submit_manager'])) {
  $resetPass = mysqli_real_escape_string($conn, $_POST['resetPass']);
  $select = mysqli_query($conn, "SELECT id, email, role FROM users WHERE email = '$resetPass'");
  if (empty($resetPass)) {
    $message[] = 'Vui lòng điền Email!';
  } elseif (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id'] = $row['id'];
    $mess = '<div><p><b>Xin chào!</b></p>
    <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p><br>
    <p><button class="btn btn-success"><a href="http://good-wine/product/dist/assets/account/passwordreset.php">
    Ấn vào đây để tạo lại mật khẩu</a></button></p><br>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu thì không cần thực hiện thêm hành động nào.</p></div>';

    require '../../../../PHPMailer-master/src/Exception.php';
    require '../../../../PHPMailer-master/src/PHPMailer.php';
    require '../../../../PHPMailer-master/src/SMTP.php';

    $email = $resetPass;
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->Username = "huylppc05334@fpt.edu.vn";
    $mail->Password = "lenl ztdz evcs foia";
    $mail->FromName = "Reset Password";
    $mail->addAddress($email);
    $mail->Subject = "Reset Password";
    $mail->isHTML(TRUE);
    $mail->Body = $mess;
    if (!$mail->send()) {
      exit();
    } else {
      $message[] = 'Link tạo lại mật khẩu đã gửi đến email!';
    }
  } else {
    $message[] = 'Vui lòng nhập đúng email!';
  }
};
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
  <section class="bg-dark vh-100 bg-opacity-75">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-3">Quên mật khẩu</h3>
              <form action="" method="post">
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<p class="mb-md-2 bg-warning text-black p-1 rounded-3 col-md-12">' . $message . '</p>';
                  }
                }
                ?>
                <div class="form-outline mb-4">
                  <label class="form-label float-start ms-1">Email</label>
                  <input type="email" name="resetPass" class="form-control form-control-lg" />
                </div>
                <button class="btn btn-primary btn-lg btn-block w-100" name="submit_manager" type="submit">Tìm tài khoản</button>
                <a href="login.php" class="btn btn-primary btn-lg btn-block w-100 mt-3">Trở lại</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>