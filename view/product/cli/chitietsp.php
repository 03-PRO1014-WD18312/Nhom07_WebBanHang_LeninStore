<?php
  
 require_once 'view/globle/head.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
  .button {
    background-color: #04AA6D;
    /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }



  .button4 {
    background-color: rgba(209, 213, 219, 1);
    /* Thay đổi màu xám */
    color: black;
    /* Màu chữ đen */
  }

  .button5 {
    background-color: #555555;
  }

  /* Black */
  
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

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <img class="img-fluid" src='assets/imgs/item/<?php echo $productImage; ?>' alt='<?php echo $productName; ?>'>
    </div>
    
    <div class="col-md-6">
      <h1 class="font-semibold text-4xl pb-4 leading-9">
        <?php echo $productName; ?>
      </h1>
      <p class="h4">
        <?php echo $productPrice; ?> $
      </p>
      <p class="lead">
        <?php echo nl2br($productDescription); ?>
      </p>

      <p>Lượt xem:
        <?php echo $productLuotXem; ?>
      </p>
      <p>Danh mục:
        <?php echo $productCategory; ?>
      </p>

      <!-- Nút Thêm vào giỏ hàng -->
<!-- Nút Thêm vào giỏ hàng -->
<!-- Nút Thêm vào giỏ hàng -->
<form method="post" action="cart.php">
    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
    <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
    <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
    <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
    <button type="submit" class="button button4" name="add_to_cart">Thêm vào giỏ hàng</button>
</form>

<!-- Nút Mua ngay -->
<form method="post" action="checkout.php">
    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
    <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
    <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
    <input type="hidden" name="product_img" value="<?php echo $productImage; ?>">
    <button type="submit" class="button button5" name="buy_now">Mua ngay</button>
</form>

    </div>
    
  </div>
</div>


<?php require_once 'view/globle/footer.php'; ?>