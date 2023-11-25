<?php
include 'DAO/LoginDAO.php';
class LoginController
{
    public function index()
    {
        if (isset($_COOKIE["rank"])) {
            include('view/home/home.php');
        } else {
            include('view/login/login.php');
        }
    }
    public function login()
    {

        $username = $_POST['email'];
        $password = $_POST['pass'];
        

        $loginDAO = new LoginDAO();
        $userInfo = $loginDAO->login($username, $password);

        if ($userInfo) {
            // Lấy vai trò (role) từ dữ liệu người dùng

            $role = $userInfo;
            //print_r($role);

            // // Thiết lập cookie cho vai trò (role)
            setcookie("role", $role, time() + 3600, "/");

            // Chuyển hướng sau khi đăng nhập thành công
            header("Location: index.php?controller=home");
            exit();
        } else {
            // Đăng nhập thất bại, xử lý lỗi ở đây (ví dụ: thông báo lỗi)
            echo "Đăng nhập thất bại.";
        }
    }

    public function signup($user, $password, $email, $role) {
        // Kiểm tra xem tên đăng nhập đã tồn tại chưa5
        $checkExistQuery = "SELECT * FROM taikhoan WHERE user = '$user'";
        $result = $this->conn->query($checkExistQuery);

        if ($result->num_rows > 0) {
            // Tên đăng nhập đã tồn tại
            return false;
        } else {
            // Thêm thông tin tài khoản vào CSDL
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO taikhoan (user, pass, email, role) VALUES ('$user', '$hashedPassword', '$email', '$role')";
            
            if ($this->conn->query($insertQuery) === TRUE) {
                // Đăng ký thành công
                return true;
            } else {
                // Đăng ký thất bại
                echo "Lỗi khi thêm tài khoản: " . $this->conn->error;
                return false;
            }
        }

    }
    public function logout()
    {
        setcookie("role", "", time() + 3600, "/");
        header("Location: index.php?controller=home");
    }
}