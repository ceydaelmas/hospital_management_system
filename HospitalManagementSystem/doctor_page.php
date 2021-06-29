<?php
include 'doctor_header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="assets/doctor_page.css">
</head>
<body>
    <div class="main_container">
        <div class="container">
        <table id="doctor_page_table">
            <tr id="topList">
                <th>Patient Namme</th>
                <th>Patient Surname</th>
                <th>Appointment IDD</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
            <?php
                $doctor_page_query=$db->prepare("SELECT DISTINCT p.patientName,p.patientSurname,a.appointmentID,a.appointmentDate,a.appointmentTime 
                FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID AND hr.diagnosisID=0 AND d.doctorTRID=:doctorTRID
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus='approved' AND a.appointmentDate<=CURDATE()
                ORDER BY a.appointmentDate, a.appointmentTime");
                $doctor_page_query->execute(array(
                    'doctorTRID'=>$_SESSION['doctorTRID']
                ));
                while ($value=$doctor_page_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/doctor_page_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><input type="text" id="appointmentIDforDoctorPage_input" name="appointmentIDforDoctorPage" value=<?php echo $value['appointmentID'];?>></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                        <td><button id="doctor_page_button"type="submit" value="test" name="testbutton" >test</button></td>
                        <td><button id="doctor_page_button"type="submit" value="conclude" name="concludebutton" >conclude</button></td>
                    </tr>
                    </form>
            <?php }?> 
        </div>
     </div>       
</body>
</html>