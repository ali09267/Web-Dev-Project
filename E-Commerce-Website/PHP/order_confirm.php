<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../CSS/order_confirm.css"> 
</head>
<body>
<div class="confirmation-container">
<?php
require_once 'databaseConnection.php';

if (!isset($_GET['order_id']) || !is_numeric($_GET['order_id'])) {
    echo "<div class='error-box'>Invalid or missing order ID.</div>";
    exit;
}

$orderId = intval($_GET['order_id']);

$orderQuery = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$orderQuery->bind_param("i", $orderId);
$orderQuery->execute();
$orderResult = $orderQuery->get_result();

if ($orderResult->num_rows === 0) {
    echo "<div class='error-box'>Order not found.</div>";
    exit;
}

$order = $orderResult->fetch_assoc();
$orderDate = $order['order_date'];
$totalPrice = number_format($order['total_price'], 2);

echo "<div class='receipt-box'>";
echo "<h2>Order Confirmation</h2>";
echo "<div class='order-info'>";
echo "<p><strong>Order ID:</strong> #{$orderId}</p>";
echo "<p><strong>Date:</strong> {$orderDate}</p>";
echo "</div><ul class='item-list'>";

// Get order items
$itemsQuery = $conn->prepare("SELECT product_name, quantity, price FROM order_items WHERE order_id = ?");
$itemsQuery->bind_param("i", $orderId);
$itemsQuery->execute();
$itemsResult = $itemsQuery->get_result();

while ($item = $itemsResult->fetch_assoc()) {
    $name = htmlspecialchars($item['product_name']);
    $quantity = $item['quantity'];
    $price = number_format($item['price'], 2);
    $subtotal = number_format($quantity * $item['price'], 2);
    echo "<li><span>{$name}</span><span>{$quantity} × \${$price} = \${$subtotal}</span></li>";
}
echo "</ul>";
echo "<p class='total'><strong>Total Cost:</strong> \${$totalPrice}</p>";
echo "</div>";
echo "<h3 class='thank-you'>🎉 Thank you for your purchase! Your order will be delivered soon. 🚚</h3>";

$conn->close();
?>
</div>
</body>
</html>
