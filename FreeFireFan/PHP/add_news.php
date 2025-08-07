<?php
require_once 'databaseConnection.php';
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $publish_date = $_POST["publish_date"];

    // Handle image upload
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_path = "../uploads/" . basename($img_name);

    if (move_uploaded_file($img_tmp, $img_path)) {
        // Insert into database
        $sql = "INSERT INTO news (title, content, img, publish_date) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $content, $img_path, $publish_date);

        if ($stmt->execute()) {
            header("Location: admin_news.php?status=added");
            exit;
        } else {
            echo "Failed to insert into database.";
        }
    } else {
        echo "Image upload failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Add News</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">News Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="img" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Publish Date</label>
            <input type="date" name="publish_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">➕ Add News</button>
        <a href="admin_news.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
