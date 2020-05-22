<?php
require ('../php/cpanel.php');
?>
<style>
    body{
        overflow-x: hidden;
    }
    .cats{
        direction: rtl;
        text-align: right;
        margin-right: 15%;
        padding-bottom: 100px;
    }
    .cats input{
        position: relative;
        width: 80%;
        height: 100px;
        margin-top: 20px;
    }
</style>
<br>
<div class="row justify-content-center">
    <div class="col-sm-12 searchBox">
        <center>

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
<br>
<center><h4>اختر القسم لعرض الاقسام الفرعية</h4></center>

<div class="cats">
        <?php foreach ($users as $u){ ?>
            <a href="subcat.php?catname=<?php echo $u['name']?>">
                <input type="submit" class="btn btn-primary" value="<?php echo GetCatArabicName('categories',$u['name'])?>" >
            </a>
        <?php } ?>
</div>
