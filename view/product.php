<?php 
include "../view/customer_navbar.php";
include "../model/dbcon.php"; 
include "../model/product_model.php"; 

$obj = new ProductCrudImpl();
$highPrice = $obj->highPriceProduct();
$lowPrice = $obj->lowPriceProduct();
 ?>

    <div class="product-main-container">
        <!-- first product -->
        <p id="first-product">Premium priced item</p>
        <!-- high cost  -->
        <div class="first-product-row">
        <?php foreach ($highPrice as $highPriceItem) { ?>
            <div class="items">
            <form action="../controller/cart_controller.php" method="POST">
                    <a href="product_detail.php?id=<?= $highPriceItem['id'] ?>" class="img-container">
                    <img src="<?= $highPriceItem['image_path'] ?>" alt="">
                    </a>
                    <p id="title"><?php echo $highPriceItem['name']; ?></p>
                <div class="price-container">
                <p id="price">Rs.<?php echo $highPriceItem['price']; ?></p>
                <button type="submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                </div>
                <input type="hidden" name="product_name" value="<?=($highPriceItem['name']) ?>">
                        <input type="hidden" name="price" value="<?= $highPriceItem['price'] ?>">
                        <input type="hidden" name="image" value="<?=($highPriceItem['image_path']) ?>">
                        <input type="hidden" name="product_id" value="<?=($highPriceItem['id']) ?>">
                </form>
            </div>
            <?php } ?>
        </div>

        <p id="first-product">Most affordable choice</p>


        <!-- low cost -->
        <div class="first-product-row">
        <?php foreach ($lowPrice as $lowPriceItem) { ?>
            <div class="items">
            <form action="../controller/cart_controller.php" method="POST">
                    <a href="product_detail.php?id=<?= $lowPriceItem['id'] ?>" class="img-container">
                    <img src="<?= $lowPriceItem['image_path'] ?>" alt="">
                    </a>
                    <p id="title"><?php echo $lowPriceItem['name']; ?></p>
                <div class="price-container">
                <p id="price">Rs.<?php echo $lowPriceItem['price']; ?></p>
                <button type="submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                </div>
                <input type="hidden" name="product_name" value="<?=($lowPriceItem['name']) ?>">
                        <input type="hidden" name="price" value="<?= $lowPriceItem['price'] ?>">
                        <input type="hidden" name="image" value="<?=($lowPriceItem['image_path']) ?>">
                        <input type="hidden" name="product_id" value="<?=($lowPriceItem['id']) ?>">
                </form>
            </div>
            <?php } ?>
        </div>


        <!-- footer -->
        <?php include "customer_footer.php";?>
</body>

</html>