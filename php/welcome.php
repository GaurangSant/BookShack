<?php
include("../php/Config.php");
session_start();
if (isset($_SESSION['email'])) {
} else {
  header("Location: ../php/signin.php");
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/welcome.css">

  <title><?php echo "Welcome " . $_SESSION['fname'] ?></title>
  <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>
  <?php include "../html/navbar.html"; ?>
  <?php
  $sql = "SELECT * FROM `user` WHERE email = '$_SESSION[email]'";
  $result = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($result);
  $arr = array($data);
  ?>
  <div class="info">
    <strong>Name</strong>: <?php echo $data['fname']; ?> <?php echo $data['lname'] ?><br>
    <strong>Email</strong>: <?php echo $data['email'] ?><br>
    <strong>Contact</strong>: <?php echo $data['contact'] ?><br>
    <strong>Address</strong>: <?php echo $data['addr'] ?><br>
    <strong>City</strong>: <?php echo $data['city'] ?><br>
    <strong>State</strong>: <?php echo $data['state'] ?><br>
    <strong>Pin</strong>: <?php echo $data['pin'] ?><br>
    <strong>UID</strong>: <?php echo $data['uid'] ?><br><br>
  </div>
  <div class="container">
    <strong>Upload Books</strong>: <a href="../php/upload.php"><button class="button" type="submit=">upload</button></a><br><br>
  </div>
  <p>Previous Uploads</p>
  <div class="table">
    <div class="grid">
      <?php
      $sql = "SELECT * FROM `item` WHERE uid = '$data[uid]'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_num_rows($result);
      if ($row > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
      ?>
          <form action="../php/add_to_cart.php" method="POST">
            <div class="card">
              <input type="hidden" id="image" name="image" readonly /><img src="./<?php echo $data['image']; ?>"><br>
              <input type="hidden" id="bname" name="bname" readonly /><?php echo $data['bname']; ?><br>
              <input type="hidden" id="aname" name="aname" readonly />Author: <?php echo $data['aname']; ?><br>
              <div class="price"><input type="hidden" id="price" name="price" readonly />Price: ₹<?php echo $data['price']; ?></div>
              <button type="submit" value="submit" name="add_to_cart">Add to Cart</button>
            </div>
          </form>
      <?php
        }
      } ?>
    </div>
  </div>
  <div class="container">
    <a href="../php/logout.php"><button class="button" type="submit=">Logout</button></a><br><br>
  </div>

  <footer>
    <?php
    include "../html/footer.html";
    ?>
  </footer>
</body>

</html>