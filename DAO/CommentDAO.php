<?php

include '../../modles/comment.php';
class CommentDAO
{
    private $PDO;
    public $bl = []; 
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->PDO = $pdo;
    }
    
    public function show($id_pro)
    {
        $sql = "SELECT * FROM `binhluan`";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $binhluan = array(); // hoặc $binhluan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng binhluan từ dữ liệu và thêm vào danh sách
            $binhluan = new comment($row['id_bl'], $row['noidung'], $row['iduser'], $row['idpro'], $row['ngaybinhluan']);
            array_push($this->bl, $binhluan);
        }

        return $this->bl;
    }
    public function add($id_pro, $text, $id_user, $day)
    {
        $sql = "INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES ('[$text]','[$id_user]','[$id_pro]','[$day]')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM `binhluan` WHERE  id_bl=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
