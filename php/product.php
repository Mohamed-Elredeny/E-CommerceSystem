<?php
require ('../pages/extendable/header.php');
require ('realtime.php');


if(isset($_GET['catid']) and isset($_GET['usbcatid'])) {
    $products = SelectWithThree('products', $_GET['catid'], $_GET['usbcatid']);
}
if(isset($_POST['addtocart'])){
    AddToCart('cart', $_POST['cat'], $_POST['subcat'], $_POST['name'], $_POST['name_arabic'], $_POST['description'], $_POST['price'], $_POST['color'], $_POST['img1'], $_SESSION['userId'], $_POST['productid'],$_POST['amount']);
    header('location:any.php?catid='.$_POST['cat'].'&usbcatid='.$_POST['subcat'].' ');
}

?>

