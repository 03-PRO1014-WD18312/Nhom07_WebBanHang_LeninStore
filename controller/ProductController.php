<?php
class ProductController
{
    public function index()
    {
        
        if (isset($_COOKIE["role"])) {
            if ($_COOKIE['role'] == 1) {

                include('view/home/homeAdmin.php');
            } else {
                $ProductDAO = new ProductDAO();
                $product = $ProductDAO->sharelist($_GET['product']);
                $danhmucs = $ProductDAO->showDanhMuc();
                include 'view/product/cli/listitem.php';
            }
        } else {
            $ProductDAO = new ProductDAO();
            $products = $ProductDAO->sharelist($_GET['product']?? null);
            $danhmucs = $ProductDAO->showDanhMuc();
            include 'view/product/cli/listitem.php';
        }
        
    }

    public function danhmuc()
    {
        
        $ProductDAO = new ProductDAO();
        if (isset($_POST['tenloai']) && $_POST['tenloai'] != '') {

            $ProductDAO->addDM($_POST['tenloai']);
        }
        if (isset($_POST['id']) && $_POST['id'] != '') {

            $ProductDAO->deleteDM($_POST['id']);
        }
        if (isset($_POST['xoa']) && $_POST['xoa'] != '') {
            $ProductDAO->deleteallDM($_POST['xoa']);
        }
        if (isset($_POST['tenmoi']) && $_POST['tenmoi'] != '') {
            $ProductDAO->updateDM($_POST['id_l'], $_POST['tenmoi']);
        } else {
            $danhmucs = $ProductDAO->showDanhMuc();
        }
        include('view/product/admin/classitemadmin.php');
    }
    public function sanpham()
    {
        if($_COOKIE['role'] != 1){
            $ProductDAO = new ProductDAO();
            $products = $ProductDAO->Select();
            $danhmucs = $ProductDAO->showDanhMuc();
            include('view/home/home.php');
        }
        $ProductDAO = new ProductDAO();
        if (isset($_POST['add']) && $_POST['add'] != '') {
            $ProductDAO->addPRO($_POST['tensanpam'], $_POST['gia'], $_FILES['img'], $_POST['mota'], $_POST['iddm']);
        }
        if (isset($_POST['id_x']) && $_POST['id_x'] != '') {
            $ProductDAO->deletePRO($_POST['id_x']);
        }
        if (isset($_POST['fix']) && $_POST['fix'] != '') {
            $ProductDAO->updatePRO($_POST['idsp'], $_POST['tensanpam'], $_POST['gia'], $_FILES['img'], $_POST['mota'], $_POST['iddm']);
        }
        if (isset($_POST['xoa']) && $_POST['xoa'] != '') {
            $ProductDAO->deleteallPRO($_POST['xoa']);
        }
        $danhmucs = $ProductDAO->showDanhMuc();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $counts = $ProductDAO->countProducts();
        $sanphams = $ProductDAO->showPRO($page, 5);
        include('view/product/admin/iteam.php');
        
    }
    public function binhluan()
    {
        include('view/home/homeAdmin.php');
    }
}
