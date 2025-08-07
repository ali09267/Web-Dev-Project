<?php
require_once 'PHP/databaseConnection.php';  // your DB connection

// Get the selected category from the GET request, or null if none
$selectedCategory = $_GET['categoryID'] ?? '';

// Fetch distinct categories for dropdown
$categoriesQuery = "SELECT DISTINCT category FROM products";
$categories = mysqli_query($conn, $categoriesQuery);

// Prepare products query with filtering if category selected
if ($selectedCategory) {
    // Use prepared statements for safety
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $selectedCategory);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // No filtering, get all products
    $result = mysqli_query($conn, "SELECT * FROM products");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vertical Product List</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<h2>Product Catalog</h2>

<!-- Form for category filter -->
<form method="GET" action="">
    <div class="filter">
    <label>Filter by Category:</label>
    <select name="categoryID" onchange="this.form.submit()">
        <option value="">-- All Categories --</option>
        <?php while ($cat = mysqli_fetch_assoc($categories)): ?>
            <option value="<?= htmlspecialchars($cat['category']) ?>"
                <?= ($selectedCategory == $cat['category']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['category']) ?>
            </option>
        <?php endwhile; ?>
    </select>
    </div>
</form>

<div class="main-container">
    <div class="parent">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="product">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" 
                width="100" height="100" alt="<?php echo htmlspecialchars($row['product_name']); ?>">

                <p class="name"><strong><?php echo htmlspecialchars($row['product_name']); ?></strong></p>

                <p class="price">Price: $<?php echo number_format($row['price'], 2); ?></p>

                <button class="add">Add to Cart</button>
                
            </div>
        <?php } ?>
    </div>

    <div class="cart">
        <h2>Your Cart</h2>
        <div id="cartContainer">
            <pre><p>No items in cart yet.</p></pre>
        </div>

        <form action="PHP/checkOut.php" method="post"  onsubmit="return prepareCheckout()">
            <input type="hidden" name="cartData" id="cartData">
            <button type="submit" class="checkOut">Checkout</button>
        </form>
    </div>
</div>

<script src="JS/index.js"></script>
</body>
</html>
