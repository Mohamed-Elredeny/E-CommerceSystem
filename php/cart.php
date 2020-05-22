<?php
session_start();
require_once ('realtime.php');

$userCart = SelectWithTwoNodes('cart', $_SESSION['userId']);
if(isset($_POST['deleteElement'])){
    if(!empty($_SESSION['userId'])){
        AbstractDelTwoNodes('cart',$_SESSION['userId'],$_POST['pid']);
        header('location:any.php?delcart=delcart');
    }
}