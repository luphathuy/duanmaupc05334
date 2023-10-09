<?php
$conn = mysqli_connect('localhost', 'root', 'mysql', 'gwine');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>