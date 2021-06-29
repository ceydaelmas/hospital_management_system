<?php

ob_start();
session_start();


include '../connection.php';

if(isset($_POST['doctorTRID']) && isset($_POST['doctorPassword']) ) {
    $doctorTRID = $_POST['doctorTRID'];
    $doctorPassword =$_POST['doctorPassword'];

    if(empty($doctorTRID)){
        header("Location:../doctor_login.php?error=Email is required");    
    }
    else if(empty($doctorPassword)){
        header("Location:../doctor_login.php?error=Password is required"); 

    }
    else{

        $doctorsor = $db->prepare("SELECT * FROM doctor WHERE doctorTRID=? and doctorPassword=?"); 

        $doctorsor->execute([$doctorTRID,$doctorPassword]);

        if($doctorsor->rowCount()==1){
            $_SESSION['doctorTRID']=$doctorTRID;
            header('location:../doctor_page.php?durum-girisbasarili');
            exit;
        }

        else{
           /*alert eklenecek*/
            header('location:../doctor_login.php?durum-girisbasarisiz');

        }

    }



}

?>