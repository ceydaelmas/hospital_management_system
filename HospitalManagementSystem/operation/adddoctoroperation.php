<?php
ob_start();
session_start();
include '../connection.php';

if(isset($_POST['addDoctor'])){
    $clinicName = $_POST['clinicName'];
    $doctorTRID = isset($_POST['doctorTRID']) ? $_POST['doctorTRID']: null;
    $doctorName = isset($_POST['doctorName']) ? $_POST['doctorName']: null;
    $doctorSurname = isset($_POST['doctorSurname']) ? $_POST['doctorSurname']: null;
    $doctorEmail = isset($_POST['doctorEmail']) ? $_POST['doctorEmail']: null;
    $doctorGender = isset($_POST['doctorGender']) ? $_POST['doctorGender']: null;
    $doctorBranch = isset($_POST['doctorBranch']) ? $_POST['doctorBranch']: null;
    $doctorPosition = isset($_POST['doctorPosition']) ? $_POST['doctorPosition']: null;
    $doctorPhone = isset($_POST['doctorPhone']) ? $_POST['doctorPhone']: null;
    $doctorPassword = isset($_POST['doctorPassword']) ? $_POST['doctorPassword']: null;

    //veri tabanı ekleme işlemi
    $sorgu = $db->prepare("INSERT INTO doctor SET
    doctorTRID = ?,
    doctorName = ?,
    doctorSurname = ?,
    doctorEmail = ?,
    doctorGender = ?,
    doctorBranch = ?,
    doctorPosition = ?,
    doctorPhone = ?,
    doctorPassword = ?
    ");

    $ekle = $sorgu->execute([
    $doctorTRID, $doctorName, $doctorSurname, $doctorEmail, $doctorGender, 
    $doctorBranch, $doctorPosition, $doctorPhone, $doctorPassword
     ]);

    $sorguu = $db->prepare("INSERT INTO hospitalrelation SET
    clinicName = ?,
    doctorTRID = ?,
    patientTRID = ?,
    appointmentID = ?,
    testID = ?, 
    diagnosisID = ?
    ");
    $patientTRID = 0;
    $appointmentID = 0;
    $testID = 0; 
    $diagnosisID = 0;
    $ekle = $sorguu->execute([
        $clinicName, $doctorTRID, $patientTRID, $appointmentID, $testID, $diagnosisID
    ]);

    if($ekle){
        header('location:../admin_page.php?durum=basarili');
    }
    else{
        $hata = $sorgu->errorInfo();
        echo 'mysql hatası' .$hata[2];
    }
}
?>