<?php
require('header.php');

?>
<link rel="stylesheet" href="../assets/css/main.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">


            <!--Form with header-->

            <form action="contactus.php" method="post" >
                <div class="card border-primary rounded-0" style="margin-top: 15%">
                    <div class="card-header p-0">
                        <div class="bg-dark text-white text-center py-2">
                            <h3><i class="fa fa-envelope" style="margin-right: 5%"></i>تواصل معنا  </h3>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <!--
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fab fa-whatsapp"></i></div>
                                </div>
                                <input type="button" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="@abelalkhaleej" required>
                            </div>
                        </div>
                        -->
                        <center>
                            <h6>من خلال مواقع التواصل الاجتماعي</h6>
                            <br>
                        </center>
                        <a href="https://twitter.com/abelalkhaleej" >
                            <div class="form-group" >

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><a href="https://twitter.com/abelalkhaleej"><i class="fab fa-twitter"></i> </a> </div>
                                    </div>
                                    <input type="button" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido"  value="twitter@abelalkhaleej" required>
                                </div>

                            </div>
                        </a>
                        <!--
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                            </div>
                            <input type="button" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido"  value="@abelalkhaleej" required>
                        </div>
                    </div>
                    -->

                        <div class="text-center">
                            <input type="submit" value="تحميل تطبيق الاندرويد" class="btn btn-dark btn-block rounded-0 py-2">
                            <input type="submit" value="تحميل تطبيق الايفون" class="btn btn-dark btn-block rounded-0 py-2">

                        </div>
                        <br><br>
                        <div style="text-align: center;color: #800a00"> @جميع الحقوق محفوظة لمؤسسة حراج إبل الخليج</div>

                    </div>

                </div>
            </form>
            <!--Form with header-->


        </div>
    </div>

</div>

<?php
require('footer.php');
?>
