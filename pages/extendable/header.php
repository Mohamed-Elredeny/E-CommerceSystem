<?php
session_start();

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" style="text-align: right">
    <?php if (strpos($_SERVER['REQUEST_URI'], "index") == true){ ?>

    <div class="container">
        <a class="navbar-brand" href="#">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav mr-auto"  >

                <li class="nav-item active">
                    <a class="nav-link" href="#">اسم الشركة  </a>
                </li>
            </ul>

            <ul class="nav navbar-nav mx-auto"  >

                <li class="nav-item">
                    <a class="nav-link" href="#">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">سياسة الخصوصية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الرئيسية</a>
                </li>
                <?php if(@$_SESSION['isactive'] == true){ ?>

                <li class="nav-item">
                    <a class="nav-link" href="pages/cart.php">العربة</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="pages/cpanel.php">لوحة التحكم</a>
                </li>
                <?php } ?>
                <?php if(@$_SESSION['isactive'] == true){ ?>
                <li class="nav-item">

                    <a class="nav-link" href="pages/profile.php"> حسابي</a>
                </li>
                <?php } ?>

            </ul>
            <?php if(@$_SESSION['isactive'] == true){ ?>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="pages/logout.php">تسجيل خروج</a>
                </li>
            </ul>
            <?php } else{ ?>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/login.php">تسجيل دخول</a>
                    </li>
                </ul>
            <?php } ?>

        </div>
    </div>
    <?php }else{ ?>
        <div class="container">
            <a class="navbar-brand" href="#">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mr-auto"  >

                    <li class="nav-item active">
                        <a class="nav-link" href="#">اسم الشركة  </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav mx-auto"  >

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="policy.php">سياسة الخصوصية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">تواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=../index.php>الرئيسية</a>
                    </li>
                    <?php if(@$_SESSION['isactive'] == true){ ?>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">العربة</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="cpanel.php">لوحة التحكم</a>
                        </li>
                    <?php } ?>
                    <?php if(@$_SESSION['isactive'] == true){ ?>
                        <li class="nav-item">

                            <a class="nav-link" href="profile.php"> حسابي</a>
                        </li>
                    <?php } ?>


                </ul>
                <?php if(@$_SESSION['isactive'] == true){ ?>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">تسجيل خروج</a>
                        </li>
                    </ul>
                <?php } else{ ?>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">تسجيل دخول</a>
                        </li>
                    </ul>
                <?php } ?>

            </div>
        </div>

    <?php } ?>
</nav>

