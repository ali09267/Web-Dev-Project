<?php
require_once 'databaseConnection.php';
session_start();

// 🧾 Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $kills = $_POST["kills"];
        $level = $_POST["level"];
    $region = $_POST["region"];
    $rank = $_POST["rank"];

    $sql = "INSERT INTO LEADERBOARD (player_name, kills, level, region, player_rank) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $kills, $level, $region, $rank);

    if ($stmt->execute()) {
        header("Location: admin_leaderboard.php?update=success");
        exit;
    } else {
        echo "Failed to add leaderboard.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Add Leaderboard</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Player Name:</label>
        <input type="text" name="name" class="form-control"
 required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kills:</label>
        <input type="number" name="kills" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Level:</label>
        <input type="number" name="level" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Region:</label>
        <input type="text" name="region" class="form-control">
    </div>

     <div class="mb-3">
        <label class="form-label">Rank:</label>
        <input type="number" name="rank" class="form-control"  required>
    </div>

    <button type="submit" class="btn btn-primary">Add Leaderboard</button>
    <a href="admin_leaderboard.php" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>

