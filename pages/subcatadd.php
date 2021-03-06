<?php
require ('../php/subcats.php');
if(isset($_GET['catname'])) {
    ?>
    <link rel="stylesheet" href="../assets/css/subcatadd.css">
    <style>
        form .card {
            height: 320px;
        }
    </style>
    <br>
    <center>
        <a href="subcatadd.php?catname=<?php echo $_GET['catname']?>"><input type="button" class="btn btn-danger" value="اضافة قسم جديد " style="width: 200px"></a>
        <a href="subcat.php?catname=<?php echo $_GET['catname']?>"><input type="button" class="btn btn-primary" value=" عرض الاقسام " style="width: 200px"></a>

    </center>
    <center>
        <form action="subcatadd.php?catname=<?php echo $_GET['catname']?>" method="post">
            <div class="card">
                اضافة قسم فرعي جديد
                <div class="card-body">
                    <form action="subcatadd.php?catname=<?php echo $_GET['catname']?>" method="post">
                        <table class="table" style="text-align: right;direction: rtl">

                            <tbody>
                            <tr>
                                <th scope="row">الاسم بالانجليزية</th>
                                <td>
                                    <input class="btn btn-outline-primary" type="text" name="name" required
                                           style="text-align: right">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">الاسم بالعربية</th>
                                <td>
                                    <input type="text" name="name_arabic" class="btn btn-outline-primary" required
                                           style="text-align: right">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">صورة</th>
                                <td>
                                    <input type="file" class="form-control-file" id="photo1" onchange="uploadImage()"
                                           required class="btn btn-outline-primary">
                                    <input type="hidden" value="" name="img1" id="img1">
                                    <meter class="disk_d" id="disk_d1"></meter>


                                </td>
                            </tr>


                            </tbody>
                        </table>

                        <input type="submit" value="اضافة" class="btn btn-primary" name="catsadd">

                    </form>
                </div>
            </div>

        </form>

    </center>


    <?php
}else{
    header('location:subcat.php ');
}
?>
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
        const ref = firebase.storage().ref('subcats/');
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
