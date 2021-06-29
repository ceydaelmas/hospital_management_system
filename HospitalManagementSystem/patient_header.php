<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\header.css">
</head>
<body>
<!--NAVBAR-->
    <!--NAVBAR-->

    <div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
			<div class="backdrop"></div>
			<div class="vertical_bar">
				<div class="profile_info">
					<div class="img_holder">
						<img src="images/patient.jpeg" alt="profile_pic">
					</div>
                    <h2 >PATIENT</h2>
                    <br>
					<p class="title"><?php echo $_SESSION['patientTRID']; ?></p>
				</div>
				<ul class="menu">
					
					<li><a href="patient_page.php">
						<span class="text">HOME</span>
					</a></li>
                    <li><a href="patient_appointment.php">
						<span class="text">APPOINTMENT</span>
					</a></li>

					<li><a href="home_page.php">
						<span class="text">LOG OUT</span>
					</a></li>
				
				</ul>

			
			</div>
		</div>

    

    <!--NAVBAR-->
    <!--NAVBAR-->
        
</body>
</html>