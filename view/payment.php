<?php 
include "customer_navbar.php";
?>
<!-- Payment Heading -->
<p id="delivery-info-heading">Select payment method</p>

<!-- Payment Type Container -->
<div class="payment-container">
    <a href="#" class="admin-items" data-method="card">
        <div class="min-container">
            <i class="fa-regular fa-credit-card" id="icon"></i>
            <p id="min-text">Credit/Debit Card</p>
        </div>
    </a>

    <a href="#" class="admin-items" data-method="esewa">
        <div class="min-container">
            <img src="/dokan/images/esewa.png" alt="e-Sewa" width="50">
            <p id="min-text">e-Sewa</p>
        </div>
    </a>

    <form action="../controller/order_controller.php" method="POST">
        <button class="admin-items" name="make-order">
        <div class="min-container">
            <img src="/dokan/images/cod.png" alt="Cash on Delivery" width="50">
            <p id="min-text">Cash on Delivery</p>
        </div>
    </button>
    <input type="hidden" value="cash on delivery" name="p-method">
    </form>
</div>

<!-- Payment Details -->
<div id="payment-details">
    <!-- for card -->
    <div id="card" class="payment-detail" style="display: none;">
        <h3>Credit/Debit Card Payment</h3>
        <form>
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" placeholder="Enter your card number">
            <label for="expiry">Expiry Date:</label>
            <input type="text" id="expiry" placeholder="MM/YY">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" placeholder="CVV">
            <button type="submit">Pay Now</button>
        </form>
    </div>

    <!-- for e-sewa  -->
    <div id="esewa" class="payment-detail" style="display: none;">
        <h3>e-Sewa Payment</h3>
        <form>
            <label for="card-number">Email/Phone no </label>
            <input type="text" id="card-number" placeholder="Email/phone"><BR>
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="password">
            <button type="submit">Pay Now</button>
        </form>
    </div>
        <!-- cash on delivery -->
    
    <div id="cod" class="payment-detail" style="display: none;">
        <h3>Cash on Delivery</h3>
        <p>Pay with cash when your order is delivered to your doorstep.</p>
        <form action="../controller/order_controller.php" method="POST">
            <button id="cod-button" name="make-order">OK</button>
            <input type="hidden" name="pm" value="cash on delivery">
        </form>
    </div>
</div>

<div class="popup" id="thank-you-popup" style="display: none;">
    <p id="first-product">Thank you</p>
    <p>We’ll call you in 30 minutes, you can check new post in our website dokan.com</p>
    <button id="close-popup">OK</button>
</div>

</body>
</html>
