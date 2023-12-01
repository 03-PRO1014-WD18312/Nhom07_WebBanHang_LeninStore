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
                $product = $ProductDAO->sharelist($_GET['product'], $_POST['search'] ?? null);
                $danhmucs = $ProductDAO->showDanhMuc();
                include 'view/product/cli/listitem.php';
            }
        } else {
            $ProductDAO = new ProductDAO();
            $products = $ProductDAO->sharelist($_GET['product']?? null, $_POST['search'] ?? null);
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
        
            $ProductDAO = new ProductDAO();
            $products = $ProductDAO->Select();
            $danhmucs = $ProductDAO->showDanhMuc();
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
        // if (isset($_SESSION["role"])) {
        //     if ($_SESSION["role"] == 1) {
        //         $commentDAO = new CommentDAO();
        //         $count = $commentDAO->count();
        //         include('view/binhluan/binhluan.php');
        //     } else {
        //         $ProductDAO = new ProductDAO();
        //         $commentDAO = new CommentDAO();
        //         $timestamp = $commentDAO->get_time_present();
        //         $commentDAO->add($_POST['id_pro'], $_POST['bl'], $_SESSION['acc'], $_POST['time']);
        //         $sanpham = $ProductDAO->SelectOneItem($_POST['id_pro']);
        //         $products = $ProductDAO->lq($_POST['iddm']);
        //         $comments =  $commentDAO->show($_POST['id_pro']);
        //         $danhmucs = $ProductDAO->showDanhMuc();
        //         include('view/product/cli/item.php');
        //     }
        // } else {
        //     include('view/login/login.php');
        // }
    }
    public function productDetail()
    {
        // Kiểm tra quyền người dùng
        if (isset($_COOKIE["role"]) && $_COOKIE['role'] == 1) {
            include('view/home/homeAdmin.php');
            exit;
        }
    
        $ProductDAO = new ProductDAO();
    
        // Kiểm tra xem có tham số id trên URL không
        $productId = isset($_GET['id']) ? intval($_GET['id']) : null;
    
        try {
            // Kiểm tra xem id hợp lệ hay không
            if ($productId === null || $productId <= 0) {
                throw new Exception("ID sản phẩm không hợp lệ");
            }
    
            // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            $product = $ProductDAO->showOne($productId);
    
            // Kiểm tra xem sản phẩm có tồn tại không
            if ($product === null) {
                throw new Exception("Sản phẩm không tồn tại");
            }
    
            // Hiển thị trang chi tiết sản phẩm
            include 'view/product/cli/chitietsp.php';
            exit;
        } catch (Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
            // Log lỗi hoặc xử lý nó theo cách phù hợp với ứng dụng của bạn.
            exit;
        }
    }
    

    
}
