<?php
require('pages/extendable/header.php');
require ('realtime.php');
$cats = SelectWithNode('products');
$cats = SelectWithNode('products');

//Get Cat Arabic Name
function GetCatArabicName($tableName,$name)
{
    $res = SelectWithNode($tableName);
    return $res[$name]['name_arabic'];
}

//Get Sub CatName
function GetSubCatArabicName($tableName,$cat,$name)
{
    $res = SelectWithTwoNodes($tableName, $cat);
    return $res[$name]['name_arabic'];
}