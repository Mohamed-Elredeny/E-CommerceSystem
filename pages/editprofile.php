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
        <form action="editprofile.php" method="post">

        <div class="container" style="text-align: right;direction: rtl">
            <div class="team-single">
                <div class="row">
                    <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                        <div class="team-single-img">
                            <?php if(!empty($userDet['image'])){ ?>
                                <img src="<?php echo $userDet['image'] ?>" alt="">
                            <?php } ?>
                        </div>
                        <div
                            class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                            <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">
                                <?php echo @$userDet['name'] ?>
                            </h4>
                            <CENTER>
                                <input type="submit" class="btn btn-danger" value="حفظ" style="width: 100px" name="modifyUserDetails">

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
                                            <div class="col-md-5 col-12">
                                                <i class="fas fa-graduation-cap text-orange"></i>
                                                <strong class="margin-10px-left text-orange">الاسم:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p>
                                                    <input type="text" class="btn btn-outline-dark" name="name" value="<?php echo $userDet['name']?>">
                                                </p>
                                            </div>
                                        </div>

                                    </li>


                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-12">
                                                <i class="fas fa-mobile-alt text-purple"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-purple">رقم
                                                    الهاتف:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p>
                                                    <input type="text" class="btn btn-outline-dark" name="phone" value="<?php echo $userDet['phone']?>">
                                                </p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-12">
                                                <i class="fas fa-envelope text-pink"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-pink">البريد
                                                    الإلكتروني:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p>
                                                    <input type="text" class="btn btn-outline-dark" name="email" value="<?php echo $userDet['email']?>">
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-12">
                                                <i class="fas fa-mobile-alt text-purple"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-purple">كلمة
                                                    المرور
                                                    :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p>
                                                    <input type="text" class="btn btn-outline-dark" name="password" value="<?php echo $userDet['password']?>">
                                                </p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-12">
                                                <i class="fas fa-mobile-alt text-purple"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-purple">صورة شخصية
                                                    :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <input type="hidden" value="<?php echo $userDet['userId']?>" name="id" >

                                                <input type="file" class="form-control-file" id="photo1" onchange="uploadImage()"
                                                        class="btn btn-outline-primary">
                                                <input type="hidden"  value="<?php echo $userDet['image']?>" name="img1" id="img1">
                                                <meter class="disk_d" id="disk_d1"></meter>
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
        </form>

        <?php

    }
}?>



<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

<script>

    var firebaseConfig = {
        apiKey: "AIzaSyCqzfR3sV8NE55eUDY6RSfgIxl1hli_Oy8",
        authDomain: "450947081344-3kkpfl0l7s6t1ldgo545bnq6m63p6hob.apps.googleusercontent.com",
        databaseURL: "https://shopping-ae1ba.firebaseio.com",
        projectId: "shopping-ae1ba",
        storageBucket: "shopping-ae1ba.appspot.com",
        appId: "1:450947081344:android:e145ecb051e227cb4b7265"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


    function uploadImage() {
        const ref = firebase.storage().ref('profileImgs/');
        const file = document.querySelector("#photo1").files[0];
        const name = +new Date() + "-" + file.name;
        const metadata = {
            contentType: file.type
        };
        const task = ref.child(name).put(file, metadata);
        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                console.log(url);
                document.querySelector("#img1").value = url;
                document.querySelector("#disk_d1").value = 1;
            })
            .catch(console.error);
    }

</script>

