<html>
	<head>
		<title>AKSARA BOOKSTORE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/styleSearch.css">
	</head>
	<body>
		<!------------------------Header - DON'T EDIT ANYTHING HERE------------------------------>
		<header>
			<nav class="header-nav">
				<img src="source/LOGO.png" class="nav-logo">
				<ul>
					<li class="nav-main"><a href="">Home</a></li>
					<li class="nav-main"><a href="">About</a></li>
					<li class="nav-main"><a href="">Contact Us</a></li>
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
	
		<section class="content">
		
			<form action="search_index.php" method="post">
			<div class="search_bar">
				<input type="text" name="search" placeholder="Enter title, ISBN, author, genre or year published" id="search">
				<button type="submit" class="btn btn-danger btn-submit-fix" name="Submit" id="search_btn">Search</button>
			</div>
			</form>
		
		
		
		<div>
			<?php
				$username="root";
				$password="juqi1234";
				$hostName="127.0.0.1";
				$dbName="aksara_bookstore";
					
				$connect=mysqli_connect($hostName,$username,$password,$dbName);
				
				if(isset($_POST['Submit'])){
					$search=mysqli_real_escape_string($connect,$_POST['search']);
					$sql="SELECT * FROM book WHERE bookTitle LIKE '%$search%' OR bookAuthor LIKE '%$search%' OR bookYearPublish LIKE '%$search%' OR bookGenre LIKE '%$search%'";
					$result=mysqli_query($connect,$sql);
					$queryResult=mysqli_num_rows($result);
					
					echo "<br><h2 class=\"result\">Search Results</h2><br>";
					
					if($queryResult>0){
						echo "<div class=\"container\">";
						while($row=mysqli_fetch_assoc($result)){
							echo "<div class=\"card recommended\">";
							echo "<a href='product.php?id={$row['bookISBN']}'>";
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
						echo "<h4 style=\"color:white; text-align:center\">There are no matching results for your search!</h4>";
				}
			?>
		</div>
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
				<a href="" class="footer-group-info-link">Group Member's Information</a>
			</div>
		</footer>
		
		<div class="navigation-menu">
			<nav class="footer-nav">
				<ul>
					<li><a href=""><i class="uil uil-estate footer-nav-icon"></i>Home</a></li>
					<li><a href=""><i class="uil uil-info-circle footer-nav-icon"></i>About</a></li>
					<li><a href=""><i class="uil uil-phone-alt footer-nav-icon"></i>Contact Us</a></li>
					<li><a href=""><i class="uil uil-user footer-nav-icon"></i>Account</a></li>
				</ul>
			</nav>
		</div>
	</body>
</html>