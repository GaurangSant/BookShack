<?php include("../php/Config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/search.css">
    <title>Store</title>
    <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>
    <?php include("../html/navbar.html");
    include("searchbar.html"); ?>
    <div class="table">
        <div class="grid">

            <?php
            if (isset($_POST['submit'])) {
                $search = mysqli_real_escape_string($con, $_POST['search']);
                $sql = "SELECT * FROM item WHERE bname LIKE '%$search%' OR aname LIKE '%$search%' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
            ?>
                        <form action="../php/add_to_cart.php" method="POST">
                            <div class="card">
                                <input type="hidden" readonly /><img src="./<?php echo $data['image']; ?>"><br>
                                <input type="hidden" readonly /><?php echo $data['bname']; ?><br>
                                <input type="hidden" readonly />Author: <?php echo $data['aname']; ?><br>
                                <div class="price"><input type="hidden" id="price" name="price" readonly />Price: <?php echo $data['price']; ?></div>
                                <button type="submit" value="submit" name="add_to_cart">Add to Cart</button>
                            </div>
                        </form>
            <?php

                    }
                } else {
                    echo "Data not found";
                }
            }
            ?>
        </div>
    </div>
    <footer>
        <?php include("../html/footer.html"); ?>
    </footer>

</body>

</html>