<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$message = array();
$mess = array();
$err = array();
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
  case 'service':
    include './product/dist/assets/service/service.php';
    break;
  case 'introduce':
    include './product/dist/assets/introduce/introduce.php';
    break;
  case 'contact':
    include './product/dist/assets/contact/contact.php';
    break;
  case 'cart':
    switch ($_GET['action']) {
      case 'cart':
        include './product/dist/assets/cart/cart.php';
        break;
      case 'pay':
        include './product/dist/assets/cart/pay.php';
        break;
      case 'bill':
        include './product/dist/assets/cart/bill.php';
        break;
      default:
        break;
    }
    break;
  case 'account':
    switch ($_GET['action']) {
      case 'login':
        include './product/dist/assets/account/login.php';
        break;
      case 'passwordreset':
        include './product/dist/assets/account/passwordreset.php';
        break;
      case 'forgot':
        include './product/dist/assets/account/forgot.php';
        break;
      case 'register':
        include './product/dist/assets/account/register.php';
        break;
      default:
        break;
    }
    break;
  case 'products':
    switch ($_GET['action']) {
      case 'list':
        include './product/dist/assets/products/list.php';
        break;
      case 'list_category':
        include './product/dist/assets/products/list_category.php';
        break;
      case 'detail':
        include './product/dist/assets/products/detail.php';
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
