
<?php 
	session_start();
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Disaster Management</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="login.css" type="text/css">
</head>
<body>
	<header>
		<div class="main">
			<ul class="head">
			  <li><b><u>DeepBlue Tsunami Relief Portal</u></b></li>
			</ul> 
			<ul>
				<li class="activ"><a href="#">Home Login</a></li>
			</ul>
		</div>

		<div class="login">
		    <h1>Login</h1>

		    <form class="form" method="post" action="action_login.php">
		    	   <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<center><p style='color:red; text-decoration:underline;'>$error<p></center><br>";
                    }
                   ?> 
			      <input type="email" name="email" placeholder="Email ID" required/>
			      <br>
			      <input type="password" name="password" placeholder="Password" required/>
			      <br>
			      <p> <a href="#"> Forgot Password? </a> </p>
			      <input id="submit" type="submit" name="sent" value="Login">

		    </form>
		</div> 
</body>
          
</html>

<?php
    unset($_SESSION["error"]);
?>

