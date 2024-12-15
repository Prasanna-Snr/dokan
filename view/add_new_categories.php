
<?php include "admin_navbar.php";?>
    <div class="admin-product-form-container">
        <h1 class="admin-product-form-header">Add Categories</h1>
        <form class="admin-product-form" action="../controller/categories_controller.php" method="POST">
    <div class="admin-product-form-group">
        <label class="admin-product-form-label">Categories Name:</label>
        <input type="text" name="c_name" id="c_name" class="admin-product-form-input" >
        <span></span>
    </div>
    
    <div class="admin-product-form-group admin-product-form-buttons">
        <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Back</button>
        <button type="reset" class="admin-product-form-button admin-product-form-clear">Clear</button>
        <button type="submit" id="submit" class="admin-product-form-button admin-product-form-submit" name="submit">Add New Categories</button>
    </div>
</form>
    </div>
    
    <script>
  document.getElementById("submit").addEventListener("click", function (event) {
    if (!checkData()) {
        event.preventDefault(); 
    }
});

    var category = document.getElementById("c_name");

    function checkData() {
        var categoryValue = category.value.trim();
        var isValid = true;

        if (categoryValue == "") {
            setError(c_name, "required");
            isValid = false;
        } else {
            setSuccess(c_name);
        }
        return isValid;  
    }

    function setError(e, msg) {
        var parentBox = e.parentElement;
        parentBox.className = "from-field error";
        var span = parentBox.querySelector("span");
        span.innerText = msg;
    }

    function setSuccess(e) {
        var parentBox = e.parentElement;
        parentBox.className = "from-field success";
    }

    function isEmail(e) {
        var reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return reg.test(e);
    }
</script>
</body>
</html>
