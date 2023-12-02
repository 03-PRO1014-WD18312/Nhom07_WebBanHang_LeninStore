<?php
include_once 'view/globle/head.php';
?>

<div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_now'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_img'];



    echo "<p>$productName</p>";
    echo "<p>$productPrice VND</p>";
    echo "<p><img src='assets/imgs/item/$productImage' alt='$productName'></p>";
    echo "<form action='success.php' method='post'>";
    echo "<input type='hidden' name='product_id' value='$productId'>";
    echo "<input type='hidden' name='product_name' value='$productName'>";
    echo "<input type='hidden' name='product_price' value='$productPrice'>";
    echo "<input type='hidden' name='product_img' value='$productImage'>";
    echo "<p>Họ Tên: <input type='text' name='name' required></p>";
    echo "<p>Địa Chỉ Giao Hàng: <input type='text' name='address'></p>";
    echo "<p>Số Điện Thoại: <input type='tel' name='phone'></p>";
    echo "<h3>Tổng tiền: $productPrice VND</h3>";
    echo "<p><button type='submit' name='submit'>MUA</button></p>";
    echo "</form>";

} else {
    // Redirect to the home page or display an error message if the form was not submitted correctly
    header("Location: index.php");
    exit();
}
?>
</div>
<?php
require_once 'view/globle/footer.php';
?>