<?php
session_start();
$message = array();
$mess = array();
$err = array();
$cart = array();
require_once './assets/config/config.php';
include './assets/code/function.php';
include './assets/product/dist/includes/nav.php';

if (isset($_GET['pages'])) {
  $pages = $_GET['pages'];
} else {
  $pages = 'home';
}
switch ($pages) {
  case 'home':
    include './assets/product/dist/home.php';
    break;
  case 'service':
    include './assets/product/dist/assets/service/service.php';
    break;
  case 'introduce':
    include './assets/product/dist/assets/introduce/introduce.php';
    break;
  case 'contact':
    include './assets/product/dist/assets/contact/contact.php';
    break;
  case 'cart':
    switch ($_GET['action']) {
      case 'cart':
        include './assets/product/dist/assets/cart/cart.php';
        break;
      case 'pay':
        include './assets/product/dist/assets/cart/pay.php';
        break;
      case 'bill':
        include './assets/product/dist/assets/cart/bill.php';
        break;
      default:
        break;
    }
    break;
  case 'account':
    switch ($_GET['action']) {
      case 'login':
        include './assets/product/dist/assets/account/login.php';
        break;
      case 'passwordreset':
        include './assets/product/dist/assets/account/passwordreset.php';
        break;
      case 'forgot':
        include './assets/product/dist/assets/account/forgot.php';
        break;
      case 'register':
        include './assets/product/dist/assets/account/register.php';
        break;
      default:
        break;
    }
    break;
  case 'products':
    switch ($_GET['action']) {
      case 'list':
        include './assets/product/dist/assets/products/list.php';
        break;
      case 'list_category':
        include './assets/product/dist/assets/products/list_category.php';
        break;
      case 'detail':
        include './assets/product/dist/assets/products/detail.php';
        break;
      default:
        break;
    }
    break;
  case 'profile':
    switch ($_GET['action']) {
      case 'file':
        include './assets/product/dist/assets/profile/file.php';
        break;
      case 'file_person':
        include './assets/product/dist/assets/profile/file_person.php';
        break;
      case 'edit_file':
        include './assets/product/dist/assets/profile/edit_file.php';
        break;
      case 'comment_his':
        include './assets/product/dist/assets/profile/comment_his.php';
        break;
      case 'contact_his':
        include './assets/product/dist/assets/profile/contact_his.php';
        break;
      case 'order_his':
        include './assets/product/dist/assets/profile/order_his.php';
        break;
      case 'vieworder':
        include './assets/product/dist/assets/profile/vieworder.php';
        break;
      default:
        break;
    }
    break;
  default:
    include './assets/product/dist/home.php';
    break;
}
include './assets/product/dist/includes/footer.php';
