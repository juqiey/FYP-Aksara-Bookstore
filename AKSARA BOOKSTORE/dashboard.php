<?php
			$hostname = "127.0.0.1";
			$username = "root";
			$password = "juqi1234";
			$dbname = "aksara_bookstore";
		
			$connect = mysqli_connect($hostname,$username,$password,$dbname) OR DIE ("Connection failed!");
			
			$sql="SELECT SUM(salesTotalPrice) FROM sales";
			$result=mysqli_query($connect,$sql);
			$row2=mysqli_fetch_row($result);
			$row=mysqli_fetch_assoc($result);
			
		?>

<!DOCTYPE html>
<html lang="en">
    <head>
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
                    <h1 class="mt-4" style="text-align:center">Customer's Lists</h1>
					<?php
						$username="root";
						$password="juqi1234";
						$hostName="127.0.0.1";
						$dbName="aksara_bookstore";
						
						$connect=mysqli_connect($hostName,$username,$password,$dbName);
						
						$sql="SELECT * FROM customer";
						$result=mysqli_query($connect,$sql);
						$queryResult=mysqli_num_rows($result);
						
						
						
						echo "<div class=\"container\">";
						echo "<table class=\"table table-hover\">";
							echo "<tr>";
								echo "<th>Username</th>";
								echo "<th>Password</th>";
								echo "<th>Full Name</th>";
								echo "<th>Address</th>";
								echo "<th>Phone Number</th>";
								echo "<th>E-mail</th>";
						echo "</tr>";
						
						
						if($queryResult>0){
							while($row=mysqli_fetch_assoc($result)){
									echo "<tr>";
									echo "<td>". $row["custUsername"] ."</td>";
									echo "<td>". $row["custPassword"]."</td>";
									echo "<td>". $row["custName"]."</td>";
									echo "<td>". $row["custAddress"]."</td>";
									echo "<td>". $row["custPhoneNo"]."</td>";
									echo "<td>". $row["custEmail"]."</td>";
									echo "<td>
											<form method=\"post\">
												<button type=\"submit\" name=\"delete[]\" value=\"".$row["custUsername"]."\" class=\"btn btn-danger btn-submit-fix\">Delete</button>
											</form>
										</td>";
									echo "</tr>";
									
							}
							
						}
						
						echo "</table";
						echo "</div>";
						
						
						if(isset($_POST['delete'])){
							foreach($_POST['delete'] as $remove_id){
								$sql2 = "DELETE FROM customer WHERE custUsername = '$remove_id'";
				
								$sendsql = mysqli_query($connect,$sql2);
				
							if($sendsql){
								echo "<script>alert(\"Account deleted successfully\");window.open('dashboard.php','_self')</script>";
							}
						}
						}
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
