<?php
require ('../pages/extendable/header.php');
require_once ('realtime.php');
$cats = SelectWithNode('categories');

if(isset($_GET['catname'])) {

    $users = SelectWithTwoNodes('subCategories', $_GET['catname']);
}
if(isset($_POST['catsadd'])){
    if(isset($_GET['catname'])) {
        modifySubCat($_GET['catname'], $_POST['name'], $_POST['name_arabic'], $_POST['img1']);
    }
}
if(isset($_POST['EditNewCus'])){
    if(isset($_GET['catname']) and isset($_GET['subcatname'])){

        modifySubCat($_GET['catname'],$_POST['name'],$_POST['name_arabic'],$_POST['img1']);
    }
}

