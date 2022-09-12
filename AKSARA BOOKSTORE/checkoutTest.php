
<html>
<head>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<title>Checkout</title>
</head>

<body>
	<?php
		session_start();
		$server = "127.0.0.1";
		$user = "root";
		$password = "juqi1234";
		$database = "aksara_bookstore";
		$username=$_SESSION['custUsername'];

		$connect = mysqli_connect($server, $user, $password, $database);
		
			$sql="SELECT * FROM book b, customer c, orders o WHERE b.bookISBN=o.bookISBN AND c.custUsername=o.custUsername AND o.custUsername='$username'";
			$sql2="SELECT * FROM book b, customer c, orders o WHERE b.bookISBN=o.bookISBN AND c.custUsername=o.custUsername AND o.custUsername='$username'";
			
			$result=mysqli_query($connect,$sql);
			$result2=mysqli_query($connect,$sql2);
			$row=mysqli_fetch_assoc($result);
			
			$fName=$row['custName'];
			$address=$row['custAddress'];
			$phoneNum=$row['custPhoneNo'];
			$email=$row['custEmail'];
			
			$totalPrice=0;
			$shipping=7;
			
			
			if(isset($_POST['pay'])){
				$date=date('Y-m-d');
				
				while($row2=mysqli_fetch_assoc($result2)){
					$totalPrice2=$row2['orderTotalPrice'];
					$orderQuantity=$row2['orderQuantity'];
					$orderID=$row2['orderID'];
					$bookISBN=$row2['bookISBN'];
					$quantitySold=$row2['orderQuantity'];
					
					$sql3="INSERT INTO sales (salesDate,salesTotalPrice,salesQuantity) VALUES ('$date','$totalPrice2','$orderQuantity')";
					$result3=mysqli_query($connect,$sql3);
					
					$sql4="DELETE FROM orders WHERE orderID=$orderID";
					$result4=mysqli_query($connect,$sql4);
					
					$avail="SELECT * FROM stock WHERE bookISBN=$bookISBN";
					$resultAvail=mysqli_query($connect,$avail);
					$row3=mysqli_fetch_assoc($resultAvail);
					
					$quantityAvail=$row3['stockQuantity']-$quantitySold;
					
					$sql5="UPDATE stock SET stockSold='$quantitySold', stockQuantity='$quantityAvail' WHERE bookISBN=$bookISBN";
					$result5=mysqli_query($connect,$sql5);
					
					if($result3 && $result4 && $result5) {
						//letak sini refresh page
						echo "<script>alert('Payment successful');location.href='home.php'</script>";
					}
					else
					{
						echo mysqli_error();
					}
					
				}
				
				
			}
	?>


	<div class="container wrapper">
		<div class="row cart-head">
			<div class="container">
			<div class="row">
				<p></p>
			</div>
			<div class="row">
				<div style="display: table; margin: auto;">
					<span class="step step_complete"> <a href="#" class="check-bc" style="background-color">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
					<span class="step step_complete"> <a href="#" class="check-bc" style="background-color">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
					<span class="step_thankyou check-bc step_complete">Thank you</span>
				</div>
			</div>
			<div class="row">
				<p></p>
			</div>
			</div>
		</div>    
		<div class="row cart-body">
			<form class="form-horizontal" method="post" action="">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
				<!--REVIEW ORDER-->
				<div class="panel panel-info">
					
					<div class="panel-heading" style="background-color:#E50914; color:#F5F5F1">
						 Review Order <div class="pull-right"><small><a class="afix-1" href="#" style="color:#F5F5F1"> Edit Cart</a></small></div>
					</div>
					<div class="panel-body">
						<?php
						foreach($result as $row){
						echo "<div class=\"form-group\">
							<div class=\"col-sm-3 col-xs-3\">
								<img class=\"img-responsive\" src=\"data:image;base64,". base64_encode($row["bookImage"]) ."\" >
							</div>
							<div class=\"col-sm-6 col-xs-6\">
								<div class=\"col-xs-12\">".$row["bookTitle"]."</div>
								<div class=\"col-xs-12\"><small>Quantity:<span>".$row["orderQuantity"]."</span></small></div>
							</div>
							<div class=\"col-sm-3 col-xs-3 text-right\">
								<h6><span>RM</span>".$row["orderTotalPrice"]."</h6>
							</div>
						</div>";
						
						$totalPrice+=$row["orderTotalPrice"];
						}
						?>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Subtotal</strong>
								<div class="pull-right"><span>RM</span><span><?php echo $totalPrice;  ?></span></div>
							</div>
							<div class="col-xs-12">
								<small>Shipping</small>
								<div class="pull-right"><span>RM</span><span><?php
									if($totalPrice>100)
										$shipping=0;
									
									echo $shipping;
								?></span></div>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Order Total</strong>
								<div class="pull-right"><span>RM</span><span><?php echo $totalPrice+$shipping; ?></span></div>
							</div>
						</div>
					</div>
				</div>
				<!--REVIEW ORDER END-->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
				<!--SHIPPING METHOD-->
				<div class="panel panel-info">
					<div class="panel-heading" style="background-color:#E50914; color:#F5F5F1">Address</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-md-12">
								<h4>Shipping Address</h4>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Full Name:</strong></div>
							<div class="col-md-12">
								<input type="text" class="form-control" name="name" value="<?php echo $fName; ?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Address:</strong></div>
							<div class="col-md-12">
								<textarea type="textarea" rows="5" name="address" class="form-control" value="" /><?php echo $address; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Phone Number:</strong></div>
							<div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="<?php echo $phoneNum; ?>" /></div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Email Address:</strong></div>
							<div class="col-md-12"><input type="text" name="email_address" class="form-control" value="<?php echo $email; ?>" /></div>
						</div>
					</div>
				</div>
				<!--SHIPPING METHOD END-->
				<!--CREDIT CART PAYMENT-->
						<div class="form-group">
							<div class="col-md-2 col-sm-6 col-xs-12">
								<button type="button" onclick="location.href='cart.php'" class="btn btn-danger btn-submit-fix">Back</button>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<button type="submit" name="pay" class="btn btn-primary btn-submit-fix" href="home.php">Pay</button>
							</div>
						</div>
				</div>
				<!--CREDIT CART PAYMENT END-->
			</div>
			
			</form>
		</div>
		<div class="row cart-footer">
	
		</div>
		<?php
			
		?>
	</div>
	
	
</body>
</html>