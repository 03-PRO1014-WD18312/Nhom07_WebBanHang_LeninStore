<?php
// Include file head và các thư viện cần thiết
require_once 'view/globle/head.php';
// Handle remove and buy actions
if (isset($_POST['remove_product_id'])) {
    $removeProductId = $_POST['remove_product_id'];
    // Remove the product from the cart
    unset($_SESSION['cart'][$removeProductId]);
}

// Add your buy logic here if needed
// ...

// The rest of your code for displaying the cart

// Kiểm tra nếu session giỏ hàng chưa được khởi tạo, thì khởi tạo nó
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_img'];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (array_key_exists($productId, $_SESSION['cart'])) {
        // Nếu có, tăng số lượng lên 1
        $_SESSION['cart'][$productId]['quantity'] += 1;
    } else {
        // Nếu chưa, thêm sản phẩm vào giỏ hàng
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
body {
    font-family: 'Roboto', sans-serif;
    color: #333;
    background-color: #f8f9fa; /* Light gray background color */
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff; /* White background color for the cart container */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
}

h2 {
    color: #007BFF; /* Blue color for the heading */
}

.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #dee2e6;
    padding: 8px;
    text-align: left;
}

th {
    background-color: gray;
    color: #fff;
}

tbody tr:hover {
    background-color: #f5f5f5; /* Light gray background on hover */
}

.remove, .mua {
    display: inline-block;
    padding: 8px 16px;
    border: none;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

.remove {
    background-color: #DC3545;
    color: #fff;
}

.mua {
    background-color: #28A745;
    color: #fff;
}

.remove:hover, .mua:hover {
    background-color: #343A40;
}

.empty-cart {
    text-align: center;
    margin-top: 20px;
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $productId => $product) : ?>
                    <tr>
                        <td><img src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>" style="max-width: 50px;"></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?> VND</td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo $product['price'] * $product['quantity']; ?> $</td>
                        <td>
                        <form method="post" action="">
                               <input type="hidden" name="remove_product_id" value="<?php echo $productId; ?>">
                               <button type="submit" class="remove">Xóa</button>
                        </form>
                        </td>
                        <td>
                        <form method="post" action="checkout.php">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
                                <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
                                <button type="submit" class="button button5" name="buy_now">Mua ngay</button>
                            </form>
                        </td>


            
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
          
        </table>

        <!-- Các nút và chức năng khác có thể thêm ở đây -->

    <?php endif; ?>
</div>


<?php require_once 'view/globle/footer.php'; ?>
