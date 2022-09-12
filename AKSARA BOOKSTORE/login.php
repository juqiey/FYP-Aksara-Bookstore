<html>
<head>
	<meta name="viewport" content="width=device-width,inititla-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
		
	</head>
	
	<body>
	
		<br>
		<div class="container">
			<form action="" method="post" class="login">
				<img src= "source/LOGO.png" alt="logo" style="width: 150px;" class="center">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
				
				<div class="input-group">
					<input type="text" placeholder="Username" name="username" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" required>
				</div>
				
				<div class="input-group">
					<input type="submit" class="btn" name="logins" value="Login">
				</div>
				<h6 class="register-login-text">Dont have an account yet? <a href="registration.php" class="register-link">Register Here</a></h6>
			</form>
		</div>
	<?php
		if(isset($_POST["logins"]))
		{
			$hostname = "127.0.0.1";
			$username = "root";
			$password = "juqi1234";
			$dbname = "aksara_bookstore";
			
			$connect = mysqli_connect($hostname,$username,$password,$dbname) OR DIE ("Connection failed!");
			
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$sql = "SELECT * FROM customer WHERE custUsername = '$username' AND custPassword = '$password'";
			
			$result = mysqli_query($connect, $sql);
			
			if($result){
				if (mysqli_num_rows($result) > 0){
					echo "<script>alert('Login Successful!\\nWelcome ".$username." to AKSARA BOOKSTORE');location.href='home.php';</script>";
					//header("Location:home.php");
				}
				else{
					$sql2 = "SELECT * FROM admin WHERE adminID = '$username' AND adminPassword = '$password'";
			
					$result2 = mysqli_query($connect, $sql2);
					if($result2){
						if (mysqli_num_rows($result2) > 0){
							echo "<script>alert('Login Successful!\\nWelcome ".$username." to AKSARA BOOKSTORE');location.href='dashboard.php';</script>";
						}
						else{
							echo "<script>alert('Invalid Username/Password!');</script>";
						}
					}
				}
			}
			session_start();
			$_SESSION["custUsername"] = $username; 
		}
	?>
</body>
</html>
		
	