<?php
// require_once './google-api/vendor/autoload.php';
// $gClient = new Google_Client();
// $gClient->setClientId("875671012990-a2mj09j8gk1i2ecgag07vbvkmddk6ljj.apps.googleusercontent.com");
// $gClient->setClientSecret("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");
// $gClient->setApplicationName("Vicode Media Login");
// $gClient->setRedirectUri("http://localhost/gwine/index.php");
// $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// $login_url = $gClient->createAuthUrl();

$conn = mysqli_connect('localhost', 'root', 'mysql', 'gwine');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>