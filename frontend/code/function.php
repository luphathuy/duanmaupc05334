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
    $query = "DELETE FROM contacts WHERE id = $id";
    mysqli_query($conn, $query);
}
//Lấy tất cả sản phẩm
function getAllProduct()
{
    global $conn;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
    p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.views as views, p.describe as `describe`, 
    c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy sản phẩm theo type (Loại trưng bày)
function getAllProductType()
{
    global $conn;
    $query = "SELECT p.id as id, p.product_name as product_name, p.product_price as product_price, 
    p.product_sale as product_sale, p.image as image, p.category as category, p.type as type, p.views as views, p.describe as `describe`, 
    c.id as id_cate, c.name as name_cate, t.id as id_type, t.name as name_type FROM category c, products p, type t WHERE c.id = p.category AND t.id = p.type AND p.type = '2'";
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
//Xóa sản phẩm
function deleteProductId($id)
{
    global $conn;
    $query = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $query);
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
    $query = "SELECT u.id as id, u.name as name, u.email as email, u.phone as phone, u.sex as sex, u.address as address, u.citizen_id as citizen_id, u.date_birth as date_birth, 
    u.image as image, u.facebook as facebook, u.tiktok as tiktok, u.role as role, u.create_at as create_at, r.id as id_role, r.name as name_role, s.id as id_sex, s.name as name_sex FROM users u, role r, sex s WHERE u.role = r.id AND u.sex = s.id";
    $getAllUser = mysqli_query($conn, $query);
    if ($getAllUser) {
        return $getAllUser->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy người dùng theo id
function getUserId($id)
{
    global $conn;
    $query = "SELECT u.id as id, u.name as name, u.email as email, u.phone as phone, u.sex as sex, u.address as address, u.citizen_id as citizen_id, u.date_birth as date_birth, 
    u.image as image, u.facebook as facebook, u.tiktok as tiktok, u.role as role, u.create_at as create_at, r.id as id_role, r.name as name_role, s.id as id_sex, s.name as name_sex FROM users u, role r, sex s WHERE u.role = r.id AND u.sex = s.id AND u.id = '$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}

//Lấy người dùng theo session
function getUserSession($user_id)
{
    global $conn;
    $query = "SELECT u.id as id, u.name as name, u.email as email, u.phone as phone, u.sex as sex, u.address as address, u.citizen_id as citizen_id, u.date_birth as date_birth, 
    u.image as image, u.facebook as facebook, u.tiktok as tiktok, u.role as role, u.create_at as create_at, r.id as id_role, r.name as name_role, s.id as id_sex, s.name as name_sex FROM users u, role r, sex s WHERE u.role = r.id AND u.sex = s.id AND u.id = '$user_id'";
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
//Lấy tất cả giới tính
function getAllSex()
{
    global $conn;
    $getAllSex = "SELECT id, name FROM sex";
    $sql = mysqli_query($conn, $getAllSex);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy tất cả role
function getAllRole()
{
    global $conn;
    $getAllRole = "SELECT id, name FROM role";
    $sql = mysqli_query($conn, $getAllRole);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
