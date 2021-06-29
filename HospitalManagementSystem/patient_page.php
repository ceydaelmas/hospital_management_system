<?php
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
    <link rel="stylesheet" href="assets/patient_page.css">

</head>
<body>
    
    <!--navbardaki aptye href ver SELECT DISTINCT d.doctorName, d.doctorSurname,  d.doctorBranch FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID JOIN patient p ON p.patientTRID=hr.patientTRID AND p.patientTRID='12345678902' ORDER BY d.doctorName ASC
-->

	<div class="main_container">
		<div class="container">
    
        <table id="patient_doctor_table">
            <tr id="topList">
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Doctor Branch</th>
            </tr>
            <?php
                $patient_query=$db->prepare("SELECT DISTINCT d.doctorName, d.doctorSurname, d.doctorBranch 
                FROM hospitalrelation hr 
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN patient p ON p.patientTRID=hr.patientTRID AND p.patientTRID=:patientTRID 
                ORDER BY d.doctorName ASC");
                $patient_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));
        
                while ($value=$patient_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['doctorBranch'];?></td>
                    </tr>
            <?php  }?> 
        </table>
<br><br><br>
        <table id="patient_doctor_table">
            <tr id="topList">
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Doctor Branch</th>
                <th>Test ID</th>
                <th>Test Name</th>
                <th>Test Date</th>
                <th>Test Result</th>

            </tr>
            <?php
                $patient_test_query=$db->prepare("SELECT DISTINCT d.doctorName, d.doctorSurname, d.doctorBranch, t.testID, t.testName, t.testDate ,t.testResult
                FROM hospitalrelation hr 
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN test t ON t.testID=hr.testID 
                JOIN patient p ON p.patientTRID=hr.patientTRID AND p.patientTRID=:patientTRID
                ORDER BY d.doctorName ASC");
                $patient_test_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));
        
                while ($value=$patient_test_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['doctorBranch'];?></td>
                        <td><?php echo $value['testID'];?></td>
                        <td><?php echo $value['testName'];?></td>
                        <td><?php echo $value['testDate'];?></td>
                        <td><?php echo $value['testResult'];?></td>

                    </tr>
            <?php  }?> 
        </table>

    </div>

		
	 </div>

</body>
</html>