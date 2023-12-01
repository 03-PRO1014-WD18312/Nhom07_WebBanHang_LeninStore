<?php
// Include necessary files and configurations
require_once 'view/globle/head.php';
$servername = "localhost";
$username = "root";
$password = "";
$database = "duan12023";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy thông tin giỏ hàng của người dùng (user_id = 1)
    $query = $conn->prepare("SELECT * FROM giohang WHERE user_id = '1'");
    $query->execute();
    $cartItems = $query->fetchAll(PDO::FETCH_ASSOC);

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Retrieve product information from the form data
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];
        $productImage = $_POST['product_img'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Insert order information into the database using prepared statement
        $insertQuery = "INSERT INTO orders (product_id, product_name, product_price, product_img, name, address, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStatement = $conn->prepare($insertQuery);
        $insertStatement->execute([$productId, $productName, $productPrice, $productImage, $name, $address, $phone]);

        echo "<div class='container mt-5'>";
        echo "<h2>Đặt Hàng Thành Công</h2>";
        echo "<p>Sản phẩm: $productName</p>";
        echo "<p>Giá: $productPrice VND</p>";
        echo "<p><img src='assets/imgs/item/$productImage' alt='$productName' class='img-fluid'></p>";
        echo "<p>Tên: $name</p>";
        echo "<p>Địa chỉ: $address</p>";
        echo "<p>Số điện thoại: $phone</p>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Include the footer
require_once 'view/globle/footer.php';
?>
