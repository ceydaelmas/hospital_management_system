<?php
include '../connection.php';
if(isset($_POST['updatebutton'])){
    $appointmentID=$_POST['appointmentID'];
    $appointmentDate= $_POST['appointmentDate'];
    $admin_test_query=$db->prepare("UPDATE appointment SET appointmentDate=?  where appointmentID=?");
    $admin_test_query->execute([$appointmentDate,$appointmentID]);
    header ("Location:../patient_appointment.php");

}

?>
