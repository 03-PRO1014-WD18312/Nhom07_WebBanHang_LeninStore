<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Shopping Cart</title>
</head>
<body>

    <div class="cart">
        <h2>CART</h2>

        <?php
       
        $products = [
            ['name' => 'MUSHROOM BRAVE TEE', 'price' => 450.00, 'image' => 'ao1.jpg'],
            ['name' => 'RIPPED KNEE JEANS', 'price' => 650.00, 'image' => 'quan1.jpg'],
        ];

    
        foreach ($products as $product) {
            echo '<div class="cart-item">';
            echo '<img src="../upload/' . $product['image'] . '" alt="' . $product['name'] . '">';
            echo '<div class="item-details">';
            echo '<h3>' . $product['name'] . '</h3>';
            echo '<p>$' . number_format($product['price'], 2) . '</p>';
            echo '<input type="number" value="1" min="1">';
            echo '<button class="remove-btn">Remove</button>';
            echo '</div></div>';
        }
        ?>

        <div class="cart-total">
            <?php

            $total = array_sum(array_column($products, 'price'));
            echo '<p>Tạm Tính: $' . number_format($total, 2) . '</p>';
            echo '<p>Phí Vận Chuyển: $0.00</p>';
            echo '<p>Tổng: $' . number_format($total, 2) . '</p>';
            ?>
            <form action="checkout.php" method="post">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" required></textarea><br>

                <button type="submit" class="checkout-btn">Thanh Toán</button>
            </form>
        </div>
    </div>
    <script src="js.js"></script>
</body>
</html>
