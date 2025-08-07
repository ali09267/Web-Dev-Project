<?php
require_once 'databaseConnection.php';

if(isset($_POST["submitBtn"])){
    $name=$_POST["name"];
        $email=$_POST["email"];
    $subject=$_POST["subject"];
    $msg=$_POST["msg"];

        $stmt=$conn->prepare("INSERT INTO CONTACT(name,email,subject,message) VALUES(?,?,?,?)");

$stmt->bind_param("ssss", $name, $email, $subject,$msg);

if($stmt->execute()){
    echo("Your Message Recorded Successfully");
}
else{
  echo "Error: " . $stmt->error;}
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<style>
    body {
  height: 95vh;
  margin: 0;
  background: linear-gradient(to right, #1f1f8e, #472577, #1f1f8e);
  color: white;
  font-family: 'Segoe UI', sans-serif;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.container {
  height: 80vh;
  width: 450px;
  border-radius: 10px;
  border: 2px solid rgb(217, 207, 207);
  margin-top: 35px;
  transition: all 0.3s ease;
  color: rgb(255, 99, 158);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
  background-color: transparent;
}

.container:hover {
  transform: scale(1.03);
  cursor: pointer;
}

.input {
  background-color: transparent;
  border: 1px solid #fff;
  color: white;
  padding: 10px;
  width: 80%;
  border-radius: 10px;
  margin: 23px;
  outline: none;
}

#sentBtn {
  background-color: #3a3a8c;
  color: white;
  border: 1px solid white;
  padding: 10px 25px;
  border-radius: 10px;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.3s, box-shadow 0.3s;
  margin-bottom: 20px;
}

button:hover {
  background-color: #2a2a6c;
  box-shadow: 0 0 15px rgba(255, 255, 255, 0.4);
}

input:-webkit-autofill {
  -webkit-box-shadow: transparent inset;
  -webkit-text-fill-color: white;
  transition: background-color 5000s ease-in-out 0s;
}
a{
  display: inline-block;
      margin-bottom: 20px;
      color: #0d6efd;
      text-decoration: none;
      font-size: 1.3rem;
      font-weight: bold;
}
a:hover{
  text-decoration: underline;
}

@media(max-width:540px){
  .container{
    width: 400px;
  }
}
@media(max-width:460px){
  .container{
    width: 350px;
  }
}
@media(max-width:400px){
  .container{
    width: 300px;
  }
}
@media(max-width:330px){
  .container{
    width: 270px;
  }
}
</style>
<body>
  <a href="index.php">Go Back</a>
    <form action="contact.php" method="post" onsubmit="return validateForm();">
    <div class="container">

        <input type="text" name="name" class="name input" placeholder="Enter your name" id="nameID">

        <input type="email" name="email" class="name input" placeholder="Enter your email" id="emailID">

         <input type="text" name="subject" placeholder="Subject" class="subject input" id="subjectID">

  <textarea name="msg" placeholder="Your Message" class="msg input "rows="5" cols="33" id="msgID"></textarea>

  <button  type="submit" id="sentBtn" name="submitBtn">Send</button>
</div>
<div id="message" class="alert d-none mt-3"></div>
    </div>
</form>
<script src="../JS/contact.js"></script>
</body>
</html>