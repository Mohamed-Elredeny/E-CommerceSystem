<?php
require ('extendable/header.php');
require ('../php/profile.php');
?>
<link rel="stylesheet" href="../assets/css/profile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<br>
<?php
if(!empty($_SESSION['userId'])) {
    if (@count(@$userDet) > 0) {
            ?>
            <div class="container" style="text-align: right;direction: rtl">
                <div class="team-single">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 xs-margin-30px-bottom"  style="height: 300px">
                            <div class="team-single-img">
                                <?php if(!empty($userDet['image'])){ ?>
                                <img src="<?php echo $userDet['image'] ?>" alt="" height="100%">
                                 <?php } ?>
                            </div>
                            <div
                                class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                                <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">
                                   <?php echo @$userDet['name'] ?>
                                </h4>
                                <CENTER>
                                    <a href="editprofile.php" >
                                        <input type="button" class="btn btn-danger" value="تعديل" style="width: 100px">

                                    </a>

                                </CENTER>
                            </div>

                        </div>

                        <div class="col-lg-8 col-md-7">
                            <div class="team-single-text padding-50px-left sm-no-padding-left">
                                <div class="contact-info-section margin-40px-tb">
                                    <ul class="list-style9 no-margin">
                                        <li>
                                            <br><br><br>
                                            <div class="row">
                                                <div class="col-md-5 col-5">
                                                    <i class="fas fa-graduation-cap text-orange"></i>
                                                    <strong class="margin-10px-left text-orange">الاسم:</strong>
                                                </div>
                                                <div class="col-md-7 col-7">
                                                    <p><?php echo @$userDet['name'] ?></p>
                                                </div>
                                            </div>

                                        </li>


                                        <li>

                                            <div class="row">
                                                <div class="col-md-5 col-5">
                                                    <i class="fas fa-mobile-alt text-purple"></i>
                                                    <strong class="margin-10px-left xs-margin-four-left text-purple">رقم
                                                        الهاتف:</strong>
                                                </div>
                                                <div class="col-md-7 col-7">
                                                    <p><?php echo @$userDet['phone'] ?></p>
                                                </div>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-5 col-5">
                                                    <i class="fas fa-envelope text-pink"></i>
                                                    <strong class="margin-10px-left xs-margin-four-left text-pink">البريد
                                                        الإلكتروني:</strong>
                                                </div>
                                                <div class="col-md-7 col-7">
                                                    <p><?php echo @$userDet['email'] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="row">
                                                <div class="col-md-5 col-5">
                                                    <i class="fas fa-mobile-alt text-purple"></i>
                                                    <strong class="margin-10px-left xs-margin-four-left text-purple">كلمة
                                                        المرور
                                                        :</strong>
                                                </div>
                                                <div class="col-md-7 col-7">
                                                    <p><?php echo @$userDet['password'] ?></p>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-12">
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

            <?php

    }
}?>