<?php
	session_start();

	unset($_SESSION["loginName"]);

	echo "<script>
				window.alert('Logged out');
				window.location = 'login.php';
			</script>"; 
?>