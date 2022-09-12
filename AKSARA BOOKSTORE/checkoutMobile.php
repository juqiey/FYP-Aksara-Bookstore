<?php
	session_start();
	$server = "127.0.0.1";
	$user = "root";
	$password = "";
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