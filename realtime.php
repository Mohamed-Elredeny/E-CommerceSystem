<?php
require_once 'vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
$database = $factory->createDatabase();


function SelectWithNode($tablename){
    $factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename)->getSnapshot()->getValue();
    return $result;
}
function SelectWithTwoNodes($tablename,$node1){
    $factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $node1)->getSnapshot()->getValue();
    return $result;
}





function SelectWithThree($tablename,$node1,$node2){
    $factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
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


//InsertInToDataBase('clinicCategory','alshakek','x');

///
///

//
//Add New User
//
function InsertNewUser($city,$email,$image,$name,$password,$phone){
    $notValidEmail=false;
    @$users = SelectWithNode('SystemUsers');
    if(count(@$users) > 0) {
        foreach ($users as $u) {
            if ($u['email'] == $email) {
                $notValidEmail = true;
            }
        }
    }
    if($notValidEmail == false) {
        $factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
        $database = $factory->createDatabase();
        $newPostKey = $database->getReference('Chats')->push()->getKey();

        $database->getReference('SystemUsers' . '/' . $newPostKey)
            ->set([
                'email' => $email,
                'image' => $image,
                'name' => $name,
                'password' => $password,
                'phone' => $phone,
                'isAdmin' => 'false',
                'city' => $city,
                'userId' => $newPostKey,
            ]);
    }else{
        echo "البريد الإلكتروني موجود بالفعل";
    }


}

function DelNot($userid,$postid){
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/secret/shopping-ae1ba-02d4e4c3deb4.json');

    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://shopping-ae1ba.firebaseio.com/')
        ->create();
    $database = $firebase->getDatabase();
    @$res = SelAnyTableWithOneNode('notifications',$userid);
    if(@count($res) > 0){
        foreach ($res as $r){
            if($r['postid'] == $postid){
                $database->getReference('notifications/'.$userid.'/'.$r['$saveCurrentDate'])->remove();
            }
        }
    }



}
function register($name,$email,$password,$phone)
{
    $factory = (new Factory)->withServiceAccount('secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();


    $newPostKey = $database->getReference('Users')->push()->getKey();

    //$newPostKey = $userid->uid;

    $userData = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId' =>$newPostKey,
        'image'=>'',
    ];

    $Register= [
        'Users/'.$newPostKey=>$userData,
    ];

    $addedDocRef= $database->getReference()->update($Register);





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


function GetArrayFromArray($farray,$sarray){
        $cats = SelectWithNode($farray);
        for($i = 0;$i<count($cats) ;$i++){
            if(array_keys($cats)[$i] == $sarray){
                $x =$cats[array_keys($cats)[$i]];
                for($j=0;$j<count($x);$j++){
                    $res[] = array_keys($x)[$j];
                }
                return $res;
            }
        }


}

