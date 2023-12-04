<?php
include 'DAO/LoginDAO.php';


class LoginController
{
    public function index()
    {

        // if (isset($_COOKIE["rank"])) {
        //     include('view/home/home.php');
        // } else {
        //     include('view/login/login.php');
        // }
    }
    public function login()
    {
        include('view/login/login.php');
    }
    public function doLogin()
    {
        $username = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        
        $loginDAO = new LoginDAO();
        $userInfo = $loginDAO->login($username, $password);
        var_dump($userInfo);
        if ($userInfo) {
            // Lấy vai trò (role) từ dữ liệu người dùng

            $role = $userInfo;
            // print_r($role);

            // // Thiết lập cookie cho vai trò (role)
            setcookie("role", $role, time() + 3600, "/");

            // Chuyển hướng sau khi đăng nhập thành công
            header("Location: index.php?controller=home");
            exit();
        } else {
            // Đăng nhập thất bại, xử lý lỗi ở đây (ví dụ: thông báo lỗi)
            header("Location: index.php?controller=home");
        }
    }
    public function signup()
    {
        include('view/login/signup.php');
    }
    public function doSignup()
    {
        if (isset($_SESSION['username'])) {
            var_dump(1);
            header("Location: index.php?controller=login");
        } else {
            if (isset($_SESSION['role'])) {
                var_dump(2);
                header("Location: index.php?controller=login");
            } else {
                if (isset($_POST['email'])) {
                    var_dump(3);
                    $LoginDAO = new LoginDAO();
                    $LoginDAO->signup($_POST['email'], $_POST['password']);
                    header("Location: index.php?controller=login");
                } else {
                    header("Location: index.php?controller=login&act=signup");
                }
            }
        }
    }
    public function logout()
    {
        $_SESSION = array();

        // Delete the session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }

        // Destroy the session
        session_destroy();

        // Clear any additional cookies you may have set
        // Replace 'cookie_name' with the name of your cookie
        setcookie('role', '', time() - 3600, '/');

        // Redirect to the login page or any other desired page after logout
        header('Location: index.php?controller=login&act=login');
        exit();
    }
}