<?php
require ('../pages/extendable/header.php');
require_once ('realtime.php');


if(isset($_GET['catname']) and isset($_GET['subcatname'])){
    DelTwoNodes($_GET['catname'],$_GET['subcatname']);
    header('location:subcat.php?catname='.$_GET['catname'].' ');
}
