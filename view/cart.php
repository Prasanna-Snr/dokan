<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="cart-container">
        <h1>Your Cart</h1>
        <table id="cart-table">
            <thead>
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <?php
                $total =0;
                if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key=>$value){
                    $total = $total+$value['price'];
                    echo "<tr>
                    <td>$value[image]</td>
                    <td>$value[price]</td>
                    <td><input  id='rmv-outline' type='number' min='1' max='10' value='$value[quantity]'></td>
                    <td>
                        <form action='../controller/cart_controller.php' method='POST'>
                            <button name='remove_product' class='cart-remove-btn'> Remove  </button>
                            <input type='hidden' name='rmv_product' value='$value[product_name]'>
                        </form>
                    </td>
                    
                    </tr>";
                }
            }
                ?>
                
            </tbody>
        </table>
        <div class="cart-footer">
            <div class="cart-total-price"> Total Amount: <?php echo "Rs: ". $total. ".00"?></div>
            <button class="cart-checkout-btn" onclick="checkout()">Checkout</button>
        </div>
    </div>

    <script>
        function checkout(){
         window.location.href="checkout.php"
        }
    </script>

    
</body>
</html>
