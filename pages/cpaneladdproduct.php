<?php
require ('../php/cpaneladdproduct.php');
?>
<style>
   body{
       overflow-x: hidden;
   }
</style>
<div class="addproduct">
    <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-7" style="text-align: right;direction: rtl">
            <center>
                <h2>اضافة منتج جديد</h2>
            </center>
            <form method="post" action="cpaneladdproduct.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم  المنتج بالانجليزية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="ادخل اسم المنتج باللغه الانجليزية" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم  المنتج بالعربية</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ادخل اسم المنتج باللغه العربية" name="name_arabic" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">وصف المنتج</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ادخل وصف مناسب لمنتجك" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">   سعر المنتج</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="ادخل سعر المنتج " name="price" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">   لون المنتج</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ادخل لون المنتج  " name="color" required>
                </div>
                <div class="form-group">
                    <select class="custom-select" name="cat" required id="fsel">
                        <option selected>القسم الرئيسي</option>
                       <?php if(@count(@$cats) > 0) { ?>
                           <?php foreach ($cats as $c) { ?>
                               <option value="<?php echo $c['name']?>"><?php echo $c['name_arabic']?></option>

                           <?php } ?>
                       <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="custom-select" name="subcat" required id="ssel">
                        <option selected>القسم الفرعي</option>

                    </select>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="photo1" onchange="uploadImage()"
                           required class="btn btn-outline-primary">
                    <input type="hidden" value="" name="img1" id="img1">
                    <meter class="disk_d" id="disk_d1"></meter>

                </div>

                <div class="form-group">
                    <br>
                    <center>
                        <button type="submit" class="btn btn-danger" name="addproduct" style="width: 150px">اضافة</button>

                    </center>
                </div>
            </form>

        </div>

    </div>
</div>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

<script>

    var firebaseConfig = {
        apiKey: "AIzaSyCqzfR3sV8NE55eUDY6RSfgIxl1hli_Oy8",
        authDomain: "450947081344-3kkpfl0l7s6t1ldgo545bnq6m63p6hob.apps.googleusercontent.com",
        databaseURL: "https://shopping-ae1ba.firebaseio.com",
        projectId: "shopping-ae1ba",
        storageBucket: "shopping-ae1ba.appspot.com",
        appId: "1:450947081344:android:e145ecb051e227cb4b7265"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


    function uploadImage() {
        const ref = firebase.storage().ref('products/');
        const file = document.querySelector("#photo1").files[0];
        const name = +new Date() + "-" + file.name;
        const metadata = {
            contentType: file.type
        };
        const task = ref.child(name).put(file, metadata);
        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                console.log(url);
                document.querySelector("#img1").value = url;
                document.querySelector("#disk_d1").value = 1;
            })
            .catch(console.error);
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

