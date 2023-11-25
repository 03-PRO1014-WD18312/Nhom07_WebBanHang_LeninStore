<?php
require_once 'view/globle/headadmin.php';
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI User</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" placeholder="nhập vào mã loại">
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai" placeholder="nhập vào tên">
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" value="THÊM MỚI">
                <input class="mr20" type="reset" value="NHẬP LẠI">
            </div>
        </form>
        <button onclick="show()">Danh Sách</button>
    </div>
    <div class="row2" id="table" style="display: none">
        <div class="row2 font_title">
            <h1>DANH SÁCH <?php  ?></h1>
        </div>
        <div class="row2 form_content ">
            <form action="#" method="POST">
                <div class="row2 mb10 formds_loai">
                    
                </div>
                <div class="row mb10 ">
                    <input class="mr20" type="button" value="CHỌN TẤT CẢ" onclick="selectAll()">
                    <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" onclick="deselectAll()">
                    <input class="mr20" type="button" value="XOÁ TẤT CẢ" onclick="deselectAll()">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    function show() {
        document.getElementById("table").style.display = "block";
    }

    function selectAll() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = true;
        });
    }

    // Hàm để bỏ chọn tất cả các ô checkbox
    function deselectAll() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    }
</script>