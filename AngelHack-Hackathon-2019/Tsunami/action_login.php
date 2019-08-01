<?php 

	session_start();
	$servername="deepblue.cyooo8gyhpld.us-east-2.rds.amazonaws.com";
	$uname="deepblue";
	$dbname="deepblue";

	$email = $_POST['email'];
	$password = $_POST['password'];

	$db = mysqli_connect($servername, $uname, "Deepblue_123!",$dbname);

	$check_query = "select * from deepblue.admin where email = '$email'";
	$result = mysqli_query($db, $check_query);
	$r = mysqli_fetch_assoc($result);

	if($r)
	{
		if($password != $r['password'])
		{
			$_SESSION["error"] = "Incorrect Password!";
			
			echo "<script>
				window.location = 'login.php';
			</script>";
		}
		else
		{
			$_SESSION["loginName"] = $r['name'];
			echo "<script>
				window.alert('Login Successful.');
				window.location = 'index.php';
			</script>";
		}
	}
	else
	{
		$_SESSION["error"] = "Invalid Username";
		echo "<script>
				window.location = 'login.php';
			</script>";
	}
?>