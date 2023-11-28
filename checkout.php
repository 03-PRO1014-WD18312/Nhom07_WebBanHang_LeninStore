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

h3 {
    color: red;
}

/* Style for paragraphs */
p {
    color: #555;
    margin: 10px 0;
}

/* Style for input fields */
input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

/* Style for the submit button */
input[type="submit"] {
    background-color: gray;
    color: #fff;
    cursor: pointer;
    padding: 10px;
    border: none;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background-color: black;
}

/* Style for images */
.img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    max-height: 150px; /* Adjust the maximum height as needed */
}


</style>
<?php
// Include necessary files and configurations
require_once 'view/globle/head.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_now'])) {
    // Retrieve product information from the form data
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_img'];

    // You may want to perform additional validation and processing here

    // Display the checkout information
    echo "<div class='container mt-5'>";
    echo "<h2>Thông Tin Đặt Hàng</h2>";
    echo "<p> $productName</p>";
    echo "<p> $productPrice VND</p>";
    echo "<p><img src='assets/imgs/item/$productImage' alt='$productName' class='img-fluid'></p>";
    echo "<p>Họ Tên: <input type='text' name='name' required></p>";
    echo "<p>Địa Chỉ Giao Hàng: <input type='text' name='andress'></p>";
    echo "<p>Số Điện Thoaị: <input type='phonenumber' name='phone'></p>";

    // You can include more fields for the checkout form as needed

    echo "<h3>Tổng tiền: $productPrice VND</h3>";
    echo "<form action='success.php' method='post'>";
    // ... (code để hiển thị thông tin đặt hàng)
    echo "<p><input type='submit' name='submit' value='MUA'></p>";
    echo "</form>";
    

    // Here you can integrate with a payment gateway or perform any other necessary actions
    // For simplicity, this example only displays the information.

    echo "</div>";
} else {
    // Redirect to the home page or display an error message if the form was not submitted correctly
    header("Location: index.php");
    exit();
}

// Include the footer
require_once 'view/globle/footer.php';
?>
