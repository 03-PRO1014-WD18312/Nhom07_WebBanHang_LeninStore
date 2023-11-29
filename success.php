<style>
    /* Add some basic styles for the container */
    .container {
        padding-top: 30px;
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Style for headings */
    h2 {
        margin-top: 30px;
        text-align: center;
        color: #333;
    }

    /* Style for paragraphs */
    p {
        color: #555;
        margin: 10px 0;
    }

    /* Style for images */
    .img-fluid {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        max-height: 150px; /* Adjust the maximum height as needed */
    }

    /* Style for the link */
    a {
        display: block;
        margin-top: 15px;
        text-align: center;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<?php
// Include necessary files and configurations
require_once 'view/globle/head.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve information from the checkout form if the keys are set
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_img'];

    // Display the success message
    echo "<div class='container mt-5'>";
    echo "<h2>Đặt Hàng Thành Công</h2>";
    echo "<p>Cảm ơn bạn, $name, đã đặt hàng!</p>";
    echo "<p>THÔNG TIN ĐƠN HÀNG:</p>";
    echo "<p><img src='assets/imgs/item/$productImage' alt='$productName' class='img-fluid'></p>";
    echo "<p>Sản phẩm: $productName</p>";
    echo "<p>Giá sản phẩm: $productPrice VND</p>";
    echo "<p>Địa chỉ giao hàng: $address</p>";
    echo "<p>Số điện thoại: $phone</p>";
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
