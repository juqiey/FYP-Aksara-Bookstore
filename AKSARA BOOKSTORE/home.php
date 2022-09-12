<!DOCTYPE html>
<html>
<head>
	<title>AKSARA BOOKSTORE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
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
	
	
	
	<!----------------------------------CONTENT HERE-------------------------------------->
	<section class="section-best-seller">
		<h1>BEST SELLER</h1>
		<img src="source/book-best-seller.png" class="best-seller-image">
	</section>
	
	<section class="section-recommended">
		<h2 class="recommended-title">Recommended Book</h2>
		<div class="recommended-container">
	<?php
		session_start();
		
		$hostname = "127.0.0.1";
		$username = "root";
		$password = "juqi1234";
		$dbname = "aksara_bookstore";
		
		$connect = mysqli_connect($hostname,$username,$password,$dbname) OR DIE ("Connection failed!");
		
		$sql = "SELECT * FROM book ORDER BY RAND() LIMIT 8";
	
		$sendsql = mysqli_query($connect, $sql);
		
		if($sendsql)
		{
			foreach($sendsql as $row)
			{
				echo "<div class=\"card recommended\">";
					echo "<a href=\"product.php?id={$row['bookISBN']}\">";
					echo "<img class=\"recommended card-img-top\" src=\"data:image;base64,". base64_encode($row["bookImage"]) ."\" alt=\"Card image\">";
					echo "<div class=\"recommended card-body\">";
						echo "<h4 class=\"recommended card-title\">". $row["bookTitle"] ."</h4>";
						echo "<p class=\"recommended card-author\">" . $row["bookAuthor"] ."</p>";
						echo "<span class=\"recommended card-price\">RM" . $row["bookPrice"] . "</span></div></a>";
					echo "</div>";
			}
			echo "</div>";
		}
		else
			echo "Query failed";
		
		//$price = $_GET["orderPrice"];
		//echo "<script>alert('$price')</script>";
	?>

	</section>
	
	
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