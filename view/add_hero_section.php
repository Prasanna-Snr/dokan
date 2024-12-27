<?php 
include "admin_navbar.php";
// if (!isset($_SESSION['admin_login'])) {
//     header("Location: login_admin.php");
// }
?>
    <div class="admin-product-form-container">
        <h1 class="admin-product-form-header">Add Hero Section</h1>
        <form class="admin-product-form" action="../controller/hero_section_controller.php" method="POST" enctype="multipart/form-data">

    <div class="admin-product-form-group">
        <label class="admin-product-form-label">Main title:</label>
        <input type="text" name="m_title" id="m_title" class="admin-product-form-input" >
        <span></span>
    </div>
    <div class="admin-product-form-group">
        <label class="admin-product-form-label">Description:</label>
        <textarea name="description" id="description" class="admin-product-form-textarea" rows="4"></textarea>
    </div>

    <div class="admin-product-form-group">
        <label class="admin-product-form-label">Image:</label>
        <input type="file" name="image" id="image" class="admin-product-form-input-file" accept="image/*">
    </div>
    
    <div class="admin-product-form-group admin-product-form-buttons">
        <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Back</button>
        <button type="reset" class="admin-product-form-button admin-product-form-clear">Clear</button>
        <button type="submit" id="submit" class="admin-product-form-button admin-product-form-submit" name="submit">Add New Categories</button>
    </div>
</form>
    </div>

</body>
</html>
