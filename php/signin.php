<?php
include('../php/config.php');
session_start();

if(isset($_SESSION['email'])){
  header("Location: ../php/welcome.php");
  exit;
}
require_once("../php/Config.php");

if (isset($_REQUEST['email'])) {
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($con, $email);
  $password1 = stripslashes($_REQUEST['password']);
  $password1 = mysqli_real_escape_string($con, $password1);

  $query1 = "select * from user";
  $data = mysqli_query($con, $query1);
  $rows = mysqli_num_rows($data);

  if ($rows != 0) {
    while ($result1 = mysqli_fetch_assoc($data)) {
      if ($result1['email'] == $email) {


        $query3 = "SELECT password FROM user WHERE email='$email'";
        $password = mysqli_query($con, $query3);
        $result3 = mysqli_fetch_assoc($password);
        if ($password1 == $result3['password']) {
          session_start();
          $_SESSION['fname'] = $result1['fname'];
          $_SESSION['email'] = $result1['email'];
          header("Location: ../php/welcome.php");
        } else {
          // header("Location: ../php/mistake.php");
          echo '<script>alert("Incorrect credentials")</script>';
        }
      }
    }
  }
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/signin.css">
  <title>Sign In</title>
  <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>
  <?php
  include("../html/navbar.html");
  ?>
  <div class="container">
    <div class="logo">
      <img src="../images/image.png" alt="logo" width="300px">
    </div>
    <div class="top">
      Sign In!
    </div>
    <form>
    <div class="grid-container">
      <input id="grid-item" type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="grid-container1">
      <input id="grid-item" type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button class="button" type="submit">
      Sign In
    </button>
    </form>
    <div class="link">
      New user? <a href="../php/signup.php">Sign Up</a>
    </div>
  </div>
  <footer>
    <?php
    include("../html/footer.html");
    ?>
  </footer>
</body>

</html>