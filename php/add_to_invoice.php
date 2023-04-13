<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>
    <?php include("../html/navbar.html"); ?>
<table class="table-content" id="cart_table">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Remove</th>
                <th>Buy</th>
            </tr>
        </thead><br><br>
        <tbody>
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $sr = $key + 1;
                    echo "
                    <tr>
                        <td>$value[bname]</td>
                        <td>$value[aname]</td>
                        <td>$value[price]</td>
                        <td><form action='../php/add_to_cart.php' method='post'>
                            <button name='delete' type='submit' class='del'>DELETE</button>
                            <input type='hidden' name='id' value='$value[id]'>
                            </form></td>
                        <td><form action='../php/add_to_cart.php' method='post'>
                            <button name='buy' type='submit' class='buy'>BUY</button>
                            <input type='hidden' name='id' value='$value[id]'>
                            </form></td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <footer>
        <?php include("../html/footer.html"); ?>
    </footer>


</body>

</html>