<?php
require_once 'view/globle/head.php';
?>
<!-- <link rel="stylesheet" href="view/product/cli/style2.css"> -->
<link rel="stylesheet" href="view/product/cli/style2.css">
<div class="row justify-content-between" style="gap: 1.5rem; max-width: 200%;">
  <?php
  if (is_array($products)) {
    foreach ($products as $product) {
      ?>
      <div class="card col-2 p-0 product-card" style="border-style: none;">
        <a href="index.php?controller=sanPham_view&id=<?php echo $product->id_pro; ?>"
          style="text-decoration: none; color: inherit;" class="product-link">
          <img src="assets/imgs/item/<?php echo $product->image ?>" class="card-img-top" alt="product">
          <div class="product-details">
              <a href="addtocart.php">
              <svg xmlns="http://www.w3.org/2000/svg" height="32" width="36" viewBox="0 0 576 512" class="svg-icon">
                <path fill="#000000"
                  d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z" />
              </svg>
              </a>
            <h5 class="card-title" style="color: #000000;font-size: 18px;font-weight: 500; text-align: center;">
              <?php echo $product->name; ?>
            </h5>
            <p class="card-text m-0">
              <?php echo $product->price; ?> VND
            </p>
            <p class="card-text">Lượt xem:
              <?php echo $product->luotxem; ?>
            </p>
          </div>
        </a>
      </div>
      <?php
    }
  } else {
    echo "Trống";
  }
  ?>
</div>

<?php require_once 'view/globle/footer.php';
