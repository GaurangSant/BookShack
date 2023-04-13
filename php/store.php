<?php include("../php/Config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/store.css">
  <title>Store</title>
  <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>
  <?php include("../html/navbar.html"); 
  include("../html/searchbar.html"); ?>


  <div class="table">
    <div class="grid">
      <?php
      $sql = "SELECT * FROM item";
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
              <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
              <input type="hidden" name="bname" value="<?php echo $data['bname']; ?>">
              <input type="hidden" name="aname" value="<?php echo $data['aname']; ?>">
              <input type="hidden" name="price" value="<?php echo $data['price']; ?>">
            </div>
          </form>
      <?php
        }
      }
      else {
        // include("../php/empty.php");
      }
      ?>
    </div>
  </div>

  <footer>
    <?php include("../html/footer.html"); ?>
  </footer>

</body>

</html>