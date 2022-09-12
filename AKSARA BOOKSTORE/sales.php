<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Sales</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Administration Dashboard</title>
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />
</head>
<body>
	
	<div class="d-flex" id="wrapper">
		<!-- Sidebar-->
		<div class="border-end bg-white" id="sidebar-wrapper">
			<div class="sidebar-heading border-bottom bg-danger">Aksara Bookstore</div>
			<div class="list-group list-group-flush">
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="stockAvail.php">Stocks</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="sales.php">Sales</a>
			</div>
		</div>
		<!-- Page content wrapper-->
		<div id="page-content-wrapper">
			<!-- Top navigation-->
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<div class="container-fluid">
					<button class="btn btn-danger" id="sidebarToggle">Toggle Menu</button>
					<button class="btn btn-danger" id="sidebarToggle" onclick="location.href='index.php'">Log Out</button>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				</div>
			</nav>
			<!-- Page content-->
			<div class="container-fluid">
				<?php
					$username="root";
					$password="juqi1234";
					$hostName="127.0.0.1";
					$dbName="aksara_bookstore";
					
					$connect=mysqli_connect($hostName,$username,$password,$dbName);
					
					$sql="SELECT * FROM sales ORDER BY salesDate";
					$result=mysqli_query($connect,$sql);
					$queryResult=mysqli_num_rows($result);
					
					
					echo "<h1 style=\"text-align:center\">
						Sales
						</h1>";
					echo "<div class=\"container\">";
					echo "<table class=\"table table-hover\">";
						echo "<tr>";
							echo "<th>Sales ID</th>";
							echo "<th>Date</th>";
							echo "<th>Total Price</th>";
						echo "</tr>";
					
					
					if($queryResult>0){
						while($row=mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>". $row["salesID"] ."</td>";
								echo "<td>". $row["salesDate"] ."</td>";
								echo "<td>RM". $row["salesTotalPrice"]."</td>";
								echo "</tr>";
						}
						
					}
					
					echo "</table";
					echo "</div>";
				?>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="script/scripts.js"></script>
	
</body>
</html>