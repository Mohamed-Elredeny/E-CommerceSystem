<?php
require ('../php/cats.php');
?>
<link rel="stylesheet" href="../assets/css/catadd.css">
<br>
<center>
    <a href="catsadd.php"><input type="button" class="btn btn-danger" value="اضافة قسم جديد " style="width: 200px"></a>
    <a href="cats.php"><input type="button" class="btn btn-primary" value=" عرض الاقسام " style="width: 200px"></a>

</center>
<center>
    <form action="catsadd.php" method="post">
        <div class="card" >
            اضافة قسم جديد
            <div class="card-body">
                <form action="catsadd.php" method="post">
                    <table class="table" style="text-align: right;direction: rtl">

                        <tbody>
                        <tr>
                            <th scope="row">الاسم بالانجليزية</th>
                            <td>
                                <input class="btn btn-outline-primary" type="text" name="name" required style="text-align: right">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">الاسم بالعربية</th>
                            <td>
                                <input type="text" name="name_arabic" class="btn btn-outline-primary" required style="text-align: right">
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
require ('../pages/extendable/fotter.php')
?>

<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

<script>

    var firebaseConfig = {
        apiKey: "AIzaSyD5NTDeo_mn2vb2ATXumjaVmxqr47PJ2Wo",
        authDomain: "188937858497-mnlq5tad5ld4ci61pbsup6j6ar9g3bjl.apps.googleusercontent.com",
        databaseURL: "https://swcc-housing.firebaseio.com",
        projectId: "swcc-housing",
        storageBucket: "swcc-housing.appspot.com",
        appId: "1:188937858497:android:36e99361d21433aa175340\n"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


    function uploadImage() {
        const ref = firebase.storage().ref();
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
