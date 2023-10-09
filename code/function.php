<?php
require_once "code.php";
//slug
function createSlug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}
//lấy tất cả danh mục
function getAllCategory()
{
    global $conn;
    $query = "SELECT id, name FROM category";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//lấy danh mục theo id
function getOneCategory($id)
{
    global $conn;
    $query = "SELECT id, name FROM category WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Xóa danh mục
function deleteCategoryId($id)
{
    global $conn;
    $query = "DELETE FROM category WHERE id = '$id'";
    mysqli_query($conn, $query);
}
//Xóa bill
function deleteBillId($id)
{
    global $conn;
    $query = "DELETE FROM cart WHERE id_bill = '$id'";
    mysqli_query($conn, $query);
}
//Xóa cart
function deleteCartId($id)
{
    global $conn;
    $query = "DELETE FROM bill WHERE id = '$id'";
    mysqli_query($conn, $query);
}
//Chỉnh sửa danh mục
function editCategoryId($name, $id)
{
    global $conn;
    $query = "UPDATE category SET name = '$name' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('Location: ./index.php?pages=category&action=list');
}
//Thêm danh mục
function addCategoryId($name)
{
    global $conn;
    $query = "INSERT INTO category (name) VALUES ('$name')";
    mysqli_query($conn, $query);
    header('Location: ./index.php?pages=category&action=list');
}
//Lấy tất cả bình luận theo id user, id product
function getAllComment()
{
    global $conn;
    $query = "SELECT c.id as id, c.content as content, c.id_users as id_users, c.id_product as id_product, c.comment_at as comment_at, 
    u.id as user_id, u.image as user_image, u.name as user_name, p.id as product_id, p.product_name as product_name 
    FROM comments c, users u, products p WHERE c.id_users = u.id AND c.id_product = p.id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy comment theo id sản phẩm
function getCommentWithIdProduct($detail)
{
    global $conn;
    $query = "SELECT c.id as id, c.content as content, c.id_users as id_users, c.id_product as id_product, c.comment_at as comment_at, 
    u.id as user_id, u.image as user_image, u.name as user_name FROM comments c, users u WHERE c.id_users = u.id AND c.id_product = '$detail'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy comment theo id sản phẩm
function getCommentIdUser($user_id)
{
    global $conn;
    $getCommentIdUser = "SELECT c.id as id, c.content as content, c.id_users as id_users, c.id_product as id_product, c.comment_at as comment_at, c.comment_at as comment_at,
    p.id as product_id, p.product_name as product_name FROM comments c, products p WHERE c.id_users = '$user_id' AND c.id_product = p.id";
    $sql = mysqli_query($conn, $getCommentIdUser);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Đếm số bình luận theo id
function countComment($user_id)
{
    global $conn;
    $condition = "id_users = '$user_id'";
    $countComment = "SELECT COUNT(id) as count FROM comments WHERE $condition";
    $sql = mysqli_query($conn, $countComment);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Đếm số đơn hàng theo id
function countOrder($user_id)
{
    global $conn;
    $condition = "user_id = '$user_id'";
    $countOrder = "SELECT COUNT(id) as count FROM bill WHERE $condition";
    $sql = mysqli_query($conn, $countOrder);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Đếm số liên hệ theo id
function countContact($user_id)
{
    global $conn;
    $condition = "user_id = '$user_id'";
    $countContact = "SELECT COUNT(id) as count FROM contacts WHERE $condition";
    $sql = mysqli_query($conn, $countContact);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy contact theo session người dùng
function getContactSession($user_id)
{
    global $conn;
    $getContactId = "SELECT user_id, name, email, phone, content, create_at FROM contacts WHERE user_id = '$user_id'";
    $sql = mysqli_query($conn, $getContactId);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy bill theo session người dùng
function getBill($user_id)
{
    global $conn;
    $getBill = "SELECT id, user_id, name, email, phone, address, note, total, pay, status, create_at FROM bill WHERE user_id = '$user_id'";
    $sql = mysqli_query($conn, $getBill);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}

//Lấy tất cả bill
function getAllBill()
{
    global $conn;
    $getAllBill = "SELECT id, user_id, name, email, phone, address, note, total, pay, status, create_at FROM bill";
    $sql = mysqli_query($conn, $getAllBill);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy cart theo id bill
function getCart($id_bill)
{
    global $conn;
    $getCart = "SELECT name, image, price, quantity, total, id_bill, create_at FROM cart WHERE id_bill = '$id_bill'";
    $sql = mysqli_query($conn, $getCart);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//lấy bill theo id
function getOneBillId($id)
{
    global $conn;
    $getOneBillId = "SELECT id, status FROM bill WHERE id = '$id'";
    $sql = mysqli_query($conn, $getOneBillId);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Cập nhật bill theo id
function uploadBillId($id, $status)
{
    global $conn;
    $uploadBillId = "UPDATE bill SET status = '$status' WHERE id = '$id'";
    $sql = mysqli_query($conn, $uploadBillId);
    header('Location: ./index.php?pages=order&action=list');
}
//Lấy tất cả cart
function getAllCart()
{
    global $conn;
    $getAllCart = "SELECT name, image, price, quantity, total, id_bill, create_at FROM cart";
    $sql = mysqli_query($conn, $getAllCart);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy order theo session người dùng
function getOrderSession($user_id)
{
    global $conn;
    $getOrderSession = "SELECT b.id as id, b.user_id as user_id, b.name as name, b.email as email, b.phone as phone, b.address as address, b.note as note, 
    b.total as total, b.pay as pay, b.status as status, b.create_at as create_at, c.name as nameC, c.image as imageC, c.price as priceC, c.quantity as quantityC,
    c.total as totalC, c.id_bill as id_billC FROM bill b, cart c WHERE c.id_bill = b.id AND b.user_id = '$user_id'";
    $sql = mysqli_query($conn, $getOrderSession);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Xóa bình luận
function deleteCommentId($id)
{
    global $conn;
    $query = "DELETE FROM comments WHERE id = $id";
    mysqli_query($conn, $query);
}
//Lấy tất cả liên hệ
function getAllContact()
{
    global $conn;
    $query = "SELECT id, name, email, phone, content FROM contacts";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Xóa liên hệ
function deleteContactId($id)
{
    global $conn;
    $query = "DELETE FROM contacts WHERE id = '$id'";
    mysqli_query($conn, $query);
}
//Lấy tất cả sản phẩm
function getAllProduct()
{
    global $conn;
    $limit_show = 20;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
    p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.describe as `describe`, 
    c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type LIMIT $limit_show";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo type (Loại trưng bày)
function getAllProductType()
{
    global $conn;
    $limit_home = 8;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
    p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.describe as `describe`, 
    c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type AND p.type = '2' LIMIT $limit_home";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo detail
function getProductDetail($detail)
{
    global $conn;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
    p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.describe as `describe`, 
    c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type AND p.id = '$detail'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy view theo detail product
function getViewProduct($detail)
{
    global $conn;
    $query = "SELECT id, detail_id, view_count FROM views WHERE detail_id = '$detail'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy view theo detail product
function getAllView()
{
    global $conn;
    $query = "SELECT v.detail_id as detail_id, v.view_count as view_count, p.id as id, p.product_name as product_name, p.image as image FROM views v, products p WHERE v.detail_id = p.id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo category of product list
function getAllProductCategory($id_category)
{
    global $conn;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
      p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.describe as `describe`, 
      c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type AND p.category = '$id_category'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo category of detail
function getProductCategory($category)
{
    global $conn;
    $limit = 8;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
      p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.describe as `describe`, 
      c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type AND p.category = '$category' LIMIT $limit";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Thêm sản phẩm
function addProduct($product_name, $product_price, $product_sale, $image, $image_tmp_name, $image_folder, $category, $type, $describe)
{
    global $conn;
    $addProduct = "INSERT INTO products (product_name, product_price, product_sale, image, category, type, `describe`) 
    VALUES ('$product_name', '$product_price', '$product_sale', '$image', '$category', '$type', '$describe')";
    mysqli_query($conn, $addProduct);
    move_uploaded_file($image_tmp_name, $image_folder);
    header('Location: ./index.php?pages=products&action=list');
}
//Tải ảnh sản phẩm
function uploadImageProduct($image, $image_tmp_name, $image_folder, $id)
{
    global $conn;
    $uploadImageProduct = "UPDATE products SET image = '$image' WHERE id = '$id'";
    mysqli_query($conn, $uploadImageProduct);
    move_uploaded_file($image_tmp_name, $image_folder);
}
//Sửa và tải sản phẩm lên
function uploadProduct($product_name, $product_price, $product_sale, $category, $type, $describe, $id)
{
    global $conn;
    $query = "UPDATE products SET product_name = '$product_name', product_price = '$product_price', 
    product_sale = '$product_sale', category = '$category', type = '$type', `describe` = '$describe' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('Location: ./index.php?pages=products&action=list');
}
//Lấy sản phẩm theo id
function getProductID($id)
{
    global $conn;
    $query = "SELECT id, product_name, product_price, product_sale, image, category, type, `describe` FROM products WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo id category
function getProductIdCategory($id_category)
{
    global $conn;
    $query = "SELECT id, product_name, product_price, product_sale, image, category, type, `describe` FROM products WHERE category = '$id_category'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy tất cả type (loại) trưng bày
function getAllType()
{
    global $conn;
    $query = "SELECT id, name, `describe` FROM type";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy tất cả người dùng
function getAllUser()
{
    global $conn;
    $query = "SELECT id, name, email, phone, sex, address, citizen_id, date_birth, image, facebook, tiktok, role, create_at FROM users";
    $getAllUser = mysqli_query($conn, $query);
    if ($getAllUser) {
        return $getAllUser->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy người dùng theo session
function getUserSession($user_id)
{
    global $conn;
    $query = "SELECT id, name, email, phone, sex, address, citizen_id, date_birth, image, facebook, tiktok, role, create_at
    FROM users WHERE id = '$user_id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Xóa người dùng
function deleteUserId($id)
{
    global $conn;
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $query);
}
//Xóa sản phẩm
function deleteProductId($id)
{
    global $conn;
    $deleteProductId = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $deleteProductId);
}
//Thêm người dùng
function uploadUser($name, $password, $email, $phone, $sex, $image, $image_tmp_name, $image_folder, $address, $citizen_id, $date_birth, $facebook, $tiktok, $role)
{
    global $conn;
    $query = "INSERT INTO users (name, password, email, phone, sex, image, `address`, citizen_id, date_birth, facebook, tiktok, role) 
    VALUES ('$name', '$password', '$email', '$phone', '$sex', '$image', '$address', '$citizen_id', '$date_birth', '$facebook', '$tiktok', '$role')";
    mysqli_query($conn, $query);
    move_uploaded_file($image_tmp_name, $image_folder);
    header('Location: ./index.php?pages=users&action=list');
}
//Cập nhật người dùng
function uploadUserId($name, $email, $phone, $sex, $address, $citizen_id, $date_birth, $facebook, $tiktok, $id)
{
    global $conn;
    $query = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', sex = '$sex',
    `address` = '$address', citizen_id = '$citizen_id', date_birth = '$date_birth', facebook = '$facebook', tiktok = '$tiktok' WHERE id = '$id'";
    mysqli_query($conn, $query);
}
//Giữ nguyên ảnh khi người dùng không thay đổi ảnh
function uploadImageUser($image, $image_tmp_name, $image_folder, $id)
{
    global $conn;
    $uploadImageUser = "UPDATE users SET image = '$image' WHERE id = '$id'";
    mysqli_query($conn, $uploadImageUser);
    move_uploaded_file($image_tmp_name, $image_folder);
}
//Gửi bài liên hệ
function getContactId()
{
    global $conn;
    $getContactId = "SELECT c.name, c.user_id, c.email, c.phone, c.content,
    u.id, u.name FROM contacts c, users u WHERE c.user_id = u.id";
    $sql = mysqli_query($conn, $getContactId);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Gửi bài liên hệ
function uploadContact($user_id, $name, $email, $phone, $content)
{
    global $conn;
    $uploadContact = "INSERT INTO contacts (user_id, name, email, phone, content) 
    VALUES ('$user_id', '$name', '$email', '$phone', '$content')";
    mysqli_query($conn, $uploadContact);
}
//Lấy người dùng theo id
function getUserId($id)
{
    global $conn;
    $query = "SELECT id, name, email, phone, sex, address, citizen_id, date_birth, image, facebook, tiktok, role, create_at FROM users WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo category
function getProductForCategory($id_category)
{
    global $conn;
    $getProductForCategory = "SELECT id, name FROM category WHERE id = '$id_category'";
    $sql = mysqli_query($conn, $getProductForCategory);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Gửi bình luận
function uploadComment($content, $id_users, $id_product)
{
    global $conn;
    $uploadComment = "INSERT INTO comments (content, id_users, id_product) VALUES ('$content', '$id_users', '$id_product')";
    mysqli_query($conn, $uploadComment);
}
// Hàm để chèn thông tin người mua vào bill
function insertBill($id, $name, $emails, $phone, $address, $note, $total, $pay)
{
    global $conn;
    $insertBill = "INSERT INTO bill (user_id, name, email, phone, address, note, total, pay) VALUES ('$id', '$name', '$emails', '$phone', '$address', '$note', '$total', '$pay')";
    // Thực hiện truy vấn
    if (mysqli_query($conn, $insertBill)) {
        $last_id = mysqli_insert_id($conn);
        return $last_id;
    } else {
        return false;
    }
}

//Insert thông tin người mua lên cart
function insertCart($names, $image, $price, $quantity, $totals, $id_bill)
{
    global $conn;
    $insertCart = "INSERT INTO cart (name, image, price, quantity, total, id_bill) VALUES ('$names', '$image', '$price', '$quantity', '$totals', '$id_bill')";
    mysqli_query($conn, $insertCart);
}
