<?php
session_start();
require_once 'databaseConnection.php';
if(isset($_POST["submit-btn"])){

 $name = trim($_POST["fullname"]);
 $email=trim($_POST["email"]);
  $country=trim($_POST["country"]);
 $password=trim($_POST["password"]);
 $phone=trim($_POST["phone"]);
 $birthDate=trim($_POST["date"]);
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $sql = "INSERT INTO user (user_name, user_email,country, user_password, phone_number, date_of_birth) 
                VALUES (?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssss", $name, $email,$country, $hashedPassword, $phone, $birthDate);
            if ($stmt->execute()) {
                $userID = $stmt->insert_id;
                    // Normal user signup
                    $_SESSION['user_id'] = $userID;
                    header("Location: login.php");
                    exit;
                }
            } else {
                echo "<script>alert('DB Error: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Multi-Step Form with Progress Bar</title>
  <link href="../CSS/register.css" rel="stylesheet" >
</head>
<body>

  <div class="container">
    <form id="multiStepForm" action="register.php" method="POST">
      <!-- Progress Bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active">1</div>
        <div class="progress-step">2</div>
        <div class="progress-step">3</div>
        <div class="progress-step">4</div>
      </div>

      <!-- Page 1 -->
      <div class="form-step form-step-active">
        <h2>Personal Info</h2>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <div class="btns">
          <button type="button" class="next-btn">Next</button>
        </div>
      </div>

      <!-- Page 2 -->
      <div class="form-step">
        <h2>Account Info</h2>
        <input type="text" name="country" placeholder="Country Name" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="btns">
          <button type="button" class="prev-btn">Previous</button>
          <button type="button" class="next-btn">Next</button>
        </div>
      </div>

      <!-- Page 3 -->
      <div class="form-step">
        <h2>Contact Info</h2>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <input type="date" name="date" placeholder="Date Of Birth" required>
        <div class="btns">
          <button type="button" class="prev-btn">Previous</button>
          <button type="button" class="next-btn">Next</button>
        </div>
      </div>

      <!-- Page 4 -->
      <div class="form-step">
        <h2>Confirm & Submit</h2>
        <p>Review your information and submit the form.</p>
        <div class="btns">
          <button type="button" class="prev-btn">Previous</button>
          <button type="submit" name="submit-btn" class="submit-btn">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <br>
<p>Already Signed In?</p><a href="login.php">Click Here</a>
  <script src="../JS/register.js"></script>
</body>
</html>
