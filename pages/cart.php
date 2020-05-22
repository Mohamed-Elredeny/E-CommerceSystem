<?php
    require ('../php/cart.php');
    if( $_SESSION['isactive'] == 1 ) {
        @$username = GetUserName('Users',$_SESSION['userId'],'name');
                ?>
                <?php echo "<center><h2 style='direction: rtl'>اهلا " . @$username . " في عربتك</h2></center><br>" ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"
                      id="bootstrap-css">
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <!------ Include the above in your HEAD tag ---------->

                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <body onload="script()">
    <form action="cart.php" method="post">

                <div class="container" style="text-align: right;direction: rtl">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:50%">الصورة</th>
                            <th style="width:10%">السعر</th>
                            <th style="width:8%">الكمية</th>

                            <th style="width:22%" class="text-center">السعر الكلي</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(@count(@$userCart) > 0) {
                        foreach ($userCart as $u) {
                            ?>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="<?php echo $u['img']?>" alt="..."
                                                                             class="img-responsive"/></div>
                                        <div class="col-sm-10">
                                            <h4 class="nomargin"><?php echo $u['name_arabic']?></h4>
                                            <p>
                                                <?php echo $u['description']?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price" style="padding-right: 80px">
                                  <?php echo $u['price']?>
                                    <input type="hidden" value="<?php echo $u['price']?>" id="pprice<?php echo $u['Date']?>">

                                </td>
                                <td data-th="Quantity" >
                                    <input type="number" class="form-control text-center" value="1" id="amount<?php echo $u['Date']?>" onchange="myfun()">
                                </td>
                                <td data-th="Subtotal" class="text-center">
                                    <input type="text" disabled value="" id="res<?php echo $u['Date']?>" style="background: transparent;text-align: center" >
                                </td>
                                <td class="actions" data-th="">
                                    <center>
                                        <input type="hidden"  name="pid" value="<?php echo $u['Date'] ?>">

                                        <button class="btn btn-danger btn-sm" name="deleteElement" >
                                            <i class="fa fa-trash-o"></i>
                                        </button>

                                    </center>
                                </td>
                            </tr>
                        <?php } }else{
                            echo "<center><h3>لم تقم بوضع منتجات بعد في  العربة</h3></center>";
                        } ?>

                        </tbody>
                        <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong>الاجمالي 1.99</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="product.php" class="btn btn-warning">
                                   العودة للتسوق
                                </a>
                            </td>
                            <td colspan="2" class="hidden-xs">
                            </td>

                            <td class="hidden-xs text-center">
                                <strong>

                                    <input type="text" disabled value="0" id="result" style="background: transparent;text-align: center" >

                                </strong>
                            </td>
                            <td><a href="#" class="btn btn-success btn-block">تاكيد </a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
    </form>

<?php

    }else{
        header('location:login.php');
    }
    ?>
        </body>
<script>

    function script(){
        <?php
        if(@count(@$userCart) > 0) {
        foreach ($userCart as $u) {
        ?>

        var x = document.getElementById("pprice<?php echo $u['Date']?>").value;
        var y = document.getElementById("amount<?php echo $u['Date']?>").value;
        document.getElementById("res<?php echo $u['Date']?>").value = x * y;
        var result=  document.getElementById("res<?php echo $u['Date']?>").value;

        var m =  parseFloat(document.getElementById("result").value);

        m = m + parseFloat(result);
        document.getElementById("result").value = m;

        <?php
        }
        }
        ?>
        m=0;

    }

    function myfun(){
        document.getElementById("result").value = 0;
        <?php
        if(@count(@$userCart) > 0) {
        foreach ($userCart as $u) {
        ?>

        var x = document.getElementById("pprice<?php echo $u['Date']?>").value;
        var y = document.getElementById("amount<?php echo $u['Date']?>").value;
        document.getElementById("res<?php echo $u['Date']?>").value = x * y;
        var result=  document.getElementById("res<?php echo $u['Date']?>").value;

        var m =  parseFloat(document.getElementById("result").value);

        m = m + parseFloat(result);
        document.getElementById("result").value = m;
        m=0;
    <?php
        }
        }
        ?>
    }
</script>
