<?php
require_once 'databaseConnection.php';
$sql="SELECT player_name, kills, level, region, player_rank, updated_at FROM LEADERBOARD";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        a {
    display: inline-block;
    margin-top: 5px;
    color: #007BFF;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.5rem;
}

a:hover {
    text-decoration: underline;
}       
    </style>
</head>
<body>
<?php
echo('<a href="index.php">Go Back</a> ');

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<div class="container mb-3">'; // Optional container for spacing
    echo '<div class="rank-card bg-dark text-white p-3 rounded shadow-sm d-flex flex-column">'; // Bootstrap styling
    echo '<div class="rank-number fs-5 fw-bold">#' . $row["player_rank"] . '</div>';
    echo '<h3 class="my-2">' . $row["player_name"] . '</h3>';
    echo '<p class="mb-1">Kills: ' . $row["kills"] . '</p>';
    echo '<p class="mb-0">Level: ' . $row["level"] . '</p>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo '<div class="alert alert-warning text-center">No data found.</div>';
}
$conn->close();
?>

</body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
