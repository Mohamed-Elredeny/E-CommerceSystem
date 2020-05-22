<?php
require ('../pages/extendable/header.php');
require ('realtime.php');
$cats =SelectWithNode('categories');

if(isset($_POST['addproduct'])){
    InsertNewProduct('products',$_POST['cat'],$_POST['subcat'],$_POST['name_arabic'],$_POST['description'],$_POST['price'],$_POST['color'],$_POST['img1']);
    header('location:any.php?addproduct=true');
}