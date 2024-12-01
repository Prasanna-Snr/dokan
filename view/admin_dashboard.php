<?php


include "../database/dbcon.php";


$query = "SELECT COUNT(*) AS total FROM tbl_product"; //tatal = temoprary column or alias
$result = mysqli_query($conn, $query);

$sql = "SELECT COUNT(*) AS total_categories FROM tbl_categories"; 
$res = mysqli_query($conn, $sql);


if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
}

if($res){
    $row1 =  mysqli_fetch_assoc($res);
    $total_categories = $row1['total_categories'];
}
?>

<?php include "admin_navbar.php";?>
<!-- items list container -->
<div class="body-container">
    <div class="categories-section">
        <div class="admin-list">
            <div id="admin-d">
            <a href="admin_dashboard.php">
            <p id="admin-heading">Dashboard</p>
            </a>
            </div>
            <hr class="custom-line">
            <ul>
                <li><a href="customer_list.php">Customer</a></li>
                <li><a href="product_list.php">Product</a></li>
                <li><a href="categories_list.php">Categories</a></li>
                <li><a href="#">Order</a></li>
                <li><a href="#">Setting</a></li>
                <li><a href="#">Profile</a></li>
              
            </ul>
        </div>
    </div>
    <div class="image-section">
        <div class="item-container">
            
            <a href="" class="admin-items">
                <div class="min-container">
                    <span id="no">200</span>
                    <p id="min-text">Customer Management</p>
                </div>
            </a>

            <a href="product_list.php" class="admin-items">
                <div class="min-container">
                <span id="no"><?php echo $total; ?></span>
                    <p id="min-text">Total Product</p>
                </div>
            </a>

            <a href="categories_list.php" class="admin-items">
                <div class="min-container">
                    <span id="no"><?php echo $total_categories?></span>
                    <p id="min-text"> Total Categories</p>
                </div>
            </a>

            <a href="" class="admin-items">
                <div class="min-container">
                    <span id="no">80</span>
                    <p id="min-text">Order Management</p>
                </div>
            </a>

            
        </div>


        <marquee behavior="scroll" direction="left" >
            Welcome to Dokan Admin Dashboard! Manage your drone and gadget store effortlessly. Empower your e-commerce business with ease!
            </marquee>
            

        </div>
    </div>
</div>
</body>
</html>