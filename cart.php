<?php require_once 'view/globle/head.php'; ?>
<?php
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

    // Khởi tạo biến tổng tiền
    $totalPrice = 0;

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php if (!empty($cartItems)): ?>
    <form method="post" action="checkout.php">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Ngày Đặt</th>
                    <th>Chọn</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td>
                            <?php echo $item['product_name']; ?>
                        </td>
                        <td>
                            <?php echo $item['quantity']; ?>
                        </td>
                        <td>
                            <?php echo $item['product_price']; ?>
                        </td>
                        <td><img src="assets/imgs/item/<?php echo $item['product_img']; ?>" alt="lỗi khi tải ảnh"
                                style="width: 50px;"></td>
                        <td>
                            <?php echo $item['created_at']; ?>
                        </td>

                        <td>
                            <input type="checkbox" name="selected_products[]" value="<?php echo $item['product_id']; ?>"
                                data-price="<?php echo $item['product_price']; ?>"
                                data-quantity="<?php echo $item['quantity']; ?>">
                        </td>
                        <td>
                            <form method="post" action="deletecart.php">
                                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                                <button class="btn btn-danger" type="submit">Xoá</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    // Tính tổng tiền
                    $totalPrice += ($item['quantity'] * $item['product_price']);
                    ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Hiển thị tổng tiền -->
        <p>Tổng tiền: <span id="totalPrice">0</span> VND</p>

        <button type="submit" class="btn btn-success" name="buy_all">Mua </button>
        <a href="index.php?controller=product" class="btn btn-primary">Tiếp Tục Mua Hàng</a>
    </form>

    <script>
        // JavaScript function để cập nhật tổng tiền khi checkbox thay đổi
        function updateTotal() {
            var checkboxes = document.querySelectorAll('input[name="selected_products[]"]');
            var totalPrice = 0;

            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    // Lấy giá và số lượng từ data-* attributes
                    var price = parseFloat(checkbox.getAttribute('data-price'));
                    var quantity = parseInt(checkbox.getAttribute('data-quantity'));

                    // Cập nhật tổng tiền
                    totalPrice += price * quantity;
                }
            });

            // Hiển thị tổng tiền
            document.getElementById('totalPrice').innerText = totalPrice.toLocaleString('vi-VN');
        }

        // Lắng nghe sự kiện thay đổi của checkbox
        var checkboxes = document.querySelectorAll('input[name="selected_products[]"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', updateTotal);
        });
    </script>
<?php else: ?>
    <p>Giỏ hàng trống.</p>
    <form method="post" action="index.php">
        <button type="submit" class="btn btn-primary">Tiếp tục mua</button>
    </form>
<?php endif; ?>

<?php require_once 'view/globle/footer.php'; ?>