<?php
require_once 'view/globle/head.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .button {
        background-color: #04AA6D;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button4 {
        background-color: rgba(209, 213, 219, 1);
        /* Thay đổi màu xám */
        color: black;
        /* Màu chữ đen */
    }

    .button5 {
        background-color: #555555;
    }

    /* Black */

</style>

<!-- Đoạn mã PHP hiển thị thông tin sản phẩm -->
<?php
$productId = $product->getIdPro();
$productName = $product->name;
$productPrice = $product->price;
$productImage = $product->image;
$productDescription = $product->chitiet;
$productLuotXem = $product->luotxem;
$productCategory = $product->danhmuc;
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src='assets/imgs/item/<?php echo $productImage; ?>' alt='<?php echo $productName; ?>'>
        </div>

        <div class="col-md-6">
            <h1 class="font-semibold text-4xl pb-4 leading-9">
                <?php echo $productName; ?>
            </h1>
            <p class="h4">
                <?php echo $productPrice; ?> VND
            </p>
            <p class="lead">
                <?php echo nl2br($productDescription); ?>
            </p>

            <p>Lượt xem:
                <?php echo $productLuotXem; ?>
            </p>
            <p>Danh mục:
                <?php echo $productCategory; ?>
            </p>

            <!-- Nút Thêm vào giỏ hàng -->
            <form method="post" action="">
            <?php
                $servername = "localhost";
$username = "root";
$password = "";
$database = "duan12023";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
        $productId = $_POST["product_id"];
        $productName = $_POST["product_name"];
        $productPrice = $_POST["product_price"];
        $productImage = $_POST["product_img"];
        $quantity = 1; // You can get this from the form if needed

        // Use prepared statement to prevent SQL injection
        $query = $conn->prepare("INSERT INTO giohang (product_id, user_id, quantity, product_name, product_price, product_img) VALUES (:productId, '1', :quantity, :productName, :productPrice, :productImage)");
        $query->bindParam(':productId', $productId);
        $query->bindParam(':quantity', $quantity);
        $query->bindParam(':productName', $productName);
        $query->bindParam(':productPrice', $productPrice);
        $query->bindParam(':productImage', $productImage);

        $result = $query->execute();

        // Display a message based on the result
        if ($result) {
            echo "Sản phẩm đã được thêm vào giỏ hàng!<br>";
        } else {
            echo "Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng!";
        }
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
                <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
                <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
                <button type="submit" class="button button4" name="add_to_cart">Thêm vào giỏ hàng</button>
  
            </form>

            <!-- Nút Mua ngay -->
            <form method="post" action="checkout.php">
                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
                <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
                <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
                <button type="submit" class="button button5" name="buy_now">Mua ngay</button>
            </form>

        </div>

    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    echo "<p class='confirmation-message'>Sản phẩm đã được thêm vào giỏ hàng!</p>";
}
?>

<?php require_once 'view/globle/footer.php'; ?>
