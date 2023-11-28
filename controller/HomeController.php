<?php
include 'DAO/ProductDAO.php';

class HomeController
{
    public function index()
    {
        if (isset($_COOKIE["role"])) {

            if ($_COOKIE['role'] ) {
                include('view/home/homeAdmin.php');
            } else {
                $ProductDAO = new ProductDAO();
                $products = $ProductDAO->SelectItem($_POST['search']);
                $danhmucs = $ProductDAO->showDanhMuc();
                $productTop3 = $ProductDAO->slideShow();
                include('view/home/home.php');
                
                if (isset($_POST['search']) && $_POST['search'] != "") {
                    $ProductDAO = new ProductDAO();
                    $products = $ProductDAO->SelectItem($_POST['search']);
                    $danhmucs = $ProductDAO->showDanhMuc();
                    $productTop3 = $ProductDAO->slideShow();
                    include('view/home/home.php');
                } else {
                    $ProductDAO = new ProductDAO();
                    $products = $ProductDAO->Select();
                    $danhmucs = $ProductDAO->showDanhMuc();
                    $productTop3 = $ProductDAO->slideShow();
                    include('view/home/home.php');
                }
            }
        } else {

            if (isset($_POST['search']) && $_POST['search'] != "") {
                $ProductDAO = new ProductDAO();
                $products = $ProductDAO->SelectItem($_POST['search']);
                $danhmucs = $ProductDAO->showDanhMuc();
                $productTop3 = $ProductDAO->slideShow();
                include('view/home/home.php');
            } else {
                $ProductDAO = new ProductDAO();
                $products = $ProductDAO->Select();
                $danhmucs = $ProductDAO->showDanhMuc();
                $productTop3 = $ProductDAO->slideShow();
                include('view/home/home.php');
            }
        }
    }
    public function ao()
    {
    }
    public function quan()
    {
    }   
}
