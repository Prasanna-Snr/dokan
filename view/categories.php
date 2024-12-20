<?php
include "customer_navbar.php";
include "../model/dbcon.php"; 
include "../model/categories_model.php"; 

$list = new categoryCrudImpl();
$category = $list->getAllCategories();

// Get the selected category from the URL and first category if none is selected
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : $category[0];

$items = [];
if ($selectedCategory) {
    $items = $list->getItemsByCategory($selectedCategory);
}
?>

<!-- body container -->
<div class="body-container">
    <div class="categories-section">
        <div class="categories-list">
            <p id="heading-category">CATEGORIES</p>
            <hr class="custom-line">
            <ul>
                <?php
                foreach ($category as $categories) {
                    $activeClass = ($categories == $selectedCategory) ? 'class="active"' : '';
                    echo "<li><a href='?category={$categories}' {$activeClass}>{$categories}</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="image-section">
        <div class="item-container">
            <?php foreach ($items as $item) { ?>
                <div class="items">
                    <form action="../controller/cart_controller.php" method="POST">
                    <a href="product_detail.php?id=<?= $item['id'] ?>" class="img-container">
                    <img src="<?= $item['image_path'] ?>" alt="">
                    </a>
                    <p id="title"><?php echo $item['name']; ?></p>
                    <div class="price-container">
                        <p id="price">Rs.<?php echo $item['price']; ?></p>
                        <button type="submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                    </div>
                        <input type="hidden" name="product_name" value="<?=($item['name']) ?>">
                        <input type="hidden" name="price" value="<?= $item['price'] ?>">
                        <input type="hidden" name="image" value="<?=($item['image_path']) ?>">
                        <input type="hidden" name="product_id" value="<?=($item['id']) ?>">
                </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- footer -->
<?php include "customer_footer.php";?>
</body>
</html>
