<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Doctor</title>
	<link rel="stylesheet" href="assets\header.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<img src="images/doctor.jpeg" alt="profile_pic">
					</div>
                    <h2 >DOCTOR</h2>
                    <h3>Brans</h3>
                    <br>
					<p class="title"><?php echo $_SESSION['doctorTRID']; ?></p>
				</div>
				<ul class="menu">
					
                    <li><a href="doctor_page.php">
						<span class="text">HOME</span>
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