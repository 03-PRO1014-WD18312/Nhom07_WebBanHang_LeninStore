<?php
include 'modles/Login.php';
class LoginDAO
{
    private $PDO;
    public function __construct()
    {
        require_once('config/PDO.php');
        $this->PDO = $pdo;
    }
    public function topProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->PDO->prepare($sql);
        // $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function Login($user, $pass)
    {
        $sql = "SELECT role FROM taikhoan WHERE email = :user AND pass = :pass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        $roles = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng Role từ dữ liệu và thêm vào danh sách roles
            $role = new Role($row['role']);
            $stringRepresentation = (string) $role;
            $roles[] = $role;
        }

        return $stringRepresentation;
    }
    public function signup($username, $email, $password)
    {
        try {
            echo($username);
            $sql = "SELECT * FROM `taikhoan` WHERE user = ?";
            $stmt = $this->PDO->prepare($sql);
            $stmt->execute([$email]);
            $current = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($current) {
                echo ("TON TAI");
            } else {
                // Thêm người dùng mới vào cơ sở dữ liệu
                $sql = "INSERT INTO taikhoan (user, email, pass) VALUES (:user, :email, :pass)";
                $stmt = $this->PDO->prepare($sql);
                $stmt->bindParam(':user', $username, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
                $stmt->execute();

                // Chuyển hướng sau khi đăng ký thành công
                header("Location: index.php?controller=login&act=signin");
                exit();
            }

        } catch (PDOException $e) {
            // Xử lý ngoại lệ (ví dụ: ghi log lỗi)
            echo "Đã xảy ra lỗi: " . $e->getMessage();
        }
    }

}