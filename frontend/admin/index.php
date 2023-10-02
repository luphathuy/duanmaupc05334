<?php
session_start();
$message = array();
@include '../config/config.php';
include "../code/function.php";
include './includes/nav.php';

if(empty($_SESSION['id'])){
  header('Location: ./dist/pages/account/login.php');
}

if (isset($_GET['pages'])) {
  $pages = $_GET['pages'];
} else {
  $pages = 'home';
}
switch ($pages) {
  case 'home':
    include './dist/home.php';
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
        include '';
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
?>