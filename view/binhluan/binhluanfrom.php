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
    .binhluan table{
    width: 90%;
    margin-left: 5%;
    }
    .binhluan table td:nth-child(1){
        width: 50%;
    }
    .binhluan table td:nth-child(2){
        width: 20%;
    }
    .binhluan table td:nth-child(3){
        width: 30%;
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