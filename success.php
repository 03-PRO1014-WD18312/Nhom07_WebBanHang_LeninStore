<?php
require_once 'view/globle/head.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_img'];

    // Display the success message

    echo "Đặt Hàng Thành Công";
    echo "<p>Cảm ơn bạn, $name, đã đặt hàng!</p>";
    echo "<p>THÔNG TIN ĐƠN HÀNG:</p>";
    echo "<p><img src='assets/imgs/item/$productImage' alt='$productName'></p>";
    echo "<p>Sản phẩm: $productName</p>";
    echo "<p>Giá sản phẩm: $productPrice VND</p>";
    echo "<p>Địa chỉ giao hàng: $address</p>";
    echo "<p>Số điện thoại: $phone</p>";
    echo "<p><a href='index.php'>Quay lại trang chủ</a></p>";

} else {
    header("Location: index.php");
    exit();
}
?>
<?php
require_once 'view/globle/footer.php';
?>