<?php
require ('../pages/extendable/header.php');
require_once ('realtime.php');

function login($email,$password,$submit){
    $exist=0;
    $users=0;
    $isadmin = 0;
    $isactive=0;
    $user_id='';
    if(isset($_POST["$submit"])){
        $email =htmlspecialchars($_POST['email']);
        $password =htmlspecialchars($_POST['password']);
        if($email == Null || $password == Null){
            echo 'لا يمكنك ترك الحقول فارغة<br>';
        }

        $usersTable = SelectWithNode('Users');
        foreach($usersTable as $u){
            if(@$u['email'] == $email){
                if($u['isAdmin'] == 1 ){
                    $isadmin =1;
                    $_SESSION['isadmin'] =$isadmin;
                }
                $user_id = $u['userId'];
                $_SESSION['userId']=$user_id;
                $users++;

            }
        }

        if($users>0){
            if($usersTable[$user_id]['password'] == $password){
                $exist=1;
                $isactive=1;
                $_SESSION['isactive']=$isactive;

            }else{
                echo "password is wrong";
            }
        } else{
            echo "Try Again with another email ";
        }

        if($exist == 1 ){
            header('location:../index.php');
        }

    }


}

?>