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

    /* Style for input fields */
    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    /* Style for the submit button */
    button {
        background-color: gray;
        color: #fff;
        cursor: pointer;
        padding: 10px;
        border: none;
        border-radius: 5px;
        width: 100%;
    }

    button:hover {
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

    // Display the checkout information
    echo "<div class='container mt-5'>";
    echo "<h2>Thông Tin Đặt Hàng</h2>";
    echo "<p>$productName</p>";
    echo "<p>$productPrice VND</p>";
    echo "<p><img src='assets/imgs/item/$productImage' alt='$productName' class='img-fluid'></p>";
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
    echo "</div>";
} else {
    // Redirect to the home page or display an error message if the form was not submitted correctly
    header("Location: index.php");
    exit();
}


// Include the footer
require_once 'view/globle/footer.php';
?>
