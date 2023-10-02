<?php
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
//Xóa sản phẩm
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteProductId($id);
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
      $message[] = 'Vui lòng nhập đầy đủ thông tin';
    } else {
      uploadContact($user_id, $name, $email, $phone, $content);
      $message[] = 'Đã gửi';
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
      $image = "default_img.jpg";
    } else {
      $image = $fetch['image'];
    }
  }
} else {
  $image = "default_img.jpg";
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
