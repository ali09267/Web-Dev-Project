<?php
require_once 'databaseConnection.php';
$sql = "SELECT player_id, player_name, kills, level, region, player_rank, updated_at FROM LEADERBOARD";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leaderboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #fff;
      padding: 20px;
    }

    a.back-link {
      display: inline-block;
      margin-bottom: 20px;
      color: #0d6efd;
      text-decoration: none;
      font-size: 1.2rem;
      font-weight: bold;
    }

    .rank-card {
      background-color: #1f1f1f;
      color: white;
      border: 1px solid #333;
      transition: transform 0.2s ease;
    }

    .rank-card:hover {
      transform: scale(1.02);
    }

    .btn-group-custom {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    .btn-custom {
      width: 48%;
    }
  </style>
</head>
<body>

<a href="admin.php" class="back-link">← Go Back</a><br>
 <a href="add_leaderboard.php" class="back-link">Add Character</a>

<div class="container">
  <div class="row">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-12 col-md-6 col-lg-4 mb-4">
          <div class="rank-card p-3 rounded shadow-sm h-100 d-flex flex-column justify-content-between">
            <div>
              <div class="rank-number fs-5 fw-bold mb-2">#<?php echo $row["player_rank"]; ?></div>
              <h4><?php echo $row["player_name"]; ?></h4>
              <p class="mb-1">Kills: <?php echo $row["kills"]; ?></p>
              <p class="mb-1">Level: <?php echo $row["level"]; ?></p>
              <p class="mb-1">Region: <?php echo $row["region"]; ?></p>
              <p class="mb-2"><small class="text-muted">Last Updated: <?php echo $row["updated_at"]; ?></small></p>
            </div>
            <div class="btn-group-custom">
              <a href="edit_leaderboard.php?id=<?php echo $row['player_id']; ?>" class="btn btn-outline-light btn-sm btn-custom">✏️ Edit</a>

              <a href="delete_leaderboard.php?id=<?php echo $row['player_id']; ?>" class="btn btn-outline-danger btn-sm btn-custom">🗑️  Delete</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="alert alert-warning text-center">No data found.</div>
    <?php endif; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
