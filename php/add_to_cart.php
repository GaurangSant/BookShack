<?php
session_start();
include("../php/Config.php");
if (isset($_SESSION['email'])) {
} else {
    header("Location: ../php/signin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'id');
            if (in_array($_POST['id'], $myitems)) {
                echo "<script>alert('Item Alreadt Added');
                window.location.href='../php/store.php';</script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('id' => $_POST['id'], 'bname' => $_POST['bname'], 'aname' => $_POST['aname'], 'price' => $_POST['price']);
                print_r($_SESSION['cart']);
                echo "<script>alert('Item Added');
                window.location.href='../php/store.php';</script>";
            }
        } else {
            $_SESSION['cart'][0] = array('id' => $_POST['id'], 'bname' => $_POST['bname'], 'aname' => $_POST['aname'], 'price' => $_POST['price']);
            print_r($_SESSION['cart']);
            echo "<script>alert('Item Added');
                window.location.href='../php/store.php';</script>";
        }
    }
    if(isset($_POST['delete'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $_POST['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Item Removed');
                window.location.href='../php/cart.php';</script>";
            }
        }
    } 
    if(isset($_POST['buy'])){
                    echo "<script>alert('Confirm Purchase?');
                window.location.href='../php/invoice.php';</script>";
    }
}
