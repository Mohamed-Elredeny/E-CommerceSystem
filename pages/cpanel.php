<?php
require ('../php/cpanel.php');

?>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<br><br>
<div class="row justify-content-center">
    <div class="col-sm-12 searchBox">
        <center>
            <input type="button" class="btn btn-dark" value="اضافة منتج">

            <input type="button" class="btn btn-dark" value="الفواتير">
            <input type="button" class="btn btn-dark" value="المفضلة">
            <input type="button" class="btn btn-dark" value="العربات">
            <input type="button" class="btn btn-dark" value="الفواتير">

            <input type="button" class="btn btn-dark" value="الموظفين">

            <input type="button" class="btn btn-dark" value="المستخدمين">

            <select name="" id="" class="btn btn-dark">
                <option value="">الاقسام الفرعية</option>
            </select>

            <select name="" id="" class="btn btn-dark">
                <option value="">الاقسام</option>
            </select>

        </center>

    </div>
</div>


<div class="row row-offcanvas row-offcanvas-left">
    <!--/col-->

    <div class="col main pt-5 mt-3 ">

        <div class="row mb-3" style="text-align: right;direction: rtl">
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card bg-success text-white h-100">
                    <div class="card-body bg-success" >
                        <div class="rotate">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">المستخدمين</h6>
                        <h1 class="display-4">134</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body bg-danger">
                        <div class="rotate">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">عدد الاقسام</h6>
                        <h1 class="display-4">87</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-info h-100">
                    <div class="card-body bg-info">
                        <div class="rotate">
                            <i class="fa fa-twitter fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">عدد الاقسام الفرعية</h6>
                        <h1 class="display-4">125</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body">
                        <div class="rotate">
                            <i class="fa fa-share fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">عدد الفواتير</h6>
                        <h1 class="display-4">36</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <hr>
    <form action="" style="text-align: center">
        <h2>الخدمات</h2>
        <br><br>



        <a href="selCat.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            عرض الاقسام الفرعية
        </a>
        <a href="cats.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">

            عرض الاقسام
        </a>

        <a href="pages/Population.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            الموظفين
        </a>
        <a href="pages/manage.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            المستخدمين
        </a>
        <a href="pages/manage.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            الفواتير
        </a>
        <a href="pages/manage.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            قوائم المفضلة
        </a>
        <a href="pages/manage.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            العربات
        </a>
        <a href="cpanelproducts.php" class="btn btn-primary " style="width: 18rem;height: 10rem;padding-top: 60px;margin-right: 20px;margin-bottom: 20px;font-size: 20px">
            اضافة منتج
        </a>
    </form>

</div>




















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
