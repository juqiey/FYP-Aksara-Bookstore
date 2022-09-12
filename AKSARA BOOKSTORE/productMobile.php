<?php
	session_start();
	$username="root";
	$password="juqi1234";
	$hostName="127.0.0.1";
	$dbName="aksara_bookstore";

	$connect=mysqli_connect($hostName,$username,$password,$dbName);
	$custUsername=$_SESSION['custUsername'];
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