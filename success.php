<?php
// Include necessary files and configurations
require_once 'view/globle/head.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve user information from the form data
    // Kiểm tra và gán giá trị cho biến nếu phần tử tồn tại
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $productName = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $productPrice = isset($_POST['product_price']) ? $_POST['product_price'] : '';
    $productImage = isset($_POST['product_img']) ? $_POST['product_img'] : '';

    // Display the order confirmation information
    echo "<div class='container mt-5'>";
    echo "<h2>Đơn Hàng Đã Đặt Thành Công</h2>";
    echo "<p>Thông tin người đặt hàng:</p>";
    echo "<p>Họ Tên: $name</p>";
    echo "<p>Địa Chỉ Giao Hàng: $address</p>";
    echo "<p>Số Điện Thoại: $phone</p>";
    echo "<p>Thông tin sản phẩm:</p>";
    echo "<p>Sản phẩm: $productName</p>";
    echo "<p>Giá: $productPrice $</p>";
    echo "<p><img src='assets/imgs/item/$productImage' alt='$productName' class='img-fluid'></p>";
    echo "<p>Tổng tiền: $productPrice $</p>";
    echo "<p>Cảm ơn bạn đã mua hàng!</p>";
    echo "</div>";
} else {
    // Redirect to the home page or display an error message if the form was not submitted correctly
    header("Location: index.php");
    exit();
}

// Include the footer
require_once 'view/globle/footer.php';
?>
