<?php
//insert tài khoản
function insert_taikhoan($user, $pass)
{
    $sql = "insert into tai_khoan (ten_tai_khoan,mat_khau) value ('$user','$pass')";
    pdo_execute($sql);
}

//check user
function check_user($user, $pass)
{
    $sql = "select * from tai_khoan where ten_tai_khoan = '$user' and mat_khau = '$pass'";
    $kq_ad = pdo_query_one($sql);
    return $kq_ad;
}



//update tài khoản
function update_taikhoan($id, $user, $pass)
{
    $sql = "update tai_khoan set ten_tai_khoan = '$user', mat_khau = '$pass' where id = $id";
    pdo_execute($sql);
}

//load all tài khoản
function loadall_taikhoan(){
    $sql = "select*from tai_khoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
//xóa tài khoản
function delete_taikhoan($id){
    $sql = "delete from tai_khoan where id = $id";
    pdo_execute($sql);
}
?>