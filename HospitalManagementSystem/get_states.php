<?php
require_once('db.php');
$country_id = $_POST['country_id'];
$state_id = $_POST['state_id'];
if($country_id!='')
{
	$states_result = $conn->query('SELECT DISTINCT d.doctorBranch, d.doctorTRID
	FROM doctor d, clinicadmin c,hospitalrelation hr 
	WHERE hr.doctorTRID = d.doctorTRID and  hr.clinicName = c.clinicName  and c.adminTRID ='.$country_id.'');
	 
	$options = "<option value=''>Select State</option>";
	while($row = $states_result->fetch_assoc()) {
	$options .= "<option value='".$row['doctorTRID']."'>".$row['doctorBranch']."</option>";
	}
	echo $options;
}
if($state_id!='')
{
	$name_result = $conn->query('SELECT DISTINCT d.doctorName, adminTRID
	FROM doctor d, clinicadmin c,hospitalrelation hr 
	WHERE hr.doctorTRID = d.doctorTRID and  hr.clinicName = c.clinicName and d.doctorTRID ='.$state_id.'');
	 
	$optionss = "<option value=''>Select State</option>";
	while($row = $name_result->fetch_assoc()) {
	$optionss .= "<option value='".$row['adminTRID']."'>".$row['doctorName']."</option>";
	}
	echo $optionss;
}


?>