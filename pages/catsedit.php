<?php
require ('../php/cats.php');

if(isset($_GET['CurentPopId'])){
    $oneUserDet =  SelectWithTwoNodes('categories',$_GET['CurentPopId']);
    ?>
    <link rel="stylesheet" href="../assets/css/catadd.css">

    <br>
    <center>
        <a href="catsadd.php"><input type="button" class="btn btn-danger" value="اضافة قسم جديد " style="width: 200px"></a>
        <a href="cats.php"><input type="button" class="btn btn-primary" value=" عرض الاقسام " style="width: 200px"></a>

    </center>
    <center>
        <form action="catsedit.php?CurentPopId=<?php echo $_GET['CurentPopId'] ?>" method="post">
            <div class="card">
                تعديل بيانات قسم
                <div class="card-body">
                    <table class="table" style="text-align: center;direction: rtl">

                        <tbody>
                        <tr>
                            <th scope="row">الاسم بالانجليزية</th>
                            <td>
                                <input class="btn btn-outline-primary" type="text" name="name" required style="text-align: right" value="<?php echo $oneUserDet['name'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">الاسم بالعربية</th>
                            <td>
                                <input type="text" name="name_arabic" class="btn btn-outline-primary" required style="text-align: right" value="<?php echo $oneUserDet['name_arabic'] ?>" >
                            </td>
                        </tr>



                        </tbody>
                    </table>

                    <input type="submit" value="تعديل" class="btn btn-primary" name="EditNewCus">

                </div>
            </div>

        </form>

    </center>








    <?php

    require ('../pages/extendable/fotter.php');
}else{
    header('location:cats.php');
}
?>


<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

