<?php
ob_start();
session_start();
include 'patient_header.php';
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="stylesheet" href="assets/patient_appointment.css">

</head>
<body>
    <!--navbardaki aptye href ver-->

	<div class="main_container">
		<div class="container">
        <table id="patient_page_table">
            <tr id="topList">
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>
            </tr>
            <?php
                $patient_page_query=$db->prepare("SELECT DISTINCT a.appointmentID,a.appointmentDate,a.appointmentTime, a.appointmentStatus
                FROM hospitalrelation hr JOIN patient p ON p.patientTRID=hr.patientTRID AND  p.patientTRID=:patientTRID    
                JOIN appointment a ON a.appointmentID=hr.appointmentID
                ORDER BY a.appointmentDate, a.appointmentTime");
                $patient_page_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));
                while ($value=$patient_page_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/patient_page_operation.php" method="POST"> hyku
                    <tr>
                        <td><input type="text" id="appointmentID" name="appointmentID" value=<?php echo $value['appointmentID'];?>></td>
                        <td><input type="date" id="appointmentDate" name="appointmentDate" value=<?php echo $value['appointmentDate'];?>></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <td><?php echo $value['appointmentStatus'];?></td>
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                        <td><a href ="patient_page.php"> <button id="updatebutton" value="update date" name="updatebutton">update date</button></a></td>
                        <td><button id="patient_page_button"type="submit" value="cancel" name="cancelbutton" >cancel</button></td>
                    </tr>
                    </form>
            <?php }?> 

		</div>
	 </div>

</body>
</html>