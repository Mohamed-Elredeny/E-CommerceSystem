<?php
$products = '';
require ('../php/favorite.php');
$categories = SelectWithNode('categories');


?>
<link rel="stylesheet" type="text/css" href="../assets/css/product.css">
<div class="container">
    <br>

    <div class="row justify-content-center">
        <div class="col-sm-12 searchBox">
            <center>
              <h4>  منتجاتي المفضلة</h4>
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
                        <h4 class="card-title font-weight-bold mb-2 justify-content center">
                            <center><?php echo @$p['name'] ?></center>
                        </h4>
                        <!-- Subtitle -->
                        <p class="card-text"><i class="far fa-clock pr-2"></i><?php echo @$p['Date']?></p>

                    </div>

                    <!-- Card image -->
                    <div class="view overlay">
                        <img class="card-img-top rounded-0"
                             src="<?php echo @$p['img'] ?>"
                             alt="Card image cap"
                             style="height: 180px">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>


                    <!-- Card content -->
                    <p style="overflow-y: scroll;height: 100px">
                        <?php echo @$p['description'] ?>
                    </p>
                    <br>
                    <input type="button" value="Add To Favorite" class="btn btn-outline-dark">
                    <input type="button" value="Details" class="btn btn-outline-danger">

                    <input type="button" value="Add To Cart" class="btn btn-outline-dark">

                </div>
                <!-- Card -->
            <?php }
        }?>
        <!-- End of product -->
    </div>

</div>


<br><br>

<script>
    function alertfssl() {
        var fsel = document.getElementById("fsel").value;

        alert(fsel);
    }
    var fsel = document.getElementById("fsel").value;
    var ssel = document.getElementById("ssel").value;

    function redirectmepls(){
        location.replace("product.php?catid="+fsel+"&?usbcatid="+ssel+" ")
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
            var sub = $(this).val();
            $.ajax({
                url:"fetch/changeCatSession.php",
                method:"POST",
                data:{Sub:sub},
                dataType:"text",
                success:function(data){
                    $('#ssel').html(data);
                }
            });
        });
    });

</script>