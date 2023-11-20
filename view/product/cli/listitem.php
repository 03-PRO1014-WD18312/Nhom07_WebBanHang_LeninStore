<?php
require_once 'view/globle/head.php';
require_once 'view/globle/slideshow.php';
?>

<h3 style="margin-left: 6%;"><?php echo $_GET['product'] ?></h3>
<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="bg-square"></div>
    <div class="container">
        <div class="items d-flex">
            <?php
            if (isset($products) && is_array($products)) {
                foreach ($products as $product) {
            ?>
                    <div class="item">
                        <img src="assets/imgs/item/<?php echo $product->image; ?>" alt="image">
                        <h3><?php echo $product->name; ?></h3>
                        <p>Price: $<?php echo $product->price; ?></p>
                        <p>Luot xem: <?php echo $product->luotxem; ?></p>
                    </div>
            <?php
                }
            } else {
                echo "Trống";
            }
            ?>
        </div>
</section>
<?php require_once 'view/globle/footer.php';
