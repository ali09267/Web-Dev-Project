<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
if ($_SESSION['user_email'] !== 'admin@gmail.com') {
    header("Location: login.php");
    exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-4">Welcome, Admin</h2>
  <div class="row g-4">
    <div class="col-md-6">
      <a href="admin_news.php" class="btn btn-primary w-100 p-3 fs-5">📰 Manage News</a>
    </div>
    <div class="col-md-6">
      <a href="admin_leaderboard.php" class="btn btn-success w-100 p-3 fs-5">🏆 Manage Leaderboard</a>
    </div>
  </div>
</div>

</body>
</html>
