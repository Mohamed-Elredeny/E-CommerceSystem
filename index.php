<?php
require ('php/Home/index.php');
$categories = SelectWithNode('categories');

?>
    <link rel="stylesheet" href="assets/css/index.css">
<body>
<br>

<div class="d-flex justify-content-center">

    <div class="row justify-content-center">
        <div class="col-sm-12 searchBox">
            <center>
                <select name=""  class="btn btn-dark" id="ssel" style="width: 150px">
                    <option value="" selected>القسم الفرعي </option>
                </select>
                <select name="" class="btn btn-dark" id="fsel" style="width: 150px">
                    <option value=""> القسم الرئيسي</option>

                    <?php if(@count($categories) > 0){ ?>

                        <?php foreach ($categories as $c){ ?>
                            <option value="<?php echo $c['name']?>"><?php echo $c['name_arabic']?></option>


                        <?php }?>
                    <?php } ?>
                </select>

            </center>

        </div>
    </div>


</div>
<br>
<div class="d-flex justify-content-center" >
    <input type="button" class="btn btn-danger" value="بحث" style="width: 100px" onclick="alertfssl()">
</div>

<div class="adv">
    <marquee >
      اهلا ومرحبا بكم في متجرنا الإلكتروني
    </marquee>

</div>

<div class="Dailyadv">
    <div class="textSlider">
        Any Text
    </div>
    <div class="imgsSlider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/imgs/images.jpg" alt="First slide" style="height: 100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/imgs/images (1).jpg" alt="First slide" style="height: 100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/imgs/images.jpg" alt="First slide" style="height: 100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!--Advs -->
    <br><br>
    <?php for($i=0;$i<3;$i++){ ?>
    <div class="FirstSmallAdv">
        <img src="assets/imgs/images (1).jpg" alt="" height="100%" width="100%">
    </div>

    <?php } ?>



</div>


<div class="Num2adv">
    <marquee >

    Any Text
    </marquee>
</div>
    <br><br><br><br>
<?php if(@count(@$cats) > 0){ ?>
<?php for ($i=0;$i<count($cats);$i++){ ?>
<?php $sub = SelectWithTwoNodes('subCategories',array_keys($cats)[$i]); ?>


        <div class="cats">
            <center>
                <br>
                <div class="catTitle btn btn-dark" >
                    <?php echo GetCatArabicName ('categories',array_keys($cats)[$i]) ?>
                </div>
            </center>
    <br><br>
            <?php foreach ($sub as $s){ ?>
            <div class="subCats">
             <a href="pages/product.php?catid=<?php echo array_keys($cats)[$i]?>&usbcatid=<?php echo $s['name']?>">
                 <img src="<?php echo $s['img'] ?>" alt="" height="100%" width="100%">
                 <center>
                     <lable>
                         <?php echo GetSubCatArabicName ('subCategories',array_keys($cats)[$i],$s['name']) ?>

                     </lable>
                 </center>

             </a>


        </div>
            <?php } ?>
    <br><br>
</div>
<?php } ?>
<?php } ?>



<br><br><br><br><br>
</body>

<?php
require ('pages/extendable/fotter.php');

?>


<script>
    function alertfssl() {
        var fsel = document.getElementById("fsel").value;
        var ssel = document.getElementById("ssel").value;
        location.replace("pages/product.php?catid="+ fsel +"&usbcatid="+ ssel +" ");
    }

</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>


    $(document).ready(function(){
        $('#fsel').change(function(){
            var lvl = $(this).val();
            $.ajax({
                url:"pages/fetch/changeCatSession.php",
                method:"POST",
                data:{Lvl:lvl},
                dataType:"text",
                success:function(data){
                    $('#ssel').html(data);
                }
            });
        });
    });

</script>


