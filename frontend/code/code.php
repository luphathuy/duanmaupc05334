<?php
//Đăng nhập
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
//Đăng ký
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
        header('Location: ./index.php?pages=account&action=login');
      } else {
        $message[] = 'Đăng ký không thành công, vui lòng kiểm tra lại!';
      }
    }
  }
}
//Quên mật khẩu user
if (isset($_POST['submit_manager'])) {
  $resetPass = $_POST['resetPass'];
  $select = mysqli_query($conn, "SELECT id, email, role FROM users WHERE email = '$resetPass'");
  if (empty($resetPass)) {
    $message[] = 'Vui lòng điền Email!';
  } elseif (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['reset_pass'] = $row['id'];
    $mess = '<div><p><b>Xin chào!</b></p>
    <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p><br>
    <p><button class="btn btn-success"><a href="http://good-wine/index.php?pages=account&action=passwordreset">
    Ấn vào đây để tạo lại mật khẩu</a></button></p><br>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu thì không cần thực hiện thêm hành động nào.</p></div>';

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/PHPMailer.php';
    require './PHPMailer-master/src/SMTP.php';

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
//Quên mật khẩu admin
if (isset($_POST['submit_admin'])) {
  $resetPass = $_POST['resetPass'];
  $select = mysqli_query($conn, "SELECT id, email, role FROM users WHERE email = '$resetPass'");
  if (empty($resetPass)) {
    $message[] = 'Vui lòng điền Email!';
  } elseif (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['reset_pass'] = $row['id'];
    $mess = '<div><p><b>Xin chào!</b></p>
    <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p><br>
    <p><button class="btn btn-success"><a href="http://good-wine/admin/index.php?pages=account&action=passwordreset">
    Ấn vào đây để tạo lại mật khẩu</a></button></p><br>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu thì không cần thực hiện thêm hành động nào.</p></div>';

    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';

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
//Đổi mật khẩu user
if (isset($_POST['resetpass'])) {
  if (isset($_SESSION['reset_pass'])) {
    $reset_pass = $_SESSION['reset_pass'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if ($password != $cpassword) {
      $message[] = 'Mật khẩu không trùng khớp, vui lòng nhập lại!';
    } else {
      mysqli_query($conn, "UPDATE users SET password = '$password' WHERE id = '$reset_pass'");
      $message[] = 'Đã Thay Đổi Mật Khẩu <a href="http://good-wine/index.php?pages=account&action=login" class="text-danger">Bấm Vào Đây</a> Để Đăng Nhập';
    }
  } else {
    echo 'Ko thấy';
  }
}
//Đổi mật khẩu admin
if (isset($_POST['resetpassadmin'])) {
  if (isset($_SESSION['reset_pass'])) {
    $reset_pass = $_SESSION['reset_pass'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if ($password != $cpassword) {
      $message[] = 'Mật khẩu không trùng khớp, vui lòng nhập lại!';
    } else {
      mysqli_query($conn, "UPDATE users SET password = '$password' WHERE id = '$reset_pass'");
      $message[] = 'Mật khẩu đã được thay đổi!';
    }
  } else {
    echo 'Ko thấy';
  }
}
//Đăng xuất
if (isset($_POST['forgot'])) {
  session_unset();
  session_destroy();

  header('Location: ../../../../index.php');
}
//xóa danh mục
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteCategoryId($id);
}
//chỉnh sửa danh mục
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  if (isset($_POST['edit_category'])) {
    $name = $_POST['name'];
    if (empty($name)) {
      $message[] = 'Vui lòng điền đầy đủ thông tin';
    } else {
      editCategoryId($name, $id);
    }
  }
}
//Thêm danh mục
if (isset($_POST['add_category'])) {
  $name = $_POST['name'];
  if (empty($name)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin';
  } else {
    addCategoryId($name);
  }
};
//Xóa bình luận
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteCommentId($id);
}
// Xóa liên hệ
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteContactId($id);
}

//Xóa người dùng
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteUserId($id);
}
//Sửa sản phẩm
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  if (isset($_POST['edit_products'])) {
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../admin/uploaded_img/' . $image;
    if (!empty($image)) {
      uploadImageProduct($image, $image_tmp_name, $image_folder, $id);
    }

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_sale = $_POST['product_sale'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $describe = $_POST['describe'];

    if (empty($product_name) || empty($product_price) || empty($product_sale) || empty($describe)) {
      $message[] = 'Vui lòng điền đầy đủ thông tin';
    } else {
      uploadProduct($product_name, $product_price, $product_sale, $category, $type, $describe, $id);
    }
  }
}
//Thêm sản phẩm 
if (isset($_POST['add_products'])) {
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = '../admin/uploaded_img/' . $image;
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_sale = $_POST['product_sale'];
  $describe = $_POST['describe'];
  $category = $_POST['category'];
  $type = $_POST['type'];

  if (empty($image) || empty($product_name) || empty($product_price) || empty($product_sale) || empty($describe)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin';
  } else {
    addProduct($product_name, $product_price, $product_sale, $image, $image_tmp_name, $image_folder, $category, $type, $describe);
  }
}
//Gửi bài liên hệ
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  if (isset($_POST['submit_contact'])) {
    $user_id = $id;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $content = $_POST['content'];
    if (empty($name) || empty($email) || empty($phone) || empty($content)) {
      $mess[] = 'Vui lòng nhập đầy đủ thông tin';
    } else {
      uploadContact($user_id, $name, $email, $phone, $content);
      $mess[] = 'Đã gửi';
    }
  }
}
//Sửa người dùng theo id
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  if (isset($_POST['edit_users'])) {
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../admin/uploaded_img/' . $image;
    if (!empty($image)) {
      uploadImageUser($image, $image_tmp_name, $image_folder, $id);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $citizen_id = $_POST['citizen_id'];
    $date_birth = $_POST['date_birth'];

    if (empty($name) || empty($email) || empty($phone)) {
      $message[] = 'Vui lòng điền đầy đủ thông tin';
    } else {
      uploadUserId($name, $email, $phone, $sex, $address, $citizen_id, $date_birth, $facebook, $tiktok, $id);
      header('Location: ./index.php?pages=users&action=list');
    }
  }
}
//Thêm người dùng
if (isset($_POST['add_users'])) {
  $name = $_POST['name'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $phone  = $_POST['phone'];
  $sex = $_POST['sex'];
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = '../admin/uploaded_img/' . $image;
  $address = $_POST['address'];
  $citizen_id = $_POST['citizen_id'];
  $date_birth = $_POST['date_birth'];
  $facebook = '';
  $tiktok = '';
  $role = $_POST['role'];
  $now = date("Y-m-d");
  $age = date_diff(date_create($date_birth), date_create($now))->y;
  $select = mysqli_query($conn, "SELECT email, password FROM users WHERE email = '$email'");
  if (empty($name) || empty($password) || empty($email) || empty($date_birth)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin';
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Email đã tồn tại';
  } else if ($age < 18) {
    $message[] = 'Bạn chưa đủ 18 tuổi, Vui lòng thử lại!';
  } else {
    uploadUser($name, $password, $email, $phone, $sex, $image, $image_tmp_name, $image_folder, $address, $citizen_id, $date_birth, $facebook, $tiktok, $role);
  }
}
//Sửa hồ sơ theo id
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  if (isset($_POST['edit_file'])) {
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../admin/uploaded_img/' . $image;
    if (!empty($image)) {
      uploadImageUser($image, $image_tmp_name, $image_folder, $id);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $sex = $_POST['sex'];
    $citizen_id = $_POST['citizen_id'];
    $date_birth = $_POST['date_birth'];
    $address = $_POST['address'];
    $facebook = $_POST['facebook'];
    $tiktok = $_POST['tiktok'];
    if (empty($name) || empty($email)) {
      $message[] = 'Không thể để trống email và tên của bạn!';
    } else {
      uploadUserId($name, $email, $phone, $sex, $address, $citizen_id, $date_birth, $facebook, $tiktok, $id);
      header('Location: ./index.php?pages=profile&action=file');
    }
  }
}
//Setting ảnh
if (!empty($_SESSION['id'])) {
  $user_id = $_SESSION['id'];
  $select_img = mysqli_query($conn, "SELECT id, image, name FROM users WHERE id ='$user_id'");
  if (mysqli_num_rows($select_img) > 0) {
    $fetch = mysqli_fetch_assoc($select_img);
    if (empty($fetch['image'])) {
      $images = "default_img.jpg";
    } else {
      $images = $fetch['image'];
    }
  }
} else {
  $images = "default_img.jpg";
}
//Setting role
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
//Lấy sản phẩm theo category of product list
if (isset($_GET['id_category'])) {
  $id_category = $_GET['id_category'];
  getAllProductCategory($id_category);
}
//Lấy sản phẩm theo category of detail
if (isset($_GET['category'])) {
  $category = $_GET['category'];
  getProductCategory($category);
}

//Lấy sản phẩm theo category of category_id
if (isset($_GET['id_category'])) {
  $id_category = $_GET['id_category'];
  getProductForCategory($id_category);
}

//Lấy sản phẩm theo detail
if (isset($_GET['detail'])) {
  $detail = $_GET['detail'];
  getProductDetail($detail);
}
//Lấy lượt xem theo detail
if (isset($_GET['detail'])) {
  $detail = $_GET['detail'];
  if (empty($_SESSION['last_view_time'])) {
    $_SESSION['last_view_time'] = time();
  } else {
    // Kiểm tra xem đã trôi qua ít nhất 5 giây kể từ lần truy cập trước đó
    $currentTime = time();
    $lastViewTime = $_SESSION['last_view_time'];
    if ($currentTime - $lastViewTime >= 2) {
      // Thực hiện truy vấn để kiểm tra xem có lượt xem cho 'detail' này trong cơ sở dữ liệu hay không
      $sql = mysqli_query($conn, "SELECT detail_id, view_count FROM views WHERE detail_id = $detail");
      if (mysqli_num_rows($sql) > 0) {
        // Nếu bài viết đã có lượt xem trước đó, tăng lượt xem lên 1
        $row = mysqli_fetch_assoc($sql);
        $view_count = $row["view_count"] + 1;
        // Thực hiện truy vấn UPDATE để cập nhật lượt xem
        $update_query = mysqli_query($conn, "UPDATE views SET view_count = $view_count WHERE detail_id = $detail");
        $_SESSION['last_view_time'] = $currentTime;
      } else {
        // Nếu bài viết chưa có lượt xem, thêm một bản ghi mới vào cơ sở dữ liệu
        $view_count = 1;
        // Thực hiện truy vấn INSERT để thêm bản ghi mới
        $insert_query = mysqli_query($conn, "INSERT INTO views (detail_id, view_count) VALUES ($detail, $view_count)");
        $_SESSION['last_view_time'] = $currentTime;
      }
    }
  }
}
//Lấy view theo detail
if (isset($_GET['detail'])) {
  $detail = $_GET['detail'];
  getViewProduct($detail);
}

//Hiện comment theo id sản phẩm
if (isset($_GET['detail'])) {
  $detail = $_GET['detail'];
  getCommentWithIdProduct($detail);
}

//Đăng bình luận
if (isset($_POST['submit_comment'])) {
  $content = $_POST['content'];
  $id_users = $_POST['id_users'];
  $id_product = $_POST['id_product'];
  if (empty($content)) {
    $message[] = 'Hãy viết gì đó!';
  } else {
    uploadComment($content, $id_users, $id_product);
  }
}
//Session cart
if (isset($_POST['add_to_cart'])) {
  if (empty($_SESSION['id'])) {
    header('Location: ./index.php?pages=account&action=login');
  } else {
    if (isset($_SESSION['cart'])) {
      $session_array_id = array_column($_SESSION['cart'], "id");
      if (!in_array($_GET['id'], $session_array_id)) {
        $session_array = array(
          'id' => $_GET['id'],
          'name' => $_POST['name'],
          'image' => $_POST['image'],
          'price' => $_POST['price'],
          'quantity' => $_POST['quantity']
        );
        $_SESSION['cart'][] = $session_array;
        $sp[] = '
      Đã thêm sản phẩm vào giỏ hàng!';
      } else {
        $sp[] = '
      Sản phẩm này đã có trong giỏ hàng!';
      }
    } else {
      $session_array = array(
        'id' => $_GET['id'],
        'name' => $_POST['name'],
        'image' => $_POST['image'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
      );
      $_SESSION['cart'][] = $session_array;
      $sp[] = '
      Đã thêm sản phẩm vào giỏ hàng!';
    }
  }
}
if (isset($_GET['id_comment'])) {
  $user_id = $_GET['id_comment'];
  // Đếm đơn hàng người dùng theo id
  countOrder($user_id);
  // Đếm liên hệ người dùng theo id
  countContact($user_id);
  // Đếm bình luận người dùng theo id
  countComment($user_id);
}
// Lấy liên hệ theo id người dùng
if (isset($_GET['id'])) {
  $user_id = $_GET['id'];
  getOrderSession($user_id);
  getCommentIdUser($user_id);
  getBill($user_id);
}
// Lấy liên hệ theo id người dùng
if (isset($_GET['vieworder'])) {
  $id_bill = $_GET['vieworder'];
  getCart($id_bill);
}
if (isset($_GET['edit'])) {
  if (isset($_POST['edit_order'])) {
    $status = $_POST['status'];
    uploadBillId($id, $status);
  }
}