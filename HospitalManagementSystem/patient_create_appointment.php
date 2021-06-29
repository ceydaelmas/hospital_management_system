<?php
include 'patient_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>
    <link rel="stylesheet" href="assets/patient_create_appointment.css">
    <!--<script src ="http://code.jquery.com/jquery-2.1.4.min.js"> </script>--> 
</head>
<body>

    <!--randevu ekle butonu oluştur.-->

	<div class="main_container">
		<div class="container">

        <?php
require_once('db.php');
$country_result = $conn->query('select * from clinicadmin');
?>

<select name="country" id="countries-list">
		<option value="">Select Country</option>
		<?php
		if ($country_result->num_rows > 0) {
    // output data of each row
    while($row = $country_result->fetch_assoc()) {
    	?>
        <option value="<?php echo $row["adminTRID"]; ?>"><?php echo $row["clinicName"]; ?></option>
        <?php
    }
}
?>
		</select>
</br></br></br>
		<select name="state" id="states-list">
			<option value=''>Select State</option>
		</select>

		</br></br></br>
		<select name="name" id="name-list">
			<option value=''>Select Name</option>
		</select>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
$('#countries-list').on('change', function(){
    var country_id = this.value;
    $.ajax({
	type: "POST",
	url: "get_states.php",
	data:'country_id='+country_id,
	success: function(result){
		$("#states-list").html(result);
	}
	});
});

$('#states-list').on('change', function(){
    var state_id = this.value;
    $.ajax({
	type: "POST",
	url: "get_states.php",
	data:'state_id='+state_id,
	success: function(result){
		$("#name-list").html(result);
	}
	});
});

</script>

		</div>
	 </div>
    
    

    
</body>
</html>