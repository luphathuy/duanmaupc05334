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
    header('Location: ./index.php?pages=home');
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
    } elseif (strlen($_POST['password']) < 6) {
      $message[] = 'Mật khẩu ít nhất 6 ký tự!';
    } elseif ($age < 18) {
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
    <p><button class="btn btn-success"><a href="http://gwine/index.php?pages=account&action=passwordreset">
    Ấn vào đây để tạo lại mật khẩu</a></button></p><br>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu thì không cần thực hiện thêm hành động nào.</p></div>';

    require './assets/PHPMailer-master/src/Exception.php';
    require './assets/PHPMailer-master/src/PHPMailer.php';
    require './assets/PHPMailer-master/src/SMTP.php';

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
    $message[] = 'Email vừa nhập không có!';
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
    <p><button class="btn btn-success"><a href="http://gwine/assets/admin/index.php?pages=account&action=passwordreset">
    Ấn vào đây để tạo lại mật khẩu</a></button></p><br>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu thì không cần thực hiện thêm hành động nào.</p></div>';

    require '../../assets/PHPMailer-master/src/Exception.php';
    require '../../assets/PHPMailer-master/src/PHPMailer.php';
    require '../../assets/PHPMailer-master/src/SMTP.php';

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
    $message[] = 'Email vừa nhập không có!';
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
    } elseif (strlen($_POST['password']) < 6) {
      $message[] = 'Mật khẩu ít nhất 6 ký tự';
    } else {
      mysqli_query($conn, "UPDATE users SET password = '$password' WHERE id = '$reset_pass'");
      $message[] = 'Đã Thay Đổi Mật Khẩu <a href="http://gwine/index.php?pages=account&action=login" class="text-danger">Bấm Vào Đây</a> Để Đăng Nhập';
    }
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
    } elseif (strlen($_POST['password']) < 6) {
      $message[] = 'Mật khẩu ít nhất 6 ký tự';
    } else {
      mysqli_query($conn, "UPDATE users SET password = '$password' WHERE id = '$reset_pass'");
      $message[] = 'Mật khẩu đã được thay đổi!';
    }
  }
}
//Đăng xuất
if (isset($_POST['forgot'])) {
  session_unset();
  session_destroy();

  header('Location: ./index.php?pages=account&action=login');
}
//xóa danh mục
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteProductCategory($id);
  deleteCategoryId($id);
}
//Xóa sản phẩm
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteProductId($id);
}
//xóa đơn hàng
// if (isset($_GET['delete'])) {
//   $id = $_GET['delete'];
//   deleteBillId($id);
//   deleteCartId($id);
// }
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
  $select = mysqli_query($conn, "SELECT name FROM category WHERE name = '$name'");
  if (empty($name)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin';
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Tên danh mục đã tồn tại';
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
    $toggle = $_POST['toggle'];

    if (empty($product_name) || empty($product_price) || empty($product_sale) || empty($describe)) {
      $message[] = 'Vui lòng điền đầy đủ thông tin';
    } else {
      uploadProduct($product_name, $product_price, $product_sale, $category, $type, $describe, $toggle, $id);
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
  $toggle = $_POST['toggle'];
  $type = $_POST['type'];

  if (empty($image) || empty($product_name) || empty($product_price) || empty($product_sale) || empty($describe)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin';
  } elseif ($product_price < 0) {
    $message[] = 'Giá gốc không được âm';
  } elseif ($product_sale < 0 || $product_sale > $product_price) {
    $message[] = 'Giá giảm không được âm và không được lớn hơn giá gốc';
  } else {
    addProduct($product_name, $product_price, $product_sale, $image, $image_tmp_name, $image_folder, $category, $type, $describe, $toggle);
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
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $citizen_id = $_POST['citizen_id'];
    $date_birth = $_POST['date_birth'];
    $status = $_POST['status'];
    $now = date("Y-m-d");
    $age = date_diff(date_create($date_birth), date_create($now))->y;
    if (empty($name) || empty($phone) || empty($address) || empty($citizen_id) || empty($date_birth)) {
      $message[] = 'Vui lòng điền đầy đủ thông tin';
    } else if ($age < 18) {
      $message[] = 'Bạn chưa đủ 18 tuổi, Vui lòng thử lại!';
    } else {
      uploadUserId($name, $phone, $sex, $address, $citizen_id, $date_birth, $facebook, $tiktok, $id);
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
  $status = $_POST['status'];
  $facebook = '';
  $tiktok = '';
  $role = $_POST['role'];
  $now = date("Y-m-d");
  $age = date_diff(date_create($date_birth), date_create($now))->y;
  $select = mysqli_query($conn, "SELECT email, password FROM users WHERE email = '$email'");
  if (empty($name) || empty($password) || empty($email) || empty($phone) || empty($address) || empty($citizen_id) || empty($date_birth)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin';
  } elseif (strlen($_POST['password']) < 6) {
    $message[] = 'Mật khẩu ít nhất 6 ký tự!';
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Email đã tồn tại';
  } else if ($age < 18) {
    $message[] = 'Bạn chưa đủ 18 tuổi, Vui lòng thử lại!';
  } else {
    uploadUser($name, $password, $email, $phone, $sex, $image, $image_tmp_name, $image_folder, $address, $citizen_id, $date_birth, $status, $facebook, $tiktok, $role);
  }
}
//Sửa hồ sơ theo id
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  if (isset($_POST['edit_file'])) {
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = './assets/admin/uploaded_img/' . $image;
    if (!empty($image)) {
      uploadImageUser($image, $image_tmp_name, $image_folder, $id);
    }
    $name = $_POST['name'];
    $phone  = $_POST['phone'];
    $sex = $_POST['sex'];
    $citizen_id = $_POST['citizen_id'];
    $date_birth = $_POST['date_birth'];
    $address = $_POST['address'];
    $facebook = $_POST['facebook'];
    $tiktok = $_POST['tiktok'];
    $now = date("Y-m-d");
    $age = date_diff(date_create($date_birth), date_create($now))->y;
    if (empty($name) || empty($phone) || empty($date_birth)) {
      $message[] = 'Không thể để trống một số thông tin!';
    } else if ($age < 18) {
      $message[] = 'Bạn chưa đủ 18 tuổi, Vui lòng thử lại!';
    } else {
      uploadUserId($name, $phone, $sex, $address, $citizen_id, $date_birth, $facebook, $tiktok, $id);
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
// Lấy profile theo id người dùng
if (isset($_GET['profile_id'])) {
  $id = $_GET['profile_id'];
  getUserId($id);
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
if (isset($_GET['view'])) {
  $views = $_GET['view'];
  getCommentId($views);
  getProductCategoryViews($views);
}
// Lấy liên hệ theo id người dùng
if (isset($_GET['user_id'])) {
  $id_user = $_GET['user_id'];
  getCommentDelete($id_user);
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
// Thanh toán sản phẩm
if (isset($_POST['payCart'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $emails = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $note = $_POST['note'];
  $total = $_POST['total'];
  $pay = $_POST['pay'];
  if (empty($name) || empty($emails) || empty($phone) || empty($address)) {
    $message[] = 'Vui lòng điền đầy đủ thông tin!';
  } else {
    $id_bill = insertBill($id, $name, $emails, $phone, $address, $note, $total, $pay);
    if ($id_bill) {
      for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        $names = $_SESSION['cart'][$i]['name'];
        $image = $_SESSION['cart'][$i]['image'];
        $price = $_SESSION['cart'][$i]['price'];
        $quantity = $_SESSION['cart'][$i]['quantity'];
        $totals = $price * $quantity;
        insertCart($names, $image, $price, $quantity, $totals, $id_bill);
      }
      if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        foreach (getBill($user_id) as $date) {
          $date_bill = $date['create_at'];
        }
      } else {
        echo '';
      }

      if ($pay === '0') {
        $pay_show = 'Thanh toán khi nhận hàng';
      } else {
        $pay_show = 'Chuyển khoản';
      }

      $heading = "GWine_Hoa don dien tu_don hang so: $id_bill";

      $body = array();
      foreach ($_SESSION['cart'] as $data) {
        $body[] = "
      <tr class='order_item'>
        <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
        $data[name] </td>
        <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
        $data[quantity] </td>
        <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
          <span class='woocommerce-Price-amount amount'>" . number_format($data['price'] * $data['quantity'], 3) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span>
        </td>
      </tr>
      ";
      }
      $item = implode($body);
      echo '
      <div class="pt-3 text-center mt-5">
        <img src="https://i.pinimg.com/originals/9b/0e/8a/9b0e8a959f1c77bf0eb46bd737457a30.gif" width="100%" height="300px" alt="">
        <h3 class="mt-5">Cảm ơn bạn đã mua hàng!</h3>
        <h4 class="mt-3">Chi tiết đơn hàng đã gửi về email của bạn!</h4>
        <p class="mt-3">Ấn vào <a href="./index.php?pages=home"><b>Đây</b></a> để trở về trang chủ!</p>
      </div>
    ';


      $mess = "<table width='100%' id='outer_wrapper' style='background-color: #f7f7f7' 'bgcolor='#f7f7f7'>
      <tbody>
        <tr>
        
          <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
          <td width='600'>
            <div id='wrapper' dir='ltr' style='margin: 0 auto;padding: 70px 0;width: 100%;max-width: 600px'>
              <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <tbody>
                  <tr>
                    <td align='center' valign='top'>
                      <div id='template_header_image'>
                      </div>
                      <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_container' style='background-color: #fff;border: 1px solid #dedede;border-radius: 3px' bgcolor='#fff'>
                        <tbody>
                          <tr>
                            <td align='center' valign='top'>
                              <!-- Header -->
                              <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_header' style='background-color: #7f54b3;color: #fff;border-bottom: 0;font-weight: bold;line-height: 100%;vertical-align: middle;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius: 3px 3px 0 0' bgcolor='#7f54b3'>
                                <tbody>
                                  <tr>
                                    <td id='header_wrapper' class='bg-dark' style='padding: 36px 48px;display: block'>
                                      <h1 style='font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 30px;font-weight: 300;line-height: 150%;margin: 0;text-align: left;color: #fff;'>Cảm ơn bạn đã đặt hàng</h1>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- End Header -->
                            </td>
                          </tr>
                          <tr>
                            <td align='center' valign='top'>
                              <!-- Body -->
                              <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_body'>
                                <tbody>
                                  <tr>
                                    <td valign='top' id='body_content' style='background-color: #fff' bgcolor='#fff'>
                                      <!-- Content -->
                                      <table border='0' cellpadding='20' cellspacing='0' width='100%'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='padding: 48px 48px 32px'>
                                              <div id='body_content_inner' style='color: #636363;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 14px;line-height: 150%;text-align: left' align='left'>

                                                <p style='margin: 0 0 16px'><b>GWine</b> xin chào</p>
                                                <p style='margin: 0 0 16px'>Đơn hàng đang được xử lí và sẽ gửi đi sớm!</p>


                                                <h2 style='color: #7f54b3;display: block;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left'>
                                                  [Mã đơn hàng: $id_bill] ($date_bill) </h2>

                                                <div style='margin-bottom: 40px'>
                                                  <table class='td' cellspacing='0' cellpadding='6' border='1' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;width: 100%;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' width='100%'>
                                                    <thead>
                                                      <tr>
                                                        <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Sản phẩm</th>
                                                        <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Số lượng</th>
                                                        <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Giá</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      $item
                                                    </tbody>
                                                    <tfoot>
                                                      <tr>
                                                        <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left;border-top-width: 4px' align='left'>Tổng số phụ:</th>
                                                        <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left;border-top-width: 4px' align='left'><span class='woocommerce-Price-amount amount'>" . number_format($total, 3) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></td>
                                                      </tr>
                                                      <tr>
                                                        <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Phương thức thanh toán:</th>
                                                        <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>$pay_show</td>
                                                      </tr>
                                                      <tr>
                                                        <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Tổng cộng:</th>
                                                        <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'><span class='woocommerce-Price-amount amount'>" . number_format($total, 3) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></td>
                                                      </tr>
                                                      <tr>
                                                        <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Lưu ý:</th>
                                                        <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>$note</td>
                                                      </tr>
                                                    </tfoot>
                                                  </table>
                                                </div>

                                                <table id='addresses' cellspacing='0' cellpadding='0' border='0' style='width: 100%;vertical-align: top;margin-bottom: 40px;padding: 0' width='100%'>
                                                  <tbody>
                                                    <tr>
                                                      <td valign='top' width='50%' style='text-align: left;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;border: 0;padding: 0' align='left'>
                                                        <h2 style='color: #7f54b3;display: block;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left'>Địa chỉ thanh toán</h2>
                                                        <address class='address' style='padding: 12px;color: #636363;border: 1px solid #e5e5e5'>
                                                        $name <br>
                                                        $address <br>
                                                          <a href='tel:$phone' style='color: #7f54b3;font-weight: normal;text-decoration: underline'>$phone</a> 
                                                          <br>$emails
                                                        </address>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p style='margin: 0 0 16px'>Cảm ơn bạn đã tin dùng dịch vụ của GWine!</p>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <!-- End Content -->
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- End Body -->
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
          <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
        </tr>
      </tbody>
    </table> ";

      require './assets/PHPMailer-master/src/Exception.php';
      require './assets/PHPMailer-master/src/PHPMailer.php';
      require './assets/PHPMailer-master/src/SMTP.php';

      $email = $emails;
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = '587';
      $mail->Username = 'huylppc05334@fpt.edu.vn';
      $mail->Password = 'lenl ztdz evcs foia';
      $mail->FromName = 'GWine';
      $mail->addAddress($email);
      $mail->Subject = $heading;
      $mail->isHTML(TRUE);
      $mail->Body = $mess;
      if (!$mail->send()) {
        exit();
      }
    } else {
      echo 'Lỗi';
    }
  }
  unset($_SESSION['cart']);
}
//Xử lí cart
$total = 0;
$soPhanTu = 0;
if (!isset($_SESSION['cart']) || (count($_SESSION['cart']) == 0)) {
  $cart[] = 'Không có sản phẩm nào trong giỏ hàng!';
} else {
  if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $data) {

      // Tính tổng giá tiền và số lượng sản phẩm
      $total += $data['price'] * $data['quantity'];
      $soPhanTu += $data['quantity'];
    }


    if (isset($_GET['ac'])) {
      if ($_GET['ac'] == "remove") {
        foreach ($_SESSION['cart'] as $key => $data) {
          if ($data['id'] == $_GET['id']) {
            unset($_SESSION['cart'][$key]);
            $total -= $data['price'] * $data['quantity'];
            $soPhanTu -= $data['quantity'];
          }
        }
      }
      if ($_GET['ac'] == "clearall") {
        unset($_SESSION['cart']);
        unset($total);
        unset($soPhanTu);
        $cart[] = 'Không có sản phẩm nào trong giỏ hàng!';
      }
    }

    if (isset($_GET['ac']) && in_array($_GET['ac'], ['increase', 'decrease'])) {
      foreach ($_SESSION['cart'] as $key => $data) {
        if ($data['id'] == $_GET['id']) {
          if ($_GET['ac'] == "increase") {
            // Increase the quantity
            $_SESSION['cart'][$key]['quantity'] += 1;
            $total += $data['price'];
            $soPhanTu += 1;
          } elseif ($_GET['ac'] == "decrease" && $_SESSION['cart'][$key]['quantity'] > 1) {
            // Decrease the quantity (if it's greater than 1)
            $_SESSION['cart'][$key]['quantity'] -= 1;
            $total -= $data['price'];
            $soPhanTu -= 1;
          }
        }
      }
    }
  } else {
    echo '';
  }
}
// if (isset($_GET['code'])) {
//   $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
// } 

// if (!empty($token["error"] != "invalid_grant")) {
//   $oAuth = new Google_service_Oauth2($gClient);
//   $userData = $oAuth->userinfo_v2_me->get();

  // echo "<pre>";
  // var_dump($token);
  // echo "<pre>";
