<?php
require_once 'databaseConnection.php';
session_start();


// 🔍 Check if ID is passed
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid request. Leaderboard ID missing.";
    exit;
}

$playerId = $_GET['id'];

// 🧾 Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $kills = $_POST["kills"];
        $level = $_POST["level"];
    $region = $_POST["region"];
    $rank = $_POST["rank"];

    $sql = "UPDATE LEADERBOARD SET player_name=?, kills=?, level=?, region=?, player_rank=? WHERE player_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $kills, $level, $region, $rank,$playerId);

    if ($stmt->execute()) {
        header("Location: admin_leaderboard.php?update=success");
        exit;
    } else {
        echo "Failed to update news.";
    }
}

// 📝 Fetch existing data
$sql = "SELECT * FROM LEADERBOARD WHERE player_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $playerId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Leaderboard not found.";
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

<h2>Edit Leaderboard</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Player Name:</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($news['player_name']) ?>"
 required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kills:</label>
        <input type="number" name="kills" class="form-control" required value="<?= $news['kills'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Level:</label>
        <input type="number" name="level" class="form-control"  required value="<?= htmlspecialchars($news['level']) ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Region:</label>
        <input type="text" name="region" class="form-control"  required value="<?= htmlspecialchars($news['region']) ?>">
    </div>

     <div class="mb-3">
        <label class="form-label">Rank:</label>
        <input type="number" name="rank" class="form-control"  required value="<?= htmlspecialchars($news['player_rank']) ?>">
    </div>

    <button type="submit" class="btn btn-primary">Update Leaderboard</button>
    <a href="admin_leaderboard.php" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>

