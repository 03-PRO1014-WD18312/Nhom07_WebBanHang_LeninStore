<?php
require_once 'view/globle/head.php';
require_once 'view/globle/slideshow.php';
?>

<div class="product-tabs section-padding">
    <div class="bg-square"></div>
    <!-- template section start -->
    <div class="template_section layout_padding">
        <div class="container">
            <h1 class="solution_text">GIFTS THAT MOVE YOU</h1>
            <div class="carousel-inner d-flex" style="gap: 1.5rem;">
                <?php
                if (isset($productTop3) && is_array($productTop3)) {
                    foreach ($productTop3 as $productTop3) {
                        ?>
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col">
                                    <div class="image_5"><img src="assets/imgs/item/<?php echo $productTop3["img"] ?>"></div>
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
        <div class="row" style="gap: 2.0rem;">
            <?php
            if (isset($products) && is_array($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="card col p-0">
                        <img src="assets/imgs/item/<?php echo $product->image ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $product->name; ?>
                            </h5>
                            <p class="card-text m-0">Price: $
                                <?php echo $product->price; ?>
                            </p>
                            <p class="card-text">Luot xem:
                                <?php echo $product->luotxem; ?>
                            </p>
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

<?php require_once 'view/globle/footer.php'; ?>