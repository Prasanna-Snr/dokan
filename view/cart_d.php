<?php
session_start();
include "../database/dbcon.php";

// Ensure the user is logged in
if (!isset($_SESSION['customer_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$customerId = $_SESSION['customer_id']; // Get the logged-in user ID from the session

// Fetch the cart items and product details
$query = "SELECT p.product_id, p.name, p.price, p.image_path, c.quantity, c.total_price
          FROM tbl_cart c
          JOIN tbl_product p ON c.product_id = p.product_id
          WHERE c.customer_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

// Display cart items
$cartItems = [];
while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td>Rs. <?php echo number_format($item['price'], 2); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>Rs. <?php echo number_format($item['total_price'], 2); ?></td>
                <td><img src="<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" width="50"></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
</body>
</html>
