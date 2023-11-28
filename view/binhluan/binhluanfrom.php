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
    /* Styles for a flex container with space-between alignment */
    .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        background-color: #f0f0f0; /* Add a background color for better separation */
        padding: 10px; /* Add some padding for better spacing */
    }

    /* Styles for the comments section */
    .binhluan {
        flex: 1;
        margin-right: 10px;
        border: 1px solid #ccc; /* Add a border around the comments section */
       
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