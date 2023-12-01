<?php
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

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h2 {
        color: #333;
        text-align: center;
        padding: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 50px;
        max-height: 50px;
    }

    form {
        display: inline-block;
        margin-right: 5px;
    }

    button, .continue-shopping {
        background-color: #555;
        color: #fff;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover, .continue-shopping:hover {
        background-color: #333;
    }

    .xoa {
        background-color: red;
    }

    .mua {
        background-color: green;
    }

    p {
        color: #333;
        text-align: center;
    }

    /* Checkbox styling */
    .checkbox-label {
        display: flex;
        align-items: center;
    }

    .checkbox-label input {
        margin-right: 5px;
    }
</style>

<h2>Giỏ hàng</h2>

<?php if (!empty($cartItems)) : ?>
    <form method="post" action="">
        <table>
            <thead>
                <tr>
                    <th> Tên Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Ngày Đặt</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item) : ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['product_price']; ?></td>
                        <td><img src="<?php echo $item['product_img']; ?>" alt="lỗi khi tải ảnh" style="width: 50px;"></td>
                        <td><?php echo $item['created_at']; ?></td>
                        <td>
                            <input type="checkbox" name="selected_products[]" value="<?php echo $item['product_id']; ?>">
                        </td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                                <button class="xoa" type="submit">Xoá</button>
                                <?php
                                    // ... your existing delete logic
                                ?>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="checkout.php">
                                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $item['product_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $item['product_price']; ?>">
                                <input type="hidden" name="product_img" value="<?php echo $item['product_img']; ?>">
                                <button type="submit" class="mua" name="buy_now">Mua ngay</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="mua" name="buy_all">Mua Tất Cả</button>
        <a href="index.php?controller=product" class="nav-link">Tiếp Tục Mua Hàng</a>
    </form>

<?php else : ?>
    <p>Giỏ hàng trống.</p>
    <a href="index.php?controller=product" class="nav-link">Mua Hàng</a>
<?php endif; ?>

<?php require_once 'view/globle/footer.php'; ?>
