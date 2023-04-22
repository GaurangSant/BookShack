<?php
include("../php/Config.php");
session_start();
if (isset($_SESSION['email'])) {
} else {
    header("Location: ../php/signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="../images/image.png">
    <link rel="stylesheet" href="../css/invoice.css">
</head>

<body>
    <?php include("../html/navbar.html"); ?>
    <div class="invoice">
        <div class="bill">
            <div class="head">
                Purchase Details
            </div>
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $sr = $key + 1;
                    echo "
                    <p>
                        Book: <td>$value[bname]</td><br>
                        Author: <td>$value[aname]</td><br>
                        Price: ₹<td>$value[price]</td><br>
                    </p>";
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