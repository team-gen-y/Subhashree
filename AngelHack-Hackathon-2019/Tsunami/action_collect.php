<?php 

	session_start();

	extract($_POST);

	$servername="deepblue.cyooo8gyhpld.us-east-2.rds.amazonaws.com";
	$uname="deepblue";
	$dbname="deepblue";

	$db = mysqli_connect($servername, $uname, "Deepblue_123!",$dbname);

	$check_query = "insert into deepblue.collectdonate values('$items','$address')";
	mysqli_query($db, $check_query);

	echo "<script> window.alert('Details Sent Successfully, Collection Committee will arrive in 1-2 days. THANK YOU FOR YOUR SERVICE'); window.location ='deepblue.html'; </script>";
	
 ?>