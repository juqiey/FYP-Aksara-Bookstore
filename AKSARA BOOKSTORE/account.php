<!DOCTYPE html>
<html>
<head>
	<title>AKSARA BOOKSTORE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" type="text/css" href="css/accountStyle.css">
</head>
<body>
	<!------------------------Header - DON'T EDIT ANYTHING HERE------------------------------>
	<header>
		<nav class="header-nav">
			<img src="source/LOGO.png" class="nav-logo">
			<ul>
				<li class="nav-main"><a href="home.php">Home</a></li>
				<li class="nav-main"><a href="about.php">About</a></li>
				<li class="nav-main"><a href="contact.php">Contact Us</a></li>
			</ul>
			<ul>
				<li><a href="search.php"><i class="uil uil-search nav-icon"></i></a></li>
				<li><a href="cart.php"><i class="uil uil-shopping-cart nav-icon"></i></a></li>
				<li class="nav-main"><a href="account.php"><i class="uil uil-user nav-icon"></i></a></li>
			</ul>
		</nav>
		
		<nav class="header-nav-overflow">
			<img src="source/LOGO.png" class="nav-logo">
			<ul>
				<li><a href="search.php"><i class="uil uil-search nav-icon"></i></a></li>
				<li><a href="cart.php"><i class="uil uil-shopping-cart nav-icon"></i></a></li>
			</ul>
		</nav>
	</header>
		<!----------------------------------!!!!!!!!!!!-------------------------------------->
	
	<?php
		session_start();
		$hostname = "127.0.0.1";
		$user = "root";
		$password = "juqi1234";
		$dbname = "aksara_bookstore";
		
		$connect = mysqli_connect($hostname, $user, $password, $dbname) OR DIE ("Connection failed");
		
		$custUsername = $_SESSION["custUsername"];
		
		$sql = "SELECT * FROM customer WHERE custUsername = '$custUsername'";
		$qry = mysqli_query($connect,$sql);	
		
		if($qry){
			foreach($qry as $row){
	?>
	
	
	<!----------------------------------CONTENT HERE-------------------------------------->
	<section class="container"> <!--Part ni nnti boleh je tukar-->
		<form action="" method="post" class="UserDetail">
				
				<p class="user-text" style="font-size: 2rem; font-weight: 800; text-align: center;">USER DETAILS</p>
				
				<div class="input-group">
					<input type="text" placeholder="Name" name="name" required value="<?php echo $row['custName']; ?>">
				</div>
				<div class="input-group">
					<textarea id="address" name="address" rows="4" cols="50" placeholder="Address" required><?php echo $row['custAddress']; ?></textarea>
				</div><br><br>
				<div class="input-group">
					<input type="text" placeholder="Phone Number" name="numPhone" required value="<?php echo $row['custPhoneNo']; ?>">
				</div>
				<div class="input-group">
					<input type="text" placeholder="Email" name="email" required value="<?php echo $row['custEmail']; }}?>">
				</div>
				<div class="input-group">
					<button name="update" class="btn">Update Details</button>
				</div>
				<div class="input-group">
					<button name="logout" class="btn">Log Out</button>
				</div>
			</form>
	</section>
	
	<?php
		$sql = "SELECT * FROM customer WHERE custUsername = '$custUsername'";
		$qry = mysqli_query($connect,$sql);	
					
		$data = mysqli_fetch_array($qry); // fetch data
							
		if(isset($_POST["update"])){
			
			$name = $_POST["name"];
			$address = $_POST["address"];
			$phoneno = $_POST["numPhone"];
			$email = $_POST["email"];

			$sql2 = "UPDATE customer SET custName='$name', custAddress='$address', custPhoneNo='$phoneno', custEmail='$email' WHERE custUsername='$custUsername'";
			$sendsql = mysqli_query($connect,$sql2);	

			if ($sendsql) {
				mysqli_close($connect); // Close connection
				echo "<script>window.open('account.php','_self');</script>";
			}
			else
			{
				echo mysqli_error();
			} 
		}
		
		if(isset($_POST["logout"])){
			header('Location:index.php');
		}
	?>
	

	
	
	<!--------------------------Footer - DON'T EDIT ANYTHING HERE---------------------------->
	<footer>
		<div class="footer-container">
			<div class="footer-company-info">
				<div class="footer-company-logo">
					<img src="source/LOGO.png" class="footer-logo">
					<h2 class="footer-company-name">AKSARA BOOKSTORE</h2>
				</div>
				<p>Lot 1864,<br>Jalan Ismail Petra,<br>17500 Tanah Merah,<br>Kelantan<br>
				Phone: +60 9-955 7907<br>
				Email: sales@aksara.store</p>
			</div>
			<div class="footer-social">
				<h4 class="footer-social-title">Follow Us</h4>
				<div class="footer-social-content">
					<a href=""><i class="uil uil-facebook-f footer-social-icon"></i></a>
					<a href=""><i class="uil uil-instagram footer-social-icon"></i></a>
					<a href=""><i class="uil uil-envelope-alt footer-social-icon"></i></a>
				</div>
			</div>
		</div>
	
		<div class="footer-group-info">
			<a href="groupinfo.php" class="footer-group-info-link">Group Member's Information</a>
		</div>
	</footer>
	
	<div class="navigation-menu">
		<nav class="footer-nav">
			<ul>
				<li><a href="home.php"><i class="uil uil-estate footer-nav-icon"></i>Home</a></li>
				<li><a href="about.php"><i class="uil uil-info-circle footer-nav-icon"></i>About</a></li>
				<li><a href="contact.php"><i class="uil uil-phone-alt footer-nav-icon"></i>Contact Us</a></li>
				<li><a href="account.php"><i class="uil uil-user footer-nav-icon"></i>Account</a></li>
			</ul>
		</nav>
	</div>
</body>
</html>