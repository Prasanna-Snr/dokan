<?php
include "../database/dbcon.php";  // Ensure the path to the database connection is correct

// Handle POST request to add items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Retrieve the JSON data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    $customerId = 1; // Hardcoded customer ID (change this if needed, or pass via the frontend)
    $productId = intval($data['product_id']);
    $price = floatval($data['price']);
    $quantity = 1; // Default quantity
    $totalPrice = $price * $quantity;

    // Check if the product is already in the cart
    $checkQuery = "SELECT * FROM tbl_cart WHERE customer_id = ? AND product_id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ii", $customerId, $productId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    // If product is not in the cart, insert it
    if ($result->num_rows == 0) {
        $query = "INSERT INTO tbl_cart (customer_id, product_id, quantity, price_per_unit, total_price) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiidd", $customerId, $productId, $quantity, $price, $totalPrice);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Added to cart successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add to cart']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Product already in cart']);
    }

    $conn->close();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file if needed -->
</head>
<body>
    <!-- Navbar -->
    <?php include "customer_navbar.php"; ?>

    <div class="product-main-container">
        <p id="first-product">Our Products</p>
        <div class="first-product-row">
            <!-- Sample product row -->
            <div class="items">
                <a href="product_detail.html" class="img-container">
                    <img src="images/img2.png" alt="Product 1">
                </a>
                <p id="title">Product 1</p>
                <div class="price-container">
                    <p id="price">Rs.100.00</p>
                    <a href="#" class="add-to-cart" data-product-id="1" data-price="100.00">Add to cart</a>
                </div>
            </div>
            <!-- Repeat the above for other products -->
        </div>
    </div>

    <!-- Footer -->
    <?php include "customer_footer.php"; ?>

    <script>
        // JavaScript for Add to Cart functionality
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                const productId = this.dataset.productId;
                const price = this.dataset.price;

                // Use the Fetch API to send data to PHP
                fetch('product_page.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        price: price
                    })
                })
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    if (data.success) {
                        alert(data.message);  // Success message
                    } else {
                        alert(data.message);  // Error message
                    }
                })
                .catch(error => {
                    console.error('Error:', error);  // Log any errors
                });
            });
        });
    </script>
</body>
</html>
