<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style>
		table, td{
			justify-content:center;
			align-item:center;
			text-align:center;
		}
	</style>
	
	<title>Stocks Available</title>
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
					<h1 style="text-align:center">Stocks Available</h1>
					<?php
						$username="root";
						$password="juqi1234";
						$hostName="127.0.0.1";
						$dbName="aksara_bookstore";
						
						$connect=mysqli_connect($hostName,$username,$password,$dbName);
						
						$sql="SELECT * FROM stock s, book b WHERE s.bookISBN=b.bookISBN ORDER BY stockQuantity";
						$result=mysqli_query($connect,$sql);
						$queryResult=mysqli_num_rows($result);
						
						
						
						echo "<div class=\"container\">";
						echo "<h3>Available:</h3>";
						echo "<table class=\"table table-hover\">";
							echo "<tr>";
								echo "<th>ISBN</th>";
								echo "<th>Book Image</th>";
								echo "<th>Title</th>";
								echo "<th>Stock Quantity</th>";
								echo "<th>Stock Sold</th>";
						echo "</tr>";
						
						
						if($queryResult>0){
							while($row=mysqli_fetch_assoc($result)){
									echo "<tr>";
									echo "<td>". $row["bookISBN"] ."</td>";
									echo "<td><img style=\"width:50%; height:50%\"class=\"recommended card-img-top\" src=\"data:image;base64,". base64_encode($row["bookImage"]) ."\" alt=\"Card image\"></td>";
									echo "<td>". $row["bookTitle"]."</td>";
									echo "<td>". $row["stockQuantity"]."</td>";
									echo "<td>". $row["stockSold"]."</td>";
									echo "<td>
											<form method=\"get\">
												<button type=\"button\" name=\"id\" class=\"btn btn-danger btn-submit-fix\" onclick=\"location.href='stock.php?id={$row['bookISBN']}'\">Update</button>
											</form>
										</td>";
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