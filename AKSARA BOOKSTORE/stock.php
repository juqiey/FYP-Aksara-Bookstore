<?php
	$username="root";
	$password="juqi1234";
	$hostName="127.0.0.1";
	$dbName="aksara_bookstore";
	
	$connect=mysqli_connect($hostName,$username,$password,$dbName);
	
	if(isset($_GET['id'])){
		
		$id=mysqli_real_escape_string($connect,$_GET['id']);
				
		$sql="SELECT * FROM stock WHERE bookISBN='$id'";
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_assoc($result);
		$ISBN=$row['bookISBN'];
	}
	
	if (isset($_POST['update'])){
		$quantityAdd=$_POST['quantity'];
		$quantity=$quantityAdd+$row['stockQuantity'];
		$date=date('Y-m-d');
		
		$sql="UPDATE stock SET stockQuantity='$quantity',stockDate='$date' WHERE bookISBN=$id";
		$result=mysqli_query($connect,$sql);
		
		if($result) {
			//letak sini refresh page
			echo "<script>alert('Update stock is successful');location.href='stockAvail.php'</script>";
		}
		else
		{
			echo mysqli_error();
		}
	}
?>

<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styleStock.css">
	<script src="script/scriptStock.js"></script>
	
	<title>Update Stock</title>
</head>
<body>
	
		
		
		
	
				
		 <div class="form-body">
			<div class="row">
				<div class="form-holder">
					<div class="form-content">
						<div class="form-items">
							<h3>Update Stock</h3>
							<p>Fill in the data below.</p>
							<form class="requires-validation" novalidate method="post">

								<div class="col-md-12">
									<div class="col-md-12" style="color:#F5F5F1">Book ISBN</div>
									<input class="form-control" type="text" name="name" placeholder="xxx-xxx-xxx-x" value="<?php echo $ISBN; ?>" required>
								</div>

								<div class="col-md-12">
									<div class="col-md-12" style="color:#F5F5F1">Quantity</div>
									<input class="form-control" type="email" name="quantity" placeholder="Enter a number" required>
								</div>
								<div class="form-button mt-3">
									<button id="submit" type="button" class="btn btn-primary" onclick="location.href='stockAvail.php'">Back</button>
								</div>
								
								<div class="form-button mt-3">
									<button id="submit" type="submit" class="btn btn-danger" name="update" >Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
</body>
</html>