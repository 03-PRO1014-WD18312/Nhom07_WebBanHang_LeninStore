<?php require_once 'view/globle/head.php'; ?>

<style>
    /* Reset CSS */
    body, h1, p, img {
        margin: 0;
        padding: 0;
    }

    /* Container styling */
    .product-details-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Product details styling */
    .product-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .product-description {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .product-price, .product-views, .product-category {
        font-size: 14px;
        margin-bottom: 5px;
    }

    /* Add more styles as needed */
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
<div class="product-details-container">
    <h1 class="product-name"><?php echo $productName; ?></h1>
    <img class="product-image" src='assets/imgs/item/<?php echo $productImage; ?>' alt='<?php echo $productName; ?>'>
    <p class="product-description">Mô tả: <?php echo $productDescription; ?></p>
    <p class="product-price">Giá: <?php echo $productPrice; ?> $</p>
    <p class="product-views">Lượt xem: <?php echo $productLuotXem; ?></p>
    <p class="product-category">Danh mục: <?php echo $productCategory; ?></p>
</div>

<?php require_once 'view/globle/footer.php'; ?>
