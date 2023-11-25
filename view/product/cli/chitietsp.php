<?php require_once 'view/globle/head.php'; ?>
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
      <button class="button button4" onclick="addToCart()">Thêm vào giỏ hàng</button>

      <!-- Nút Mua ngay -->
      <button class="button button5" onclick="buyNow()">Mua ngay</button>
    </div>
  </div>
</div>


<script>
  // Hàm xử lý khi nhấp vào nút "Thêm vào giỏ hàng"
  function addToCart() {
    alert('Đã thêm vào giỏ hàng!');
    // Thêm logic xử lý thêm sản phẩm vào giỏ hàng ở đây nếu cần
  }

  // Hàm xử lý khi nhấp vào nút "Mua ngay"
  function buyNow() {
    alert('Đã mua ngay!');
    // Thêm logic xử lý mua ngay ở đây nếu cần
  }
</script>

<?php require_once 'view/globle/footer.php'; ?>