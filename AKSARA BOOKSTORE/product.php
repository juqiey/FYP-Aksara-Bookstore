<html>
<head>
	<title>PRODUCT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/styleProduct.css">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="script/scriptProduct.js"></script>
</head>
</body>
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
	<section class="content"> <!--Part ni nnti boleh je tukar-->
		<?php
			session_start();
			$username="root";
			$password="juqi1234";
			$hostName="127.0.0.1";
			$dbName="aksara_bookstore";
		
			$connect=mysqli_connect($hostName,$username,$password,$dbName);
			$custUsername=$_SESSION['custUsername'];
			
			if(isset($_GET['id'])){
				$id=mysqli_real_escape_string($connect,$_GET['id']);
				
				$sql="SELECT * FROM book b, stock s WHERE b.bookISBN='$id' AND s.bookISBN=b.bookISBN ";
				$result=mysqli_query($connect,$sql);
				$row=mysqli_fetch_assoc($result);
				$ISBN=$row['bookISBN'];
				
				echo "<h1 style=\"text-align:center; color:#E50914\">Title: ".$row['bookTitle']."</h1>";
				 
				echo "<div class=\"divContent container\">";
				
				echo "<div class=\"media\">";
				echo "<img class=\" align-self-center mr-3\" src=\"data:image;base64,". base64_encode($row["bookImage"]) ."\" ";
				echo "</div>";
				echo "<form method=\"post\"";
				echo "<div class=\"media-body\">";
				echo "<span style=\"background-color:#221f1f; padding:20px;\"class=\"row col-md-auto\">";
				echo "<h5 class=\"mt-0\">ISBN: ".$row['bookISBN']."</h5>";
				echo "<p>Author: ".$row['bookAuthor']."</p>";
				echo "<p>Genre: ".$row['bookGenre']."</p>";
				echo "<p>Year published: ".$row['bookYearPublish']."</p>";
				echo "<p>Publisher: ".$row['bookPublisher']."</p>";
				echo "<h4>Price: RM".$row['bookPrice']."</h4>";
				echo "<h5>Stock Available: ".$row['stockQuantity']."</h5>";
				echo "</span>";
				echo "<div class=\"quantity buttons_added\">";
				echo "<h5>Quantity:</h5>";
				echo "<input type=\"button\" value=\"-\" class=\"minus\"><input type=\"number\" step=\"1\" min=\"1\" max=\"\" name=\"quantity\" value=\"1\" title=\"Qty\" class=\"input-text qty text\" size=\"4\" pattern=\"\" inputmode=\"\"><input type=\"button\" value=\"+\" class=\"plus\">";
				echo "</div>";
				echo "</div>";
				
				
				echo "</div>";
				echo "</div>";
				
			
				
				
				
				
			}
			
			
			echo "<div class=\"divButton container\">";
			echo "<div class=\"col-md-1 col-sm-6 col-xs-12\">";
            echo "<button type=\"button\" class=\"btn btn-danger btn-submit-fix\" onclick=\"location.href='home.php'\">Back</button>";
			echo "</div>";
			echo "<div class=\"col-md-4 col-sm-6 col-xs-12\">";
            echo "<button type=\"submit\" class=\"btn btn-danger btn-submit-fix\" name=\"add\">Add to cart</button>";
            echo "</div>";
			echo "</div>";
			echo "</form>";
			
			if (isset($_POST['add'])) {
				$stock=$row['stockQuantity'];
				
				$quantity=$_POST['quantity'];
				
				if($stock==0||$stock<$quantity){
					echo "<script>alert('You have exceeded the quantity limit');</script>";
				}
				else{
					$date=date('Y-m-d');
					$totalPrice=$row['bookPrice']*$quantity;
					
					$sql="INSERT INTO orders(orderDate,orderQuantity,orderTotalPrice,custUsername,bookISBN) VALUES ('$date','$quantity','$totalPrice','$custUsername','$ISBN')";
					$result=mysqli_query($connect,$sql);
					
					if($result) {
						//letak sini refresh page
						echo "<script>alert('Successfully added to cart');</script>";
					}
					else
					{
						echo mysqli_error();
					}
				}
				
			}
			
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