<?php
if(isset($_GET['add'])){
    header('location:catsadd.php');
}
if(isset($_GET['addproduct'])){
    header('location:cpaneladdproduct.php');
}
if(isset($_GET['catid']) and isset($_GET['usbcatid'])){
    header('location:product.php?catid='.$_GET['catid'].'&usbcatid='.$_GET['usbcatid'].' ');
}
if(isset($_GET['edit'])){
    header('location:profile.php');
}
if(isset($_GET['delcart'])){
    header('location:cart.php');
}