<?php
include 'admin_header.php';
ob_start();
session_start();
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="assets/addDoctorPage.css">
<script>
 $(function(){
     $("#selectbox").change(function(){
         var displaycourse=$("#selectbox option:selected").text();
         $("#txtresults").val(displaycourse);

     })
 })
 </script> 
</head>
<body>
		<div class="main_container">
            <div class="container">
            <div class="center">
            <h1>Add A New Doctor</h1>
                <form action="operation/adddoctoroperation.php" method="post">
                <select id="selectbox" data-selected="">
                <option value="" selected="selected" disabled="disabled">Select an Clinic</option>
                <span></span>
                <?php
    $pt_clinic_query = $db -> query("SELECT DISTINCT `clinicName` FROM `clinicadmin` ORDER BY `clinicName` ASC");
    while($satir = $pt_clinic_query -> fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$satir['adminTRID'].'">'.$satir['clinicName'].'</option>';
    }
    ?>

                </select>
  <input type = "text" name="clinicName" redonly="redonly" id="txtresults"/>
                    <div class="txt_field">
                        <input type="text" name="doctorTRID" >
                        <span></span>
                        <label>Doctor ID</label>
                    </div>
        
                    <div class="txt_field">
                        <input type="text" name="doctorName" >
                        <span></span>
                        <label>Doctor Name</label>
                    </div>
        
                    <div class="txt_field">
                        <input type="text"name="doctorSurname">
                        <span></span>
                        <label>Doctor Surname</label>
                    </div>
                    
                    <div class="txt_field">
                        <input type="text" name="doctorEmail" >
                        <span></span>
                        <label>Doctor Name</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="doctorGender" >
                        <span></span>
                        <label>Doctor Gender</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="doctorBranch" >
                        <span></span>
                        <label>Doctor Branch</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="doctorPosition" >
                        <span></span>
                        <label>Doctor Position</label>
                    </div>
                    <div class="txt_field">
                        <input type="tel" pattern="[0-9]{10}" name="doctorPhone">
                        <span></span>
                        <label>Doctor Phone</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="doctorPassword">
                        <span></span>
                        <label>Doctor password</label>
                    </div>

                    <a href="admin_add_doctor.php">
                    <button type="submit" class="sub" id="add_btn" name="addDoctor">Add doctor</button>
                    </a>

            
            </div>
		</div>
	</div>

</body>
</html>