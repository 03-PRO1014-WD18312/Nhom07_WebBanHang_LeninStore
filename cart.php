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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
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

        button {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #333;
        }

        .continue-shopping {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .continue-shopping:hover {
            background-color: #45a049;
        }

        p {
            color: #333;
            text-align: center;
        }

        .xoa {
            background-color: red;
        }

        .mua {
            background-color: green;
        }
    </style>
</head>
<body>
    <h2>Giỏ hàng</h2>

    <?php if (!empty($cartItems)) : ?>
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
                            <form method="post" action="deletecart.php">
                                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                                <button class="xoa" type="submit">Xoá</button>
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
        <form method="post" action="index.php">
            <button type="submit" class="continue-shopping">Tiếp tục mua</button>
        </form>
    <?php else : ?>
        <p>Giỏ hàng trống.</p>
        <form method="post" action="index.php">
            <button type="submit" class="continue-shopping">Tiếp tục mua</button>
        </form>
    <?php endif; ?>

    <?php require_once 'view/globle/footer.php'; ?>
</body>
</html>
