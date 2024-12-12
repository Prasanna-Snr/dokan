
<?php include "admin_navbar.php";?>
    <div class="admin-product-form-container">
        <h1 class="admin-product-form-header">Add Categories</h1>
        <form class="admin-product-form" action="../controller/categories_controller.php" method="POST">
    <div class="admin-product-form-group">
        <label class="admin-product-form-label">Categories Name:</label>
        <input type="text" name="c_name" id="c_name" class="admin-product-form-input" >
    </div>
    
    <div class="admin-product-form-group admin-product-form-buttons">
        <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Back</button>
        <button type="reset" class="admin-product-form-button admin-product-form-clear">Clear</button>
        <button type="submit" class="admin-product-form-button admin-product-form-submit" name="submit">Add New Categories</button>
    </div>
</form>


    </div>
</body>
</html>
