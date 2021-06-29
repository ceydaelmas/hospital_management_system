<?php
ob_start();
session_start();
include 'admin_header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/admin_page.css">
</head>
<body>   
    
 <div class="main_container">   
                <div class="column">
                  <div class="card_content">
                  <br>
                        <h3>TOTAL DOCTOR</h3> 
                        <br>
                        <!--retrieve total doctor-->
                        <?php
                $admin_totaldoctorquery=$db->prepare("SELECT COUNT( DISTINCT doctorTRID) AS totalDoctor FROM 
                hospitalrelation 
                WHERE clinicName='Otorhinolaryngology'");
                $admin_totaldoctorquery->execute();
                while ($value=$admin_totaldoctorquery->fetch(PDO::FETCH_ASSOC)){?>
                        <p><?php echo $value['totalDoctor'];?></p>
            <?php } ?> 
                  </div>
                </div>


               <div class="column">
                    <div class="card_content">
                    <br>
                        <h3>TOTAL PATIENT</h3>  
                        <br>
                        <!--retrieve total patient-->
                        <?php
                $admin_totalpatientquery=$db->prepare("SELECT COUNT( DISTINCT patientTRID) AS totalPatient FROM 
                hospitalrelation WHERE clinicName='Otorhinolaryngology'");
                $admin_totalpatientquery->execute();
                while ($value=$admin_totalpatientquery->fetch(PDO::FETCH_ASSOC)){?>
                        <p><?php echo $value['totalPatient'];?></p>
            <?php } ?>      
                        </div>
                     </div>


                <div class="column">
                    <div class="card_content">
                    <br>
                         <h3>TOTAL APPOINTMENT</h3>
                         <br>
                        <!--retrieve total appointment-->
                        <?php
                $admin_totalappointmentquery=$db->prepare("SELECT COUNT(DISTINCT a.appointmentDate) AS totalAppointment 
                FROM appointment a 
                JOIN hospitalrelation h ON h.appointmentID=a.appointmentID AND h.clinicName='Otorhinolaryngology'
                WHERE a.appointmentDate IN 
                (SELECT a.appointmentDate
                FROM appointment a
                WHERE DATE(a.appointmentDate) >= CURDATE());");
                $admin_totalappointmentquery->execute();
                while ($value=$admin_totalappointmentquery->fetch(PDO::FETCH_ASSOC)){?>
                        <p><?php echo $value['totalAppointment'];?></p>
            <?php } ?>      
                    </div>
                </div>
        
       <!--patients table-->

           <table id="patients">
  <tr id="topList">
    <th>Patient ID</th>
    <th>Patient Name</th>
    <th>Patient Surname</th>
    <th>Past Year Appointment Number</th>
  </tr>
  <!--retrieve past appointment-->
  <?php
                $admin_pastappointmentquery=$db->prepare("SELECT p.patientTRID, p.patientName , p.patientSurname, COUNT(DISTINCT hr.appointmentID) AS pastAppointmentNumber 
                FROM patient p, hospitalrelation hr, appointment a 
                WHERE p.patientTRID=hr.patientTRID AND hr.appointmentID IN (SELECT a.appointmentID 
                FROM appointment a 
                WHERE YEAR(a.appointmentDate) = YEAR(CURDATE()) - 1 ) 
                GROUP BY hr.patientTRID 
                ORDER BY COUNT(hr.appointmentID)");
                $admin_pastappointmentquery->execute();
                while ($value=$admin_pastappointmentquery->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $value['patientTRID'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><?php echo $value['pastAppointmentNumber'];?></td>
                    </tr>
            <?php } ?>
  
        </table>  
  </div>  

</body> 
      
</body>
</html>