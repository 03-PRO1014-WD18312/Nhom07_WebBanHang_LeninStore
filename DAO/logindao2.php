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

    public function Login($user, $pass)
    {
        $sql = "SELECT role FROM taikhoan WHERE email = :user AND pass = :pass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $data = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create an associative array with 'id_u' and 'role' keys
            $userData = new Login($row['id_ac'], $row['user'], $row['id_quyen'], $row['trang_thai']);
            // Add the user data to the data array
            $data[] = $userData;
        }

        return $data; // Return an array containing 'id_u' and 'role'
    }
    // lệnh tạo mới tài khoản trên data base
    public function signup($user, $email, $password)
    {
        $sql = "INSERT INTO `taikhoan`(`email`, `mat_khau`, `user`) VALUES ('$email','$password','$user')";
        $stmt = $this->PDO->prepare($sql);
        if ($stmt->execute()) {
            $_SESSION['username'] = $email;
            $_SESSION['password'] = $password;
        }
    }

}
