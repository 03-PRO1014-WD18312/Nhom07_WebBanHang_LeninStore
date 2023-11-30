<?php
require_once 'view/globle/head.php';

// Handle remove action
if (isset($_POST['remove_product_id'])) {
    $removeProductId = $_POST['remove_product_id'];
    // Remove the product from the cart
    if (isset($_SESSION['cart'][$removeProductId])) {
        unset($_SESSION['cart'][$removeProductId]);
    }
}

// Handle add to cart action
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_img'];

    // Initialize or retrieve the cart session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product already exists in the cart
    if (array_key_exists($productId, $_SESSION['cart'])) {
        // If exists, increase the quantity
        $_SESSION['cart'][$productId]['quantity'] += 1;
    } else {
        // If not, add the product to the cart
        $_SESSION['cart'][$productId] = array(
            'name' => $productName,
            'price' => $productPrice,
            'img' => $productImage,
            'quantity' => 1
        );
    }
}

// Hiển thị nội dung trang giỏ hàng
?>
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .mt-5 {
        margin-top: 5rem;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f8f9fa;
    }

    tbody tr:hover {
        background-color: #f5f5f5;
    }

    .remove, .mua {
        background-color: #d9534f;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        margin-right: 5px;
        border-radius: 4px;
    }

    .remove:hover, .mua:hover {
        background-color: #c9302c;
    }

    .remove {
        background-color: #d9534f;
    }

    .mua {
        background-color: #5bc0de;
    }

    .remove:hover {
        background-color: #c9302c;
    }

    .mua:hover {
        background-color: #4cae4c;
    }
</style>


<!-- Giao diện trang giỏ hàng -->
<!-- Giao diện trang giỏ hàng -->
<div class="container mt-5">
    <h2>Giỏ hàng</h2>

    <?php if (empty($_SESSION['cart'])) : ?>
        <p>Giỏ hàng của bạn trống.</p>
    <?php else : ?>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $productId => $product): ?>
                    <tr>
                        <td><img src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>" style="max-width: 50px;"></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?> $</td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo $product['price'] * $product['quantity']; ?> $</td>
                        <form action="">
<!-- Inside the foreach loop where you display cart items -->
<form method="post" action="">
    <input type="hidden" name="remove_product_id" value="<?php echo $productId; ?>">
    <button type="submit" class="remove">Xóa</button>
</form>
<form method="post" action="checkout.php">
    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
    <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
    <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
    <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
    <button type="submit" class="button button5" name="buy_now">Mua ngay</button>
</form>
            </form>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
          
        </table>
    <?php endif; ?>
</div>

<?php require_once 'view/globle/footer.php'; ?>