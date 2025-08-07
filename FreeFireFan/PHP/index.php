<?php
session_start();
require_once 'databaseConnection.php';

$sql="SELECT title, content, img, publish_date FROM NEWS ORDER BY publish_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>
    body {
      background-color: #111;
      color: #00ff99;
      min-height: 100vh;
    }

    .navbar {
      background-color: #121212;
      border-bottom: 2px solid #00ff99;
      box-shadow: 0 2px 8px rgba(0, 255, 153, 0.2);
    }

    .navbar-brand {
      color: #00ff99;
      font-size: 1.7rem;
      font-weight: bold;
      transition: 0.3s ease;
      margin-left: 5px; /* ✏️ Added spacing between logo and brand text */
    }

    .navbar-logo {
      width: 40px; /* ✏️ New logo styling added */
      height: 40px;
      object-fit: contain;
      margin-right: 10px;
    }

    .navbar-nav .nav-link {
      color: #00ff99;
      font-weight: 500;
      padding: 10px 16px;
      border-radius: 4px;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      margin-left: 35px; /* ✏️ Adjusted spacing for consistent alignment */
      margin-right: 45px;
      font-size: 1.2rem;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      background-color: #00ff99;
      color: #121212;
      box-shadow: 0 0 10px #00ff99;
    }

    .main-container {
      height: 95vh;
      background-image: url('https://images.hdqwalls.com/download/lumen-girl-15-1920x1080.jpg');
      background-size: 100vw 95vh;
      background-repeat: no-repeat;
        background-position: center;
    }

    .card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: none;
  border-radius: 10px;
  overflow: hidden;
}

.card:hover {
   transform: scale(1.03); /* Expands in all directions */
  box-shadow: 0 8px 15px rgba(255, 255, 255, 0.4);
  cursor: pointer;
}

.card-img-top {
  transition: transform 0.3s ease;
}
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid d-flex align-items-center"> 

      <img src="../Images/Logo/logo1.png" alt="Fire Free Logo" class="navbar-logo"/>
      
      <a class="navbar-brand" href="#">Navbar</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-5"> 
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="characters.php">Characters</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="leaderboard.php">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php if (isset($_SESSION['user_id'])): ?>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
<?php endif; ?>

<?php if (!isset($_SESSION['user_id'])): ?>
  <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
<?php endif; ?>


        </ul>
      </div>
    </div>
  </nav>

  <div class="main-container">
    <div class="img1"></div>
    <div class="img2"></div>
  </div>

  <div class="container mt-5">
  <div class="row">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="card h-100">
          <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="News Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="card-text"><?php echo $row['content']; ?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><?php echo date("F j, Y", strtotime($row['publish_date'])); ?></small>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
