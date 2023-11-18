<?php
//insert Sản phẩm
function insert_sanpham($tensp,$price,$img_name,$mota,$iddm){
    $sql = "insert into san_pham (ten_san_pham,gia,img,mota,id_danh_muc) value ('$tensp','$price','$img_name','$mota','$iddm')";
    pdo_execute($sql);
}

//delete Sản phẩm
function delete_sanpham($id){
    $sql = "delete from san_pham where id = $id";
    pdo_execute($sql);
}

//
function loadallsp(){
    $sql = "select*from san_pham order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

//Lọc sản phẩm
function loc_sanpham($sreach,$iddm){
    $sql = "select*from san_pham where 1";
    if($sreach!=""){
        $sql.=" and ten_san_pham like '%".$sreach."%'";
    }
    if($iddm>0){
        $sql.=" and id_danh_muc = $iddm";
    }
    $sql.=" order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

//load 1 Sản phẩm
function load_onesp($id){
    $sql = "select * from san_pham where id = $id";
    $dmsp = pdo_query_one($sql);
    return $dmsp;
}

//load tên danh mục sp 
function load_ten_dmsp($iddm){
    if($iddm>0){
        $sql = "select * from danh_muc where id = $iddm";
        $dmsp = pdo_query_one($sql);
        extract($dmsp);
        return $name;
    }else{
        return "";
    }
   
}


//load sản phẩm cùng loại
function load_onesp_cungloai($id,$iddm){
    $sql = "select * from san_pham where id_danh_muc=$iddm and id <> $id";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

//update Sản phẩm
function update_sanpham($idsp,$tensp,$price,$img_name,$mota,$iddm) {
        if($img_name!=""){
            $sql = "update san_pham set ten_san_pham = '$tensp', gia = $price,img='$img_name',mota='$mota',id_danh_muc=$iddm where id = $idsp";
        }else{
            $sql = "update san_pham set ten_san_pham = '$tensp', gia = $price,mota='$mota',id_danh_muc=$iddm where id = $idsp";
        }
    pdo_execute($sql);
}

//load all sản phẩm cho trang chủ
function loadallsp_content(){
    $sql = "select*from san_pham where 1 order by id desc limit 0,9";
    $sp_trangchu = pdo_query($sql);
    return $sp_trangchu;
}

//Top 10 lượt xem 
function top5_luotxem(){
    $sql = "select*from san_pham where 1 order by luotxem desc limit 0,5";
    $top5_luotxem = pdo_query($sql);
    return $top5_luotxem;
}
?>