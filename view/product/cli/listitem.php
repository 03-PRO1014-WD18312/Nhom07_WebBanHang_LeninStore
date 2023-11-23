<?php
require_once 'view/globle/head.php';

?>



<div class="container">
        <div class="row justify-content-between" style="gap: 1.5rem; max-width: 200%;">
            <?php
            if (isset($products) && is_array($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="card col-3 p-0">
                      <img src="assets/imgs/item/<?php echo $product->image ?>" class="card-img-top" alt="product">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $product->name; ?></h5>
                        <p class="card-text m-0">Price: $<?php echo $product->price; ?></p>
                        <p class="card-text">Luot xem: <?php echo $product->luotxem; ?></p>
                      </div>
                    </div>
                    <?php
                }
            } else {
                echo "Trống";
            }
            ?>
        </div>
    </div>
<?php require_once 'view/globle/footer.php';
