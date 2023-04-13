<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css">
    <title>Register item</title>
    <link rel="icon" type="image/x-icon" href="../images/image.png">
</head>

<body>
    <?php
    include('../html/navbar.html');
    include('../php/config.php');

    session_start();
    if (isset($_POST['submit'])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST['bname'])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "<script>alert('File is not an image')</script>";
                $uploadOk = 0;
            }
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        if ($_FILES["fileToUpload"]["size"] > 100) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        } else {
            echo "File must be under 100kb";    
        }


        $bname = stripslashes($_POST['bname']);   
        $bname = mysqli_real_escape_string($con, $bname);
        $aname = stripslashes($_POST['aname']);
        $aname = mysqli_real_escape_string($con, $aname);
        $price = stripslashes($_POST['price']);
        $price = mysqli_real_escape_string($con, $price);
        // $image = stripslashes($_REQUEST['image']); required
        // $image = mysqli_real_escape_string($con, $image);
        $uid = stripslashes($_POST['uid']);    
        $uid = mysqli_real_escape_string($con, $uid);
        $query = "INSERT into item ( bname, aname, price, image, uid )
                 VALUES ('$bname', '$aname', '$price', '$target_file', '$uid' )";
        $result = mysqli_query($con, $query);

        if ($result != 0) {
            echo "<div class='form'>
              <h3>Data Entered successfully.</h3><br/>
              </div>";
            echo "<meta http-equiv='refresh' content='0; URL=http://localhost/BookShack/php/signin.php'>";
        } else {
            echo "<div class='form'>
              <h3>ERROR</h3><br/>
              </div>";
            header("Location: ../php/index.php");
        }
    }

    ?>
    <div class="container">
        <div class="div">
            Register your item!
        </div>
        <form method="post" action="../php/upload.php" enctype="multipart/form-data" autocomplete="off">
            Book Name : <input type="text" name="bname" maxlength="25" required><br><br>
            Author Name : <input type="text" name="aname" maxlength="18" required><br><br>
            Price : <input type="text" name="price" maxlength="10" required><br><br>
            Image : <input type="file" name="image" height="200" width="200" required><br><br>
            UID : <input type="text" name="uid" maxlength="10" required><br><br>
            <div class="button">
                <button class="uploadfiles" id="button" name="submit" type="submit">submit</button>
            </div>
        </form>
    </div>
    <?php
    include('../html/footer.html');
    ?>
</body>

</html>