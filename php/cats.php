<?php
require ('../pages/extendable/header.php');
require_once ('realtime.php');

$users =SelectWithNode('categories');
if(isset($_POST['catsadd'])){
    InsertOneNode('categories',$_POST['name'],$_POST['name'],$_POST['name_arabic']);
    header('location:any.php?add=cat');
}
if(isset($_POST['EditNewCus'])){
    if(isset($_GET['CurentPopId'])) {

        modifyCat($_POST['name'], $_POST['name_arabic']);
    }
}

if(isset($_GET['DelId'])){
    DelNot($_GET['DelId']);
    header('location:cats.php');
}