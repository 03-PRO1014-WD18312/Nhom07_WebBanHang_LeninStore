<?php
session_start();
// Include các tệp và khởi tạo các controller
include 'controller/HomeController.php';
include 'controller/ProductController.php';
include 'controller/LoginController.php';
include 'controller/UserController.php';
$controller = $_GET['controller'] ?? 'home';

switch ($controller) {
    case 'login':
        $LoginController = new LoginController();
        $LoginController->index();
        break;
    case 'signup':
        $LoginController = new LoginController();
        $LoginController->signup();
        break;
    case 'dangXuat':
        $LoginController = new LoginController();
        $LoginController->logout();
        break;
    case 'home':
        $homeController = new HomeController();
        $homeController->index();
        break;
    case 'danhmuc':
        $productController = new ProductController();
        $productController->danhmuc();
        break;
    case 'hanghoa':
        $productController = new ProductController();
        $productController->sanpham();
        break;
    case 'khachang':
        $UserController = new UserController();
        $UserController->index();
        break;
    case 'logout':
        $LoginController = new LoginController();
        $LoginController->logout();
        break;
    case 'binhluan':
        $productController = new ProductController();
        $productController->binhluan();
        break;
    case 'sanPham_view':
        $SanPhamController = new ProductController();
        $SanPhamController->productDetail();
        break;
    case 'product':
        if (isset($_GET["act"])) {
            if ($_GET['act'] == 'add') {
                $productController = new ProductController();
                $productController->sanpham();
            }
            if ($_GET['act'] == 'delete') {
                $productController = new ProductController();
                $productController->sanpham();
            }
            if ($_GET['act'] == 'fix') {
                $productController = new ProductController();
                $productController->sanpham();
            }
            if ($_GET['act'] == 'item') {
                $productController = new ProductController();
                $productController->item();
            }
            if ($_GET['act'] == 'bl') {
                $productController = new ProductController();
                $productController->binhluan();
            }
        } else {
            $productController = new ProductController();
            $productController->index();
        }
        break;
    case 'login':
        if ($_GET['act'] == 'signup') {
            $LoginController = new LoginController();
            $LoginController->signup();
        } elseif ($_GET['act'] == 'signin') {
            $LoginController = new LoginController();
            $LoginController->login();
        }
        if (isset($_SESSION["role"])) {
            $UserController = new UserController();
            $UserController->index();
        } else {
            $LoginController = new LoginController();
            $LoginController->index();
        }
        break;
    default:
        // Xử lý controller không hợp lệ
        break;
}
