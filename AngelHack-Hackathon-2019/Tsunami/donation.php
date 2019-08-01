<?php 

	session_start();
	$servername="deepblue.cyooo8gyhpld.us-east-2.rds.amazonaws.com";
	$uname="deepblue";
	$dbname="deepblue";

	$db = mysqli_connect($servername, $uname, "Deepblue_123!",$dbname);

	$query = "select * from deepblue.barter";

	$result = mysqli_query($db,$query);

	echo"<h2> Donated Products </h2>";

	echo "<table border=1 align='center'>"; // start a table tag in the HTML
	echo "<tr><td>Rice</td><td>Water</td><td>Clothes</td><td>Medicines</td><td>Bread</td><td>Total Amount</td></tr>";

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['rice'] . "</td><td>" . $row['water'] . "</td><td>" . $row['clothes'] . "</td><td>" . $row['medicines'] . "</td><td>" . $row['bread'] . "</td><td> Rs " . $row['total'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>";
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> Donation Details </title>
 	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
 	<style type="text/css">
 		td {
 			padding: 10px 10px 10px 10px;
 		}

 		h2 {
 			text-align: center;
 			margin-top: 200px;
 			font-weight: bold;
 		}

 		table {
 			float: left;
 			text-align: center;
 			align-content: center;
 			align-self: center;
 			margin-top: 20px;
 			margin-left: 440px;
 		}

 		body {
 			background : url('wave.jpg');
 		}
 	</style>
 </head>
 <body>
 
 </body>
 </html>