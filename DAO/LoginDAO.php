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
            $stringRepresentation = (string)$role;
            $roles[] = $role;
        }

        return $stringRepresentation;
    }
    function signup($user, $pass, $email, $role)
    {
        
    }
}
