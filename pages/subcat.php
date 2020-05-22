<?php
require ('../php/subcats.php');
if(isset($_GET['catname'])) {

    ?>

    <br>
    <center>
        <a href="subcatadd.php?catname=<?php echo $_GET['catname']?>"><input type="button" class="btn btn-danger" value="اضافة قسم جديد " style="width: 200px"></a>
        <a href="subcat.php?catname=<?php echo $_GET['catname']?>"><input type="button" class="btn btn-primary" value=" عرض الاقسام " style="width: 200px"></a>

    </center>
    <br><br>
    <body>
    <table class="table table-sm" style="text-align: right;direction: rtl;">
        <tr>

            <th>
                <center>قم باختيار قسم رئيسي</center>
            </th>
            <th>
                <select  class="btn btn-primary"  id="selectCat" onchange="myfun()">
                    <option value="" selected>قم باختيار قسمك</option>
                    <?php
                    if (@count(@$cats) > 0) {
                        foreach ($cats as $u) { ?>
                            <option value="<?php echo $u['name'] ?>"><?php echo $u['name_arabic'] ?></option>
                        <?php }
                    }?>
                </select>
            </th>


            <th>
                <center>ابحث عن قسم</center>
            </th>
            <th>
                <input type="text" class="btn btn-outline-primary" id="myInput" placeholder="بحث ">
            </th>


        </tr>

    </table>
    <table class="table table-sm" style="text-align: right;direction: rtl" id="myTable">
        <thead>
        <tr>
            <th scope="col">الترتيب</th>
            <th scope="col">الاسم بالعربية</th>
            <th> الاسم بالانجليزية</th>
            <th>الصورة</th>
            <th>حذف</th>
            <th>تعديل</th>

        </tr>
        </thead>
        <tbody  id="y">

        <?php $counter = 1; ?>
        <?php if (@count(@$users) > 0) { ?>

        <?php foreach ($users as $u) { ?>
            <tr>

                <td><?php echo $counter ?></td>
                <?php $counter++ ?>
                <td><?php echo $u['name'] ?></td>
                <td><?php echo $u['name_arabic'] ?></td>
                <td>
                    <img src="<?php echo $u['img'] ?>" alt="" style="width: 100px;height: 100px">
                </td>
                <td>
                    <a href="subcatdelete.php?catname=<?php echo $_GET['catname']?>&subcatname=<?php echo $u['name']?>">
                        <input type="button" class="btn btn-danger" value="حذف">
                    </a>
                </td>
                <td>
                    <a href="subcatedit.php?catname=<?php echo $_GET['catname']?>&subcatname=<?php echo $u['name']?>">
                        <input type="button" class="btn btn-primary" value="تعديل">
                    </a>
                </td>


            </tr>
        <?php } ?>
        <?php }else{
            echo "
            <tr>
           <td colspan='6'>
           <br><br>
                 <center> لا توجد اقسام فرعية بعد</center>

             </td>
            </tr>
           ";
        } ?>
        </tbody>
    </table>
    </body>

    <?php
    require('../pages/extendable/fotter.php');
}else{
    header('location:selCat.php');
}
?>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

function myfun() {
    var x =document.getElementById('selectCat').value;
    location.replace("subcat.php?catname="+x+" " );

}
</script>