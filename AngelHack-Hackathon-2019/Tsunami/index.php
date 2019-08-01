
<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DeepBlue</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="index.css" type="text/css">
	</head>

	<header>
		<ul>
			<li>
				<h2>DeepBlue Tsunami Relief Portal</h2>
			</li>
			<li>
			<p class="welcome"> <?php
			 $name = $_SESSION['loginName'];
			 echo "Welcome $name" ?> </p>
			</li>
			<li>
				<p class="logout"> <a href="action_logout.php"> Logout </a></p>
			</li>
			
		</ul>
	</header>
	<body>

	<center class="list">
		<div class="box">
			<p> <a href="sos.php">Access SOS Coordinates </a></p>
		</div>
		<div class="box">
			<p> <a href="donation.php"> Access Contribution and Donation Information </a></p>
		</div> 
		<div class="box">
			<p> <a href="collection.php"> Access Collection Donation Information </a></p>
		</div> 
	</center>	
	</body>
          
</html>

