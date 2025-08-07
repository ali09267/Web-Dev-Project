<?php
require_once 'databaseConnection.php';
$sql="SELECT actor_name, actor_img, ability FROM ACTOR";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <style>
       * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #0f0f0f;
      color: #fff;
    }
    .card{
      border: 1px solid white;
      cursor: pointer;
        box-shadow: 0 0 4px 4px rgba(255, 255, 255, 0.13);
    }
    a{
      display: inline-block;
    margin-top: 5px;
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.5rem;
    }
    a:hover{
      cursor: pointer;
      text-decoration: underline;
    }

    </style>
</head>
<body>
  <a href="index.php">Go Back</a>
     <div class="container mt-4">
  <div class="row">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card chars-card h-100">
          <img src="<?php echo $row['actor_img']; ?>" class="card-img-top" alt="Character Image">
          <div class="card-body text-center">
            <h5 class="card-title"><?php echo $row['actor_name']; ?></h5>
            <p class="card-text"><?php echo $row['ability']; ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>