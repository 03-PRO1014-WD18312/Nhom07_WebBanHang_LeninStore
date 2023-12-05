<?php
include 'modles/Login.php';
class LoginDAO
{
    protected $PDO;

    public function __construct()
    {   
        global $pdo;
        require_once('config/PDO.php');
        $this->PDO = $pdo;
    }

    public function topProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Login($username, $password)
    {
        $sql = "SELECT `id_ac`, `user`, `anh`, `role`, `trang_thai` FROM `taikhoan` WHERE `email` = :username AND `pass` = :password";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    
        $userData = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Thêm dữ liệu người dùng vào mảng
            $userData = $row;
        }
    
        // Xác định quyền (role) của người dùng từ dữ liệu
        if(count($userData) > 0){
            $userRole = $userData['role'];

        }
        return $userRole ?? null;
    }
    

    public function signup($email, $password)
    {
        $sql = "INSERT INTO `taikhoan`(`email`, `pass`) VALUES (:email, :password)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        if ($stmt->execute()) {
            // Nếu thêm thành công, gán session
            $_SESSION['username'] = $email;
            $_SESSION['password'] = $password;
        }
    }
}
