<?php
require_once 'view/globle/head.php';
require_once 'view/globle/slideshow.php';
?>

<h3 style="margin-left: 6%;">
    Products
</h3>

<div class="container">
        <div class="row">
            <?php
            if (isset($products) && is_array($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="card col p-0">
                      <img src="assets/imgs/item/<?php echo $product->image ?>" class="card-img-top" alt="...">
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
