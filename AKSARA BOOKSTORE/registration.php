<?php 

$server = "127.0.0.1";
$user = "root";
$pass = "juqi1234";
$database = "aksara_bookstore";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$pnumber = $_POST['pnumber'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM customer WHERE custUsername='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO customer (custName, custEmail, custPhoneNo, custAddress, custUsername, custPassword)
					VALUES ('$fname', '$email', '$pnumber', '$address', '$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.');location.href='login.php'</script>";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} 
		else {
			echo "<script>alert('Woops! Username Already Exists.')</script>";
		}
		
	} 
	else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>AKSARA BOOKSTORE</title>
		<meta name="viewport" content="width=device-width,inititla-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
		<link rel="stylesheet" type="text/css" href="css/RegStyle.css">
	</head>
	
	<body>
		<div class="container">
			<center><img src="source/LOGO.png" class="nav-logo" style="width: 150px;"></center>
			<form class="login-email" method="post">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Registration</p>
				<div class="input-group">
					<input type="text" placeholder="Full Name" name="fname" value="<?php echo $fname; ?>" required>
				</div>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Phone Number" name="pnumber" value="<?php echo $pnumber; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Address" name="address" value="<?php echo $address; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Confirmation Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>"required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn" onclick="location.href='login.php'">Register</button>
				</div>
				<p class="login-register-text">Already have an account? <a href="login.php">Log In Here</a></p>
			</form>
		</div>
	</body>
</html>