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

?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

<!-- Cart display -->
<div class="container mt-5">
    <h2>Giỏ hàng</h2>

    <?php if (empty($_SESSION['cart'])) : ?>
        <p class="empty-cart">Giỏ hàng của bạn trống.</p>
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
                <?php foreach ($_SESSION['cart'] as $productId => $product) : ?>
                    <tr>
                    <td><img src="assets/imgs/item/<?php echo $product['img']; ?>" alt="
                    <?php echo $product['name']; ?>" style="max-width: 50px"></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?> VND</td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo $product['price'] * $product['quantity']; ?> $</td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="remove_product_id" value="<?php echo $productId; ?>">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                            <form method="post" action="checkout.php">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
                                <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
                                <button type="submit" class="btn btn-success" name="buy_now">Mua ngay</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once 'view/globle/footer.php'; ?>
