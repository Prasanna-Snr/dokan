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
                    <th>Total [Rs]</th>
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
                    <td><img src='" . $value['image'] . "' alt='" . $value['product_name'] . "' class='cart-product-image'></td>
                    <td>$value[price] <input type='hidden'  class='pprice' value='$value[price]'></td>
                    <td>
                        <form action='../controller/cart_controller.php' method='POST'>
                            <input class='pquantity' id='rmv-outline' type='number' min='1' max='10' onchange='this.form.submit();' name='modifiy_quantity' value='$value[quantity]'>
                            <input type='hidden' name='rmv_product' value='$value[product_name]'>
                        </form>
                    </td>
                    <td class='ptotal'></td>
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
            <div class="cart-total-price" id="final"> Total Amount:</div>
            <button class="cart-checkout-btn" onclick="checkout()">Checkout</button>
        </div>
    </div>
    <button class="back-cart" onclick="goback()">back</button>

    <script>
        function checkout() {
        <?php if (empty($_SESSION['cart'])): ?>
            alert("Your cart is empty. Please add items before proceeding to checkout.");
        <?php else: ?>
            window.location.href = "checkout.php";
        <?php endif; ?>
        }

        
        function goback(){
            window.history.back();
        }

        var pprice = document.getElementsByClassName('pprice');
        var pquantity = document.getElementsByClassName('pquantity');
        var ptotal = document.getElementsByClassName('ptotal');
        var final = document.getElementById('final');
        var finalTotal =0;

        function subTotal(){
            finalTotal=0;
          for(i=0;i<pprice.length;i++){
             ptotal[i].innerText=(pprice[i].value)*(pquantity[i].value);
             finalTotal = finalTotal + (pprice[i].value)*(pquantity[i].value);
            }

            final.innerText="Total Amount: "+finalTotal+".00";
        }

        subTotal();
    </script>

    
</body>
</html>
