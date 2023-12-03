<?php require_once 'view/globle/head.php'; ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "duan12023";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buy_all"])) {
        // Get the selected product IDs
        $selectedProducts = isset($_POST['selected_products']) ? $_POST['selected_products'] : [];

        if (!empty($selectedProducts)) {
            // Fetch selected products from the database
            $placeholders = implode(",", array_fill(0, count($selectedProducts), "?"));
            $query = $conn->prepare("SELECT * FROM giohang WHERE product_id IN ($placeholders)");
            $query->execute($selectedProducts);
            $selectedItems = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Không có sản phẩm nào được chọn!";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php if (!empty($selectedItems)) : ?>
            <h2>Thông tin đơn hàng</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($selectedItems as $item) : ?>
                        <tr>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><img src="assets/imgs/item/<?php echo $item['product_img']; ?>" alt="lỗi khi tải ảnh"
                                    style="width: 50px;"></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['product_price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Thông tin khách hàng</h2>
            <form method="post" action="success.php">
                <div class="form-group">
                    <label for="name">Tên khách hàng:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="address">Địa Chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="phone">SĐT:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>

                <input type="hidden" name="selected_products" value="<?php echo implode(',', $selectedProducts); ?>">

                <button type="submit" class="btn btn-primary" name="submit">Đặt hàng</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and Popper.js (order matters) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php require_once 'view/globle/footer.php'; ?>
</body>

</html>
