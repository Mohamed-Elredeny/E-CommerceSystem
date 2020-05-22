<?php
require_once '../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
$database = $factory->createDatabase();



function SelectWithNode($tablename){
    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename)->getSnapshot()->getValue();
    return $result;
}
function SelectWithTwoNodes($tablename,$node1){
    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $node1)->getSnapshot()->getValue();
    return $result;
}

function SelectWithThree($tablename,$node1,$node2){
    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename.'/'.$node1.'/'.$node2)->getSnapshot()->getValue();
    return $result;
}

function InsertInToDataBase($tableName,$country,$clinic){
    $factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();

    $database->getReference($tableName.'/'.$country.'/'.$clinic)
        ->set([
            'arabicName' => 'My Application',
            'clinicDetails' =>[
                'ss' =>'..'
            ],
            'doctorDescription'=>'',
            'doctorName'=>'',
            'englishName'=>'',
            'image'=>'',
            'requestsTime'=>[
                't'=>'..',
            ],
            'workTimeFrom'=>'',
            'workTimeTo'=>'',
        ]);
}
function InsertNewUser($email,$image,$name,$password,$phone,$id){

        $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
        $database = $factory->createDatabase();
        $newPostKey = $id;

        $database->getReference('Users' . '/' . $newPostKey)
            ->set([
                'email' => $email,
                'image' => $image,
                'name' => $name,
                'password' => $password,
                'phone' => $phone,
                'isAdmin' => 0,
                'userId' => $newPostKey,
            ]);

}

function InsertOneNode($table,$fnode,$name,$namearab){

        $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
        $database = $factory->createDatabase();
       // $newPostKey = $database->getReference('categories')->push()->getKey();

        $database->getReference($table.'/'.$fnode )
            ->set([
                'name' => $name,
                'name_arabic' => $namearab,
            ]);


}
function InsertTwoNodes($table,$cat,$name,$namearab,$img){

    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    // $newPostKey = $database->getReference('categories')->push()->getKey();

    $database->getReference($table.'/'.$cat.'/'.$name )
        ->set([
            'name' => $name,
            'name_arabic' => $namearab,
            'img'=>$img
        ]);


}
function InsertNewProduct($table,$cat,$subcat,$arabicname,$description,$price,$color,$img){

    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $saveCurrentDate = date("M d, yy  h:i:s a");

    $database->getReference($table.'/'.$cat.'/'.$subcat.'/'.$saveCurrentDate )
        ->set([
            'name' => $subcat,
            'name_arabic' => $arabicname,
            'img'=>$img,
            'description'=>$description,
            'price'=>$price,
            'color'=>$color,
            'Date'=>$saveCurrentDate,
            'category'=>$cat,
            'subccategory'=>$subcat
        ]);


}

function AddToCart($table,$cat,$subcat,$name,$arabicname,$description,$price,$color,$img,$userid,$productid,$amount){

    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
   //$saveCurrentDate = date("M d, yy  h:i:s a");

    $database->getReference($table.'/'.$userid.'/'.$productid)
        ->set([
            'name' => $name,
            'name_arabic' => $arabicname,
            'img'=>$img,
            'description'=>$description,
            'price'=>$price,
            'color'=>$color,
            'Date'=>$productid,
            'category'=>$cat,
            'subcategory'=>$subcat,
            'amount'=>$amount
        ]);


}

//InsertNewUser();
///
//InsertNewUser('Damanhour','mohamed1@yahoo.com','','mohamed','mohamed123','01068298958');


function DelNot($userid){

    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();


    @$res = SelectWithTwoNodes('categories',$userid);
    if(@count($res) > 0){
        foreach ($res as $r){
                $database->getReference('categories/'.$userid)->remove();

        }
    }



}
function DelTwoNodes($fnode,$snode){
    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();

    $database->getReference('subCategories/'.$fnode.'/'.$snode)->remove();

}
function AbstractDelTwoNodes($table,$fnode,$snode){
    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();

    $database->getReference($table.'/'.$fnode.'/'.$snode)->remove();

}

function register($name,$email,$password,$phone)
{
    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();

    $auth = $factory->createAuth();

    $newuser =$auth->createUserWithEmailAndPassword($email,$password) ;
    $userid = $auth->getUserByEmail($email);
    //$newPostKey = $database->getReference('Users')->push()->getKey();

    $newPostKey = $userid->uid;

    $userData = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId' =>$newPostKey,
        'image'=>'',
        'isAdmin'=>0
    ];

    $Register= [
        'Users/'.$newPostKey=>$userData,
    ];

    $addedDocRef= $database->getReference()->update($Register);



    //  $auth->createUserWithEmailAndPassword($email,$password) ;


}
function modify($name,$email,$password,$phone,$documentid,$img1){
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/secret/shopping-ae1ba-02d4e4c3deb4.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://shopping-ae1ba.firebaseio.com/')
        ->create();
    $database = $firebase->getDatabase();


    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId'=>$documentid,
        'image'=>$img1,

    ];
    $Register= [
        'Users/'.$documentid=>$data,
    ];

    $addedDocRef= $database->getReference()->update($Register);

    return $addedDocRef;
    //$this->db->collection('Users')->document($documentid)->set($data);
}



function modifyCat($name,$namearab){

    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();



    $data = [
        'name' => $name,
        'name_arabic' => $namearab,

    ];
    $Register= [
        'categories/'.$name=>$data,
    ];

    $addedDocRef= $database->getReference()->update($Register);

    return $addedDocRef;
    //$this->db->collection('Users')->document($documentid)->set($data);
}
function modifySubCat($cat,$name,$namearabic,$img){

    $factory = (new Factory)->withServiceAccount('../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();



    $data = [
        'name' => $name,
        'name_arabic' => $namearabic,
        'img'=>$img

    ];
    $Register= [
        'subCategories/'.$cat.'/'.$name=>$data,
    ];

    $addedDocRef= $database->getReference()->update($Register);

    return $addedDocRef;
}

//Get Cat Arabic Name
function GetCatArabicName($tableName,$name)
{
    $res = SelectWithNode($tableName);
    return $res[$name]['name_arabic'];
}

//Get Sub CatName
function GetSubCatArabicName($tableName,$cat,$name)
{
    $res = SelectWithTwoNodes($tableName, $cat);
    return $res[$name]['name_arabic'];
}
//Get User Name with id
function GetUserName($tableName,$cat,$name)
{
    $res = SelectWithTwoNodes($tableName, $cat);
    return $res[$name];
}