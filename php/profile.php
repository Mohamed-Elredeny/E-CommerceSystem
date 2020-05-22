<?php
require ('realtime.php');
if(!empty($_SESSION['userId'])){
    $userDet = SelectWithTwoNodes('Users',$_SESSION['userId']);
}
if(isset($_POST['modifyUserDetails'])){
    InsertNewUser($_POST['email'],$_POST['img1'],$_POST['name'],$_POST['password'],$_POST['phone'],$_POST['id']);
    header('location:any.php?edit=edit');
}