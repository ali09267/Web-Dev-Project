<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <link href="../CSS/checkOut.css" rel="stylesheet">
</head>
<body>
    <div class="checkout-container">
        <?php
require_once 'databaseConnection.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cartData'])) {
    $cartData = json_decode($_POST['cartData'], true);

    if (!$cartData || !is_array($cartData)) {
        echo "Cart data is empty or invalid!";
        exit;
    }

    echo "<h1>Checkout Summary</h1>";
    $totalPrice = 0;
    $totalItems = 0;

    echo "<ul>";
    foreach ($cartData as $item) {
        $name = htmlspecialchars($item['name']);
        $quantity = intval($item['quantity']);
        $price = floatval(preg_replace('/[^0-9.]/', '', $item['price']));
        $subtotal = $quantity * $price;

        echo "<li>{$name} — {$quantity} x \${$price} = \${$subtotal}</li>";

        $totalPrice += $subtotal;
        $totalItems += $quantity;
    }
    echo "</ul>";

    echo "<h3>Total Items: {$totalItems}</h3>";
    echo "<h3>Total Price: \$" . number_format($totalPrice, 2) . "</h3>";
    echo("<a href='../index.php'>go back</a><br>");
       
    //insert into orders table
     $stmt = $conn->prepare("INSERT INTO orders (total_price) VALUES (?)");
    $stmt->bind_param("d", $totalPrice); // "d" for double

    if ($stmt->execute()) {
        $order_id = $conn->insert_id;  

        $stmt2 = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cartData as $item) {
            $name = $item['name'];
            $quantity = intval($item['quantity']);
            $price = floatval(preg_replace('/[^0-9.]/', '', $item['price']));

            $stmt2->bind_param("isid", $order_id, $name, $quantity, $price);
            $stmt2->execute();
        }
        echo("<a href='order_confirm.php?order_id=$order_id'>Confirm Order?</a>");
      
    }
      else{
            echo("Failed to insert data");
        }

} else {
    echo "No cart data received.";
}
?>

    </div>
</body>
</html>
