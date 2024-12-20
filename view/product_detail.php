<?php 
include "../view/customer_navbar.php";
include "../model/dbcon.php"; 
include "../model/product_model.php"; 

if (isset($_GET['id'])) {
    $product_id = ($_GET['id']); 
    
    $obj = new ProductCrudImpl();
    $result = $obj->getById($product_id);
    $details = mysqli_fetch_assoc($result); 
}
?>
<!-- items container  -->
<div class="full-container">
    <div class="left-img-section">
        <div class="big-img-container">
            <img src="<?= $details['image_path'] ?>" alt="">
        </div>

        <div class="small-img-row">
            <div class="small-img-container">
                <img src="<?= $details['image_path'] ?>" alt="">  
            </div>

            <div class="small-img-container">
                <img src="<?= $details['image_path'] ?>" alt="">
            </div>

            <div class="small-img-container">
                <img src="<?= $details['image_path'] ?>" alt="">
            </div>

            <div class="small-img-container">
                <img src="<?= $details['image_path'] ?>" alt="">
            </div>
        </div>
    </div>

    <div class="right-content-section">
        <p id="big-text"><?= $details['name'] ?></p>
        <div class="price-quality-container">
            <div class="price-container">
                <p>PRICE:</p>
                <p id="price">Rs. <?= $details['price'] ?></p>
            </div>

            <div class="quality-container">
                <p>QUALITY:</p>
                <input type="number" id="quality" value="1">
            </div>
        </div>
        <form action="../controller/cart_controller.php" method="POST">
        <button type="submit" name="add_to_cart" class="detail-add-to-cart">Add to cart</button>
        <input type="hidden" name="product_name" value="<?=($details['name']) ?>">
        <input type="hidden" name="price" value="<?= $details['price'] ?>">
        <input type="hidden" name="image" value="<?=($details['image_path']) ?>">
        </form>

        <div class="details-container">
            <p id="details-title">Product Details</p>
            <p id="details-content"><?= $details['description'] ?></p>
        </div>
    </div>
</div>

<!-- footer -->
<?php include "customer_footer.php"; ?>
</body>
</html>
