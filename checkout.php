<?php
require_once 'view/globle/head.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "duan12023";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buy_all"])) {
        // Lấy danh sách sản phẩm đã chọn từ checkbox
        $selectedProducts = isset($_POST['selected_products']) ? $_POST['selected_products'] : [];

        if (!empty($selectedProducts)) {
            // Tạo danh sách placeholder "?" cho số lượng sản phẩm đã chọn
            $placeholders = implode(",", array_fill(0, count($selectedProducts), "?"));

            // Xây dựng câu truy vấn để lấy thông tin các sản phẩm đã chọn
            $query = $conn->prepare("SELECT * FROM giohang WHERE product_id IN ($placeholders)");
            $query->execute($selectedProducts);
            $selectedItems = $query->fetchAll(PDO::FETCH_ASSOC);

            // Hiển thị thông tin sản phẩm đã chọn và mẫu form để nhập thông tin đơn hàng
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Checkout</title>
            </head>
            <body>
                <h2>Thông tin đơn hàng</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Tên Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <!-- Thêm các cột khác tùy thuộc vào yêu cầu của bạn -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($selectedItems as $item) : ?>
                            <tr>
                                <td><?php echo $item['product_name']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['product_price']; ?></td>
                                <!-- Thêm các ô khác tùy thuộc vào yêu cầu của bạn -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h2>Thông tin khách hàng</h2>
                <form method="post" action="process_order.php">
                    <!-- Thêm các trường thông tin khách hàng bạn muốn nhập -->
                    <label for="customer_name">Tên khách hàng:</label>
                    <input type="text" id="customer_name" name="customer_name" required>

                    <label for="customer_email">Email:</label>
                    <input type="email" id="customer_email" name="customer_email" required>

                    <!-- Thêm các trường khác tùy thuộc vào yêu cầu của bạn -->

                    <input type="submit" name="place_order" value="Đặt hàng">
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "Không có sản phẩm nào được chọn!";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
