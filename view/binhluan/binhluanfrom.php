<?php

session_start();

include '../../DAO/CommentDAO.php';

 $idpro=$_REQUEST['idpro'];

 $comment = new CommentDao();

 $dsbl= $comment->show($idpro);    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/..style.css">
    <style>
    .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .binhluan {
        flex: 1;
        margin-right: 10px;
    }
    .binhluan table {
        width: 100%;
    }
    .binhluan table td:nth-child(1) {
        width: 50%;
    }
    .binhluan table td:nth-child(2) {
        width: 20%;
    }
    .binhluan table td:nth-child(3) {
        width: 30%;
    }
    .binhluanfrom {
        flex: 1;
        margin-left: 10px;
    }
    .binhluanfrom input[type="text"] {
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .binhluanfrom input[type="submit"] {
        padding: 5px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>

<div class="row mb demo">
    <div class="boxtitle">BÌNH LUẬN</div>
    <div class="boxcontent2 backgroud_content menudoc binhluan">
        <ul>
    <table>
            <?php
            foreach ($dsbl as $bl) {
                echo '<tr><td>' . $bl->text . ' </td>';
                echo '<td>' . $bl->name_user . ' </td>';
                echo '<td>' . $bl->day . ' </td></tr>';
                
            }
            ?>
    </table>
        </ul>
    </div>
    <div class="boxfooter searbox binhluanfrom">
        
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            
            <input type="text" name="noidung">
            <input type="submit" name="guibinhluan" value="Gửi bình luận">
        </form>
    </div>

    <?php
    if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
        $noidung=$_POST['noidung'];
        $idpro=$_POST['idpro'];
        $iduser=$iduser=$_SESSION['user']['id'];
        $ngaybinhluan=date('h:i:sa d/m/Y');
     $comment->add($noidung,$iduser,$idpro,$ngaybinhluan);
     header("location: ".$_SERVER['HTTP_REFERER']);
    }
    ?>

</div>

</body>
</html>