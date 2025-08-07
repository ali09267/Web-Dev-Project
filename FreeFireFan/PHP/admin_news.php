<?php
require_once 'databaseConnection.php';

$sql = 'SELECT news_id, title, content, img, publish_date FROM NEWS ORDER BY publish_date DESC';
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #121212;
      min-height: 100vh;
    }

    .row {
      margin-top: 30px;
      width: 90vw;
    }

    .card {
      background-color: #1f1f1f;
      color: white;
      border: 1px solid #444;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-footer{
        color: white;
    }

    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      padding: 0 15px 15px;
    }

    .btn {
      width: 48%;
    }
    a.back-link {
      display: inline-block;
      margin-bottom: 20px;
      color: #0d6efd;
      text-decoration: none;
      font-size: 1.2rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="row mx-auto">
    <a href="admin.php" class="back-link">← Go Back</a>
        <a href="add_news.php" class="back-link add-btn"> Add News</a>

    <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="card h-100">
          <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="News Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="card-text"><?php echo $row['content']; ?></p>
          </div>
          <div class="card-footer">
            <small><?php echo date("F j, Y", strtotime($row['publish_date'])); ?></small>
          </div>
          <div class="btn-group mt-2">
    <a href="edit_news.php?id=<?php echo $row['news_id']; ?>" class="btn btn-outline-light btn-sm">✏️ Edit</a>


    <a href="delete_news.php?id=<?php echo $row['news_id']; ?>" 
   class="btn btn-outline-danger btn-sm delete-btn"
   onclick="return confirm('Are you sure you want to delete this news?');">
   🗑️ Delete
</a>


</div>

        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
