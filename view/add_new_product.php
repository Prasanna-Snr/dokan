
<?php include "admin_navbar.php";?>
    <div class="admin-product-form-container">
        <h1 class="admin-product-form-header">Add New Product</h1>
        <form class="admin-product-form" action="../controller/add_product_controller.php" method="POST" enctype="multipart/form-data">
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Product Name:</label>
                <input type="text" name="name" class="admin-product-form-input" required>
            </div>
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Categories:</label>
                <select name="categories" class="admin-product-form-select" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="electronics">Electronics</option>
                    <option value="fashion">Fashion</option>
                    <option value="home">Home and Furniture</option>
                    <option value="beauty">Beauty and Personal Care</option>
                    <option value="drones">Drones</option>
                </select>
            </div>
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Product Image:</label>
                <input type="file" name="image" class="admin-product-form-input-file" accept="image/*" required>
            </div>
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Description:</label>
                <textarea name="description" class="admin-product-form-textarea" rows="4" required></textarea>
            </div>
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Price:</label>
                <input type="number" name="price" class="admin-product-form-input" min="0" required>
            </div>
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Offer:</label>
                <input type="text" name="offer" class="admin-product-form-input">
            </div>
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Discount (%):</label>
                <input type="number" name="discount" class="admin-product-form-input" min="0" max="100">
            </div>
            <div class="admin-product-form-group admin-product-form-buttons">
                <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Previous</button>
                <button type="reset" class="admin-product-form-button admin-product-form-clear">Clear</button>
                <button type="submit" class="admin-product-form-button admin-product-form-submit">Add New Product</button>
            </div>
        </form>
    </div>
</body>
</html>