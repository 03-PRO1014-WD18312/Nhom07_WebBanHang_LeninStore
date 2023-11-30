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
        $sql = "SELECT `id_ac`, `user`, `anh`, `id_quyen`, `trang_thai` FROM `taikhoan` WHERE `email` = :username AND `pass` = :password";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng Login từ dữ liệu và thêm vào danh sách userData
            $user = new Login($row['id_ac'], $row['user'], $row['pass'], $row['name'], $row['email'], $row['address'], $row['tel'], $row['role']);
            $userData[] = $user;
        }

        return $userData;
    }

    public function signup($name, $email, $password)
    {
        $sql = "INSERT INTO `taikhoan`(`email`, `pass`, `user`) VALUES (:email, :password, :name)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Nếu thêm thành công, gán session
            $_SESSION['username'] = $email;
            $_SESSION['password'] = $password;
        }
    }
}
