<?php
session_start();
$message = array();
@include './config/config.php';
include './code/function.php';
include './product/dist/includes/nav.php';

if (isset($_GET['pages'])) {
  $pages = $_GET['pages'];
} else {
  $pages = 'home';
}
switch ($pages) {
  case 'home':
    include './product/dist/home.php';
    break;
  case 'products':
    switch ($_GET['action']) {
      case 'list':
        include './product/dist/assets/products/list.php';
        break;
      default:
        break;
    }
    break;
  case 'profile':
    switch ($_GET['action']) {
      case 'file':
        include './product/dist/assets/profile/file.php';
        break;
      case 'edit_file':
        include './product/dist/assets/profile/edit_file.php';
        break;
      default:
        break;
    }
    break;
  default:
      include './product/dist/home.php';
    break;
}
include './product/dist/includes/footer.php';
?>