<?php
require ('../pages/extendable/header.php');
require ('realtime.php');
if(isset($_POST['register'])){
    register($_POST['name'],$_POST['email'],$_POST['password'],$_POST['phone']);
    header('location:login.php');
}


?>