<?php
require_once 'databaseConnection.php';

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $newsId = intval($_GET['id']);

    // Prepare the SQL delete query
    $sql = "DELETE FROM NEWS WHERE news_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $newsId);

    // Execute and redirect
    if ($stmt->execute()) {
        // Deleted successfully, redirect to news page
        header("Location: admin_news.php?status=deleted");
        exit();
    } else {
        // Error occurred
        echo "Error deleting news: " . $conn->error;
    }

    $stmt->close();
} else {
    // Invalid access (no id in URL)
    echo "Invalid request. News ID is missing.";
}

$conn->close();
?>
