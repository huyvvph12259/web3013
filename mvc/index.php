<?php
session_start();
require_once './config/helpers.php';
require_once './vendor/autoload.php';
require_once './config/db.php';

use App\Controllers\HomeController;
use App\Controllers\CartController;
use App\Controllers\ProductController;
use App\Controllers\LoginController;

// Đọc về eloquent model
// https://laravel.com/docs/8.x/eloquent#retrieving-single-models

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'login':
        $ctr = new LoginController();
        $ctr->loginForm();
        break;
    case 'post-login':
        $ctr = new LoginController();
        $ctr->postLogin();
        break;
    case 'logout':
        $ctr = new LoginController();
        $ctr->logout();
        break;
    case 'remove-cate':
        $ctr = new HomeController();
        $ctr->remove();
        break;
    case 'add-cate':
        $ctr = new HomeController();
        $ctr->addForm();
        break;
    case 'edit-cate':
        $ctr = new HomeController();
        $ctr->editForm();
        break;
    case 'save-add-cate':
        $ctr = new HomeController();
        $ctr->saveAddCate();
        break;
    case 'save-edit-cate':
        $ctr = new HomeController();
        $ctr->saveEditCate();
        break;
    case 'api/search-cate':
        $ctr = new HomeController();
        $ctr->searchCate();
        break;
    case 'san-pham':
        // hiển thị danh sách sản phẩm
        $ctr = new ProductController();
        $ctr->index();
        break;
    case 'gio-hang':
        $ctr = new CartController();
        $ctr->index();
        break;
    default:
        # code...
        break;
}

?>