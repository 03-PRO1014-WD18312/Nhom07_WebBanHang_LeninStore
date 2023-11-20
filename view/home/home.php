<?php
require_once 'view/globle/head.php';
require_once 'view/globle/slideshow.php';
?>

<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="bg-square"></div>
    <!-- template section start -->
    <div class="template_section layout_padding">
        <div class="container">
            <h1 class="solution_text">GIFTS THAT MOVE YOU</h1>
            <div class="carousel-inner d-flex">
                <?php
                if (isset($productTop3) && is_array($productTop3)) {
                    foreach ($productTop3 as $productTop3) {
                        ?>
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col">
                                    <div class="image_5"><img src="assets/imgs/item/<?php echo $productTop3["img"] ?>" ></div>
                                    <h3 class="cool_text">
                                        <?php echo $productTop3["mota"]; ?>
                                    </h3>
                                </div>
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
    </div>
    <!-- template section end -->
     <!-- design section start -->
     <div class="design_section layout_padding">
      <div class="container">
        <h1 class="solution_text" style="text-align: left;">Trending now</h1>
      </div>
    </div>
    <!-- design section end -->
    <div class="container">
        <div class="row">
            <?php
            if (isset($products) && is_array($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="col">
                        <div class="image_5"><img src="assets/imgs/item/<?php echo $product->image ?>" ></div>
      
                        <h3>
                            <?php echo $product->name; ?>
                        </h3>
                        <p>Price: $
                            <?php echo $product->price; ?>
                        </p>
                        <p>Luot xem:
                            <?php echo $product->luotxem; ?>
                        </p>
                    </div>
                    <?php
                }
            } else {
                echo "Trống";
            }
            ?>
        </div>
    </div>
</section>

<?php require_once 'view/globle/footer.php'; ?>