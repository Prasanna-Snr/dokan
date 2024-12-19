<?php 
include "../view/customer_navbar.php";
include "../model/dbcon.php"; 
include "../model/product_model.php"; 

$productObj = new ProductCrudImpl();
$products = $productObj->getAllProduct(); 
$offer = new ProductCrudImpl();
$offerProduct = $offer->getOfferProduct();

?>

<!-- hero -->
<div class="hero-container">
    <div class="hero-content">
        <p id="big-text">
            Lorem, ipsum dolor sit amet consectetur adipisicing.
        </p>

        <p id="small-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. saepe nemo voluptate, corrupti, ratione nobis
            quo dignissimos ipsam facilis culpa, ea dolorem. Doloribus ex nisi accusantium non neque repellat in
            nostrum nihil perspiciatis itaque, a tempore! Nihil, voluptate. Lorem ipsum dolor sit amet consectetur
            adipisicing elit.
        </p>

        <a href="">
            <div class="btn-container">
                <div class="btn">
                    <span>Explore more</span>
                </div>
            </div>
        </a>

    </div>
    <div class="hero-image">
        <img src="/dokan/images/img2.png" alt="">
    </div>
</div>

<!-- new arrivals -->
<div class="new-arrivals-container">
    <p id="big-text">New Arrivals</p>
    <div class="item-container">
        <div class="small-item">
            <div class="small-item-container">
                <?php 
                    $count=0;
                    while ($product = mysqli_fetch_assoc($products)) {
                        if($count>=4){
                            break;
                        }
                        $count++;
                ?>
                <div class="items">
                    <form action="../controller/cart_controller.php" method="POST">
                        <a href="product_detail.php?id=<?= $product['id'] ?>" class="img-container"
                            style="position: relative;">
                            <div class="new">NEW</div>
                            <img src="<?= $product['image_path'] ?>" alt="">
                        </a>
                        <p id="title">
                            <?=($product['name']) ?>
                        </p>
                        <div class="price-container">
                            <p id="price">Rs.
                                <?=($product['price'])?>
                            </p>
                            <button type="submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                        </div>
                        <input type="hidden" name="product_name" value="<?=($product['name']) ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="image" value="<?=($product['image_path']) ?>">
                    </form>
                </div>
                <?php 
                }
            ?>
            </div>


        </div>
        <div class="big-item">
            <img src="../images/img7.png" alt="Explore More">
            <a href="product_list.php" class="bit-imgage-floating">Explore More</a>
        </div>
    </div>
</div>

<hr class="custom-line">

<!-- offer  -->
<div class="offer-container">
    <p id="big-text">Special Offers</p>
    <div class="item-container">
        <div class="small-item">
            <div class="small-item-container">
            <?php 
            $offerCount = 0;
            while ($offerItem = mysqli_fetch_assoc($offerProduct)) {
            ?>
            <div class="items">
                <a href="product_detail.php?id=<?= $offerItem['id'] ?>" class="img-container">
                    <div class="sale">
                        <?= $offerItem['offer'] ?>% off
                    </div>
                    <img src="<?= $offerItem['image_path'] ?>" alt="<?= $offerItem['name'] ?>">
                </a>
                <p id="title">
                    <?= $offerItem['name'] ?>
                </p>
                <div class="price-container">
                    <p id="price">
                       Rs. <?=$offerItem['price']?>
                    </p>
                    <form action="../controller/cart_controller.php" method="POST">
                        <button type="submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                        <input type="hidden" name="product_name" value="<?= $offerItem['name'] ?>">
                        <input type="hidden" name="price" value="<?= $offerItem['price'] ?>">
                        <input type="hidden" name="image" value="<?= $offerItem['image_path'] ?>">
                    </form>
                </div>
            </div>
            <?php 
            }
            ?>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php 
    include "../view/customer_footer.php";
?>
</body>

</html>