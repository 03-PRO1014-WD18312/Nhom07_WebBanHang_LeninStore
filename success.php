<?php
// Include necessary files and configurations
require_once 'view/globle/head.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve information from the checkout form
    $name = $_POST['name'];
    $address = $_POST['andress'];
    $phone = $_POST['phone'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    // You may want to perform additional validation and processing here

    // Display the success message
    echo "<div class='container mt-5'>";
    echo "<h2>Đặt Hàng Thành Công</h2>";
    echo "<p>Cảm ơn bạn, $name, đã đặt hàng!</p>";
    echo "<p>Thông tin đơn hàng:</p>";
    echo "<p>Sản phẩm: $productName</p>";
    echo "<p>Tổng tiền: $productPrice VND</p>";
    echo "<p>Địa chỉ giao hàng: $address</p>";
    echo "<p>Số điện thoại: $phone</p>";

    // You can include more details as needed

    // Add a link to return to the home page or other pages
    echo "<p><a href='index.php'>Quay lại trang chủ</a></p>";

    echo "</div>";
} else {
    // Redirect to the home page or display an error message if the form was not submitted correctly
    header("Location: index.php");
    exit();
}

// Include the footer
require_once 'view/globle/footer.php';
?>
