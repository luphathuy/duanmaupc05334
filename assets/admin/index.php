<?php
session_start();
$message = array();
@include '../config/config.php';
include "../code/function.php";
include './includes/nav.php';
if (isset($_GET['pages'])) {
  $pages = $_GET['pages'];
} else {
  $pages = 'home';
}
switch ($pages) {
  case 'home':
    include './dist/home.php';
    break;
  case 'account':
    switch ($_GET['action']) {
      case 'login':
        include './dist/pages/account/login.php';
        break;
      case 'passwordreset':
        include './dist/pages/account/passwordreset.php';
        break;
      case 'forgot':
        include './dist/pages/account/forgot.php';
        break;
      case 'register':
        include './dist/pages/account/register.php';
        break;
      default:
        break;
    }
    break;
  case 'users':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/users/list.php';
        break;
      case 'add':
        include './dist/pages/users/add.php';
        break;
      case 'edit':
        include './dist/pages/users/edit.php';
        break;
      default:
        break;
    }
    break;
  case 'products':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/products/list.php';
        break;
      case 'add':
        include './dist/pages/products/add.php';
        break;
      case 'edit':
        include './dist/pages/products/edit.php';
        break;
      default:
        break;
    }
    break;
  case 'order':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/order/list.php';
        break;
      case 'detail':
        include './dist/pages/order/detail.php';
        break;
      case 'edit':
        include './dist/pages/order/edit.php';
        break;
      default:
        break;
    }
    break;
  case 'category':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/category/list.php';
        break;
      case 'add':
        include './dist/pages/category/add.php';
        break;
      case 'edit':
        include './dist/pages/category/edit.php';
        break;
      case 'views':
        include './dist/pages/category/views.php';
        break;
      default:
        break;
    }
    break;
  case 'comments':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/comments/list.php';
        break;
      case 'view':
        include './dist/pages/comments/view.php';
        break;
      default:
        break;
    }
    break;
  case 'contacts':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/contacts/list.php';
        break;
      default:
        break;
    }
    break;
  case 'views':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/views/list.php';
        break;
      default:
        break;
    }
    break;
  case 'type':
    switch ($_GET['action']) {
      case 'list':
        include './dist/pages/type/list.php';
        break;
      default:
        break;
    }
    break;
  default:
    include './dist/home.php';
    break;
}
include './includes/footer.php';
