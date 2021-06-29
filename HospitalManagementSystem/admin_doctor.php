<?php
include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <link rel="stylesheet" href="assets/admin_doctor.css">
</head>
<body>
		<div class="main_container">
			<div class="container">

            <div class="center">
            <input type="button" value="delete" id="delete_btn" onclick="alert('The doctor has been deleted.')">
            <a href="admin_add_doctor.php">
                <input type="button" value="add a new doctor" id="add_btn">
            </a>
		</div>
	</div>
	</div> 
</body>
</html>