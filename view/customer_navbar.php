<?php 
session_start();
include "../model/dbcon.php";
// if (!isset($_SESSION['user_login'])) {
//     header("Location: login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dokan</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <div class="nav-container">
        <div class="logo-img">
            <img src="/dokan/images/logo.png" alt="" width="150px">
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="search-cart-container">
            <div class="search">
                <input type="text" placeholder="Search here...">
                <i class="fa fa-search"></i>
            </div>

            <?php 
            $count = 0;
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
            }
            ?>

            <a href="/dokan/view/cart.php" class="cart" onclick="return checkCart(<?php echo $count; ?>);">
                <span>Your cart <?php echo $count ?></span>
                <i class="fa fa-shopping-cart"></i>
            </a>
        </div>

        <?php 
            if (isset($_SESSION['user_login'])) {
                $userId = $_SESSION['user_login'];
                $query = "SELECT username FROM tbl_customer WHERE id = $userId";
                $result = mysqli_query($conn, $query);
                $username = ""; 
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $username = $row['username'];
                    }
                }
                echo '<a href="customer_dashboard.php" class="profile-customer">'.$username. '</a>';
            } else {
                // Show login/register options if not logged in
                echo '<a href="login.php" class="profile-customer">Login</a>';
                echo '<a href="signup.php" class="profile-customer">Register</a>';
            }
            ?>
    </div>

    <script>
        function checkCart(count) {
            if (count === 0) {
                alert("Your cart is empty!");
                return false;
            }
            return true; 
        }
    </script>
</body>
</html>
