<?php
require_once 'databaseConnection.php';
session_start();


// 🔍 Check if ID is passed
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid request. News ID missing.";
    exit;
}

$newsId = $_GET['id'];

// 🧾 Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $date = $_POST["date"];

    $sql = "UPDATE news SET title=?, content=?, publish_date=? WHERE news_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $title, $content, $date, $newsId);

    if ($stmt->execute()) {
        header("Location: admin_news.php?update=success");
        exit;
    } else {
        echo "Failed to update news.";
    }
}

// 📝 Fetch existing data
$sql = "SELECT * FROM news WHERE news_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $newsId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "News not found.";
    exit;
}

$news = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Edit News</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Title:</label>
        <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($news['title']); ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Content:</label>
        <textarea name="content" class="form-control" rows="5" required><?php echo htmlspecialchars($news['content']); ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Publish Date:</label>
        <input type="date" name="date" class="form-control" value="<?php echo $news['publish_date']; ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update News</button>
    <a href="all_news.php" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
