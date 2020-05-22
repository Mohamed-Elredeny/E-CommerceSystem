<?php
require ('../php/cats.php');
?>

<br>
<center>
    <a href="catsadd.php"><input type="button" class="btn btn-danger" value="اضافة قسم جديد " style="width: 200px"></a>
    <a href="cats.php"><input type="button" class="btn btn-primary" value=" عرض الاقسام " style="width: 200px"></a>

</center>
<br><br>
<table class="table table-sm" style="text-align: right;direction: rtl;">
    <tr >

        <th>
            <center>ابحث عن قسم</center>
        </th>
        <th >
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
        <th>حذف</th>
        <th>تعديل</th>

    </tr>
    </thead>
    <tbody>

    <?php $counter=1; ?>
    <?php foreach ($users as $u){ ?>
        <tr>

            <td ><?php echo  $counter?></td>
            <?php $counter++ ?>
            <td><?php echo  $u['name'] ?></td>
            <td><?php echo $u['name_arabic'] ?></td>

            <td>
                <a href="catsedit.php?DelId=<?php echo $u['name'] ?>">
                    <input type="button" class="btn btn-danger" value="حذف">
                </a>
            </td>
            <td>
                <a href="catsedit.php?CurentPopId=<?php echo $u['name'] ?>">
                    <input type="button" class="btn btn-primary" value="تعديل">
                </a>
            </td>


        </tr>
    <?php } ?>
    </tbody>
</table>


<?php
require ('../pages/extendable/fotter.php')
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
