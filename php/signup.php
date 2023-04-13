<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/signup.css">
  <title>Sign Up</title>
  <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>


  <?php

  include('../php/config.php');

  session_start();
  if (isset($_REQUEST['fname'])) {
    $fname = stripslashes($_REQUEST['fname']);
    $fname = mysqli_real_escape_string($con, $fname);
    $lname = stripslashes($_REQUEST['lname']);
    $lname = mysqli_real_escape_string($con, $lname);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $contact = stripslashes($_REQUEST['contact']);
    $contact = mysqli_real_escape_string($con, $contact);
    $addr = stripslashes($_REQUEST['addr']);
    $addr = mysqli_real_escape_string($con, $addr);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($con, $city);
    $state = stripslashes($_REQUEST['state']);
    $state = mysqli_real_escape_string($con, $state);
    $pin = stripslashes($_REQUEST['pin']);
    $pin = mysqli_real_escape_string($con, $pin);
    if (stripslashes($_REQUEST['password']) == stripslashes($_REQUEST['con_password'])) {
      $query = "INSERT into user ( fname, lname, email, password, contact, addr, city, state, pin)
                 VALUES ('$fname', '$lname', '$email', '$password', '$contact', '$addr', '$city', '$state', '$pin')";
      $result = mysqli_query($con, $query);

      if ($result != 0) {
        echo "<div class='form'>
              <h3>Data Entered successfully.</h3><br/>
              </div>";
        echo "<meta http-equiv='refresh' content='0; URL='http://localhost/BookShack/signin.php'>";
      } else {
        echo "<div class='form'>
              <h3>ERROR</h3><br/>
              </div>";
        header("Location: ../php/index.php");
      }
    } else {
      echo "<script>alert('Passwords don't match');
      window.location.href='../php/signup.php';</script>";
    }
  }

  ?>

  <?php
  include("../html/navbar.html");
  ?>
  <div class="container">
    <div class="logo">
      <img src="../images/image7.png" alt="logo" width="300px">
    </div>
    <div class="top">
      Sign Up!
    </div>
    <form>
      <div class="grid-container">
        <input id="grid-item" type="text" class="form-control" name="fname" placeholder="First Name" required>
        <input id="grid-item" type="text" class="form-control" name="lname" placeholder="Last Nme" required>
        <input id="grid-item" type="email" class="form-control" name="email" placeholder="Email" required>
        <input id="grid-item" type="text" class="form-control" name="contact" placeholder="Contact" required>
        <input id="grid-item" type="password" class="form-control" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" required>
        <input id="grid-item" type="password" class="form-control" name="con_password" placeholder="Confirm Password" minlength="8" maxlength="12" required>
      </div>
      <div class="grid-container1">
        <input id="grid-item" type="text" class="form-control" name="addr" placeholder="Address" required>
      </div>
      <div class="grid-container2">
        <input id="grid-item" type="text" class="form-control" name="city" placeholder="City" required>
        <input id="grid-item" type="text" class="form-control" name="state" placeholder="State" required>
        <input id="grid-item" type="text" class="form-control" name="pin" placeholder="Pin" minlength="6" maxlength="6" required>
      </div>
      <button class="button" type="submit">
        Sign Up
      </button>
    </form>
    <div class="link">
      Alredy a user? <a href="../php/signin.php">Sign In</a>
    </div>
  </div>
  <footer>
    <?php
    include("../html/footer.html");
    ?>
  </footer>
</body>

</html>