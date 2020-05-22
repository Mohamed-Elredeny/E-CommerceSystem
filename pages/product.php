<?php
$products = '';
require ('../php/product.php');
$categories = SelectWithNode('categories');
@$userproducts = SelectWithTwoNodes('cart',@$_SESSION['userId']);

if(isset($_GET['catid'])  and isset($_GET['usbcatid'])){

?>
<link rel="stylesheet" type="text/css" href="../assets/css/product.css">
<div class="container">
    <br>
    <h6 style="text-align: center">تغيير القسم</h6>

    <div class="row justify-content-center">
        <div class="col-sm-12 searchBox">
            <center>
                <select name=""  class="btn btn-dark" id="ssel" style="width: 150px">
                    <option value="" selected><?php echo GetSubCatArabicName('subCategories',$_GET['catid'],$_GET['usbcatid'])?>  </option>
                </select>
                <select name="" class="btn btn-dark" id="fsel" style="width: 150px">
                    <option value=""> القسم الرئيسي</option>

                    <?php if(@count($categories) > 0){ ?>

                    <?php foreach ($categories as $c){ ?>
                            <option value="<?php echo $c['name']?>"><?php echo $c['name_arabic']?></option>


                    <?php }?>
                    <?php } ?>
                </select>

                <input type="button" value="Select" class="btn btn-danger" onclick="alertfssl()">

            </center>

        </div>
    </div>
    <br>
    <h4 style="text-align: center"></h4>

</div>

<div class="products">
    <div class="right-div">


    </div>
    <div class="left-div">
        <!--Product -->

        <?php
        if(@count(@$products) > 0) {
                foreach ($products as $p) {
                    ?>
                    <!-- Card -->
                    <div class="card promoting-card">

                        <!-- Card Header -->
                        <div>

                            <!-- Title -->

                            <!-- Subtitle -->
                            <p class="card-text" style="text-align: left">
                                <i class="far fa-clock pr-2" style="font-size: 12px;">
                                    <?php echo @$p['Date'] ?>
                                </i>
                            </p>
                            <h4 class="card-title font-weight-bold mb-2 justify-content center">
                                <center><?php echo @$p['name_arabic'] ?></center>
                            </h4>

                        </div>

                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top rounded-0"
                                 src="<?php echo @$p['img'] ?>"
                                 alt="Card image cap"
                                 style="height: 180px">
                            <a href="#!" name="img1">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>


                        <!-- Card content -->
                        <p style="overflow-y: scroll;height: 100px">
                            <?php echo @$p['description'] ?>
                        </p>
                        <h4>
                            <center><?php echo $p['price'] . "$" ?></center>
                        </h4>
                        <br>
                        <form action="product.php?catid=<?php $p['category'] ?>&usbcatid=<?php $p['subccategory'] ?>"
                              method="POST">

                            <input type="hidden" value="<?php echo $p['Date'] ?>" name="productid">
                            <input type="hidden" value="<?php echo $p['subccategory'] ?>" name="subcat">
                            <input type="hidden" value="<?php echo $p['category'] ?>" name="cat">
                            <input type="hidden" value="<?php echo $p['name'] ?>" name="name">
                            <input type="hidden" value="<?php echo $p['name_arabic'] ?>" name="name_arabic">
                            <input type="hidden" value="<?php echo $p['description'] ?>" name="description">
                            <input type="hidden" value="<?php echo $p['price'] ?>" name="price">
                            <input type="hidden" value="<?php echo $p['color'] ?>" name="color">
                            <input type="hidden" value="<?php echo $p['img'] ?>" name="img1">
                            <br>
                            <input type="number"  value="1" class="btn btn-outline-dark" name="amount">
                            <input type="button" value="تفاصيل" class="btn btn-danger" data-toggle="modal"
                                   data-target="#exampleModalCenter<?php echo $p['Date'] ?>">
                            <input type="submit" value="اضافة الي العربة" class="btn btn-dark" name="addtocart">
                        </form>

                    </div>
                    <!-- Card -->
                <?php }

        }else{
            echo "<center><h5>لم يتم عرض منتجات بعد</h5></center>
                <br><br><br>";
        }?>
        <!-- End of product -->
    </div>

</div>


<br><br><br><br>
<br><br>

    <h5 style="text-align: center">منتجات مشابهة</h5>
<div class="AnotherCats">
    <?php for ($i = 0; $i < 10; $i++) { ?>
        <div class="cat">
            <a href="">
                <center>
                    <img src="../assets/imgs/1.jpg" alt="" height="90%">
                    القسم الاول
                </center>
            </a>

        </div>
    <?php }
    } else{
   header('location:../index.php');
    }?>
</div>
<?php if(@count($products) > 0){ ?>
<?php foreach ($products as $post){ ?>
    <!-- Modal -->
    <div class="real-post">
        <div class="modal fade" id="exampleModalCenter<?php echo $post['Date']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog">

                <div  class="modal-content " >
                    <h6 style="text-align: left">
                       <?php echo $post['Date']?>
                    </h6>
                    <div class="modal-header row justify-content-center " >

                        <?php echo @$post['name_arabic'] ?>

                    </div>

                    <div class="modal-header row justify-content-md-center" style="height: 300px">


                        <img src="<?php echo $post['img']?>" alt="" width="100%" height="100%">

                    </div>

                    <div>
                        <div class="det" style="text-align: right;direction: rtl">
                            <h5>
                                التفاصيل
                            </h5>
                            <p dir="ltr|rtl|auto" class="parayarab">
                                <?php echo $post['description'] ?>
                            </p>
                        </div>

                    </div>

                    <div  class="modal-content " >
                        <br>
                        <center>
                            <table style="text-align: center;direction: rtl" width="50%">

                                <tr>
                                    <th>
                                        لون المنتج
                                    </th>
                                    <td>
                                        <?php echo $post['color']?>
                                    </td>

                                </tr>
                                <tr>
                                    <th>
                                        سعر المنتج
                                    </th>
                                    <td>
                                        <?php echo $post['price'] . "$"?>
                                    </td>

                                </tr>

                            </table>

                        </center>

                        <br>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger d-flex justify-content-center" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<?php } ?>
<!--One Product -->


<script>
    function alertfssl() {
        var fsel = document.getElementById("fsel").value;
        var ssel = document.getElementById("ssel").value;
        location.replace("product.php?catid="+ fsel +"&usbcatid="+ ssel +" ");
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
                url:"fetch/changeCatSession.php",
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

