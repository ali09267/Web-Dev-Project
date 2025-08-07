<?php
session_start();//a box that remember your actions through the pages

if (isset($_POST['registerBtn'])) {//if register btn is clicked

    require_once 'databaseConnection.php';//for db connection, we will simply include this pg 

    $email = $_POST['email'];//user email 
    $password = $_POST['password'];//user password

    $sql = "SELECT * FROM USER WHERE user_email = ?";
   $stmt = $conn->prepare($sql);

    if ($stmt) {//Did we find exactly 1 user with that email?
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows === 1){
        $user = $result->fetch_assoc();
        
       if (password_verify($password, $user['user_password'])) {
   $_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_name'] = $user['user_name'];
$_SESSION['user_email'] = $user['user_email'];

        if($email==="admin@gmail.com"){
            header('location: admin.php');
        }
        else{
    header("Location: index.php");
    exit;
        }
          
}
else {
            echo "<p style='color:red; font-size:1.2rem; font-weight:bold'>Incorrect password.</p>";
        }
    } else {
        echo "<p style='color:red;'>Email not found. Kindly Sign In First</p>";
    }
}
else{
            echo "<p style='color:red;'>Email not found. Kindly Sign In First</p>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="../CSS/login.css" rel="stylesheet">
</head>
<body>
    <!-- <a id="goBackId" href="index.php">⬅️Go Back</a> -->
     <form action="login.php" method="post">
        <!--Email Display-->
        <label for="emailID" class="label">Email</label><br>
        <input type="email" id="emailID" name="email" placeholder="Enter your email"><br><br>

        <!--Password Display-->
        <label for="passwordID" class="label">Password</label><br>
        <input type="password" id="passwordID" name="password" placeholder="Enter your password"><br><br>

        <button type="submit" name="registerBtn">Login</button>
    </form>
    <div id="signInMsg">
        <p>If you don't have account</p>
    <a href="register.php">SIGN IN</a>
</div>
</body>
</html>