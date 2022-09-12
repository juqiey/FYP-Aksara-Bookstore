<!DOCTYPE html>
<html>
<head>
	<title>AKSARA BOOKSTORE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" type="text/css" href="css/cartStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	
	
	<form action="" method="post" class="total-form">
		<section class="section-cart-product"> <!--Part ni nnti boleh je tukar-->
			<table class="table align-middle product-table">
			<thead>
				<tr>
					<th style="width:50%;">Product</th>
					<th class="product-table-header">Price</th>
					<th class="product-table-header">Quantity</th>
					<th class="product-table-header">Subtotal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<!--<tr>
					<td>
						<div class="cart-product-container">
							<img src="source/ex.png" class="cart-product-image">
							<h6 class="cart-product-title">Harry Potter</h6>
						</div>
					</td>
					<td><h6 class="cart-product-price" id="price0">RM 12.20</h6></td>
					<td>
						<ul class="pagination justify-content-center set_quantity quantity">
							<li class="page-item">
								<button class="page-link" onclick="decreaseQty('product0-quantity')">-</button>
							</li>
							<li class="page-item"><input type="text" class="page-link product-quantity" value="1" id="product0-quantity" onclick="decreaseQty('product0-quantity')"></li>
							<li class="page-item">
								<button class="page-link" onclick="increaseQty('product0-quantity')">+</button>
							</li>
						</ul>
					</td>
					<td><h6 class="cart-product-subtotal" id="subtotal0">RM 12.20</h6></td>
					<td class="cart-product-delete">
						<button class="product-delete">
							<i class="uil uil-multiply"></i>
						</button>
					</td>
				</tr>-->
			<?php
				session_start();
				$hostname = "127.0.0.1";
				$username = "root";
				$password = "juqi1234";
				$dbname = "aksara_bookstore";
				
				$connect = mysqli_connect($hostname,$username,$password,$dbname) OR DIE ("Connection failed!");
				
				$custUsername = $_SESSION['custUsername'];
				$sql = "SELECT * FROM book b, customer c, orders o WHERE b.bookISBN=o.bookISBN AND c.custUsername=o.custUsername AND o.custUsername='$custUsername'";
			
				$sendsql = mysqli_query($connect, $sql);
				$cQty=1;
				if($sendsql)
				{
					$cQty=1;
					foreach($sendsql as $row)
					{
						echo "<tr>
							<td>
								<div class=\"cart-product-container\">";
									echo"<img src=\"data:image;base64,".base64_encode($row["bookImage"])."\" class=\"cart-product-image\">
									<h6 class=\"cart-product-title\">".$row["bookTitle"]."</h6>
								</div>
							</td>";
							echo"<td><h6 class=\"cart-product-price\" id=\"price".$cQty."\">RM".$row["bookPrice"]."</h6></td>
							<td>
								<ul class=\"pagination justify-content-center set_quantity quantity\">
									<li class=\"page-item\">
										<button class=\"page-link\" onclick=\"decreaseQty('product".$cQty."-quantity','subtotal".$cQty."','price".$cQty."')\">-</button>
									</li>";
									echo"<li class=\"page-item\"><input type=\"text\" class=\"page-link product-quantity\" name=\"orderQty".$cQty."\" value=\"".$row["orderQuantity"]."\" id=\"product".$cQty."-quantity\"  onchange=\"changeQty('product".$cQty."-quantity','subtotal".$cQty."','price".$cQty."')\"></li>
									<li class=\"page-item\">
										<button class=\"page-link\" onclick=\"increaseQty('product".$cQty."-quantity','subtotal".$cQty."','price".$cQty."')\">+</button>
									</li>
								</ul>
							</td>";
							echo"<td class=\"subtotal-cell\"><input readonly class=\"cart-product-subtotal\" name=\"orderPrice".$cQty."\" id=\"subtotal".$cQty."\" value=\"RM".$row["orderTotalPrice"]."\"></td>
							<td class=\"cart-product-delete\">
								<button type=\"submit\" name=\"delete[]\" class=\"delete-btn\" style=\"padding:5px 15px;background-color:transparent;border:1px solid #F5F5F1;color:#F5F5F1;border-radius:0.2em;\" id=\"btn-check-".$cQty."\" value=\"".$row["bookISBN"]."\">X</button>
							</td>
						</tr>";
						$cQty++;
					}
				}
				else
					echo "Query failed";
			?>
			</tbody>
			</table>
		</section>
		
		
		
		
		<section class="section-cart-total">
			<fieldset>
				<table class="table table-borderless align-middle total-table">
				<thead>
					<tr>
						<th style="width:65%;font-size:1.75em;">Shipping Information</th>
						<th class="total-table-header"></th>
					</tr>
				</thead>
				<tbody>
					<tr><td></td><td></td></tr>
					<tr>
						<td><h6 class="cart-total-title">Fixed Rate</h6></td>
						<td class="price-cell"><h6 class="cart-total-price">RM7.00</h6></td>
					</tr>
					<tr>
						<td><h6 class="cart-total-title">Free Shipping</h6></td>
						<td class="price-cell"><h6 class="cart-total-price">Above RM100.00</h6></td>
					</tr>
				</tbody>
				</table>
			</fieldset>
			
			<fieldset>
				<table class="table table-borderless align-middle total-table">
				<thead>
					<tr>
						<th style="width:65%;font-size:1.75em;">Cart Total</th>
						<th class="total-table-header"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h6 class="cart-total-title">Subtotal</h6></td>
						<td class="price-cell"><h6 class="cart-total-price" name="subtotals" id="subtotals"></h6></td>
					</tr>
					<tr class="total-underline">
						<td><h6 class="cart-total-title">Shipping</h6></td>
						<td class="price-cell"><h6 class="cart-total-price" id="shipping">RM7.00</h6></td>
					</tr>
					<tr>
						<td><h6 class="cart-total-title">Total</h6></td>
						<td class="price-cell"><h6 class="cart-total-price-total" id="total">RM19.00</h6></td>
					</tr>
				</tbody>
				</table>
				<div class="subs-data">
				<?php
					if(isset($_POST["update"])){
						$subItem = array();
						$orderQty = array();
						for($i=1; $i<$cQty; $i++)
						{
							$items = "orderPrice".(string)$i;
							$subts = $_POST[$items];
							$subts = str_replace("RM","",$subts);
							$subItem[$i-1] = $subts; 
							
							$qty = "orderQty".(string)$i;
							$qtys = $_POST[$qty];
							$orderQty[$i-1] = $qtys; 
						}
					}
				?>
				</div>
				<div class="cart-btn">
					<input type="submit" name="update" value="Update Cart" class="cart-update-btn">
					<a class="cart-checkout-btn" name="add" onclick="location.href='checkoutTest.php'">Proceed to Checkout</a>
				</div>
			</fieldset>
		</section>
	</form>
	
	<section class="section-cart-empty">
		<div class="cart-empty">
			<h6 class="cart-empty-title">Your cart is currently empty</h6>
			<button class="cart-empty-btn" onclick="location.href='home.php'">Return to Shop</button>
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
	<script type="text/javascript">
		function increaseQty(incdec,sub,bp){
			event.preventDefault(); 
			var qty = document.getElementById(incdec).value;
			qty++;
			document.getElementById(incdec).value = qty;
			
			var price = document.getElementById(bp).innerHTML;
			price = price.replace("RM","");
			var subtotal = parseInt(qty) * parseFloat(price);
			document.getElementById(sub).value = "RM"+subtotal.toFixed(2);
			setTotals();
		}
		function decreaseQty(incdec,sub,bp){
			event.preventDefault(); 
			var qty = document.getElementById(incdec).value;
			if(qty>1)
				qty--;
			document.getElementById(incdec).value = qty;
			
			var price = document.getElementById(bp).innerHTML;
			price = price.replace("RM","");
			var subtotal = parseInt(qty) * parseFloat(price);
			document.getElementById(sub).value = "RM"+subtotal.toFixed(2);
			setTotals();
		}
		function changeQty(incdec,sub,bp){
			event.preventDefault(); 
			var qty = document.getElementById(incdec).value;
			if(qty<1)
				qty=1;
			document.getElementById(incdec).value = qty;
			
			var price = document.getElementById(bp).innerHTML;
			price = price.replace("RM","");
			var subtotal = parseInt(qty) * parseFloat(price);
			document.getElementById(sub).value = "RM"+subtotal.toFixed(2);
			setTotals();
		}
		function setTotals(){
			var last = "<?php echo $cQty;?>";
			last = parseInt(last);
			var subtotals = 0.0;
			for(var i=1;i<last;i++)
			{
				var subs = document.getElementById('subtotal'+i).value;
				subs = subs.replace("RM","");
				subtotals += parseFloat(subs);
			}
			document.getElementById('subtotals').innerHTML = "RM"+subtotals.toFixed(2);
			
			var subt = document.getElementById('subtotals').innerHTML;
			var shipping = document.getElementById('shipping').innerHTML;
			
			subt = parseFloat(subt.replace("RM",""));
			shipping = parseFloat(shipping.replace("RM",""));
			
			if(subt>100){
				shipping=0;
				document.getElementById('shipping').innerHTML = "RM"+shipping.toFixed(2)+" <br>(Free shipping)";
			}
			else{
				shipping=7;
				document.getElementById('shipping').innerHTML = "RM"+shipping.toFixed(2);
			}
				
			var total = subt + shipping;
			document.getElementById('total').innerHTML = "RM"+total.toFixed(2);
		}
		function checkout(){
			var total = document.getElementById('total').innerHTML;
			total = parseFloat(total.replace("RM",""));
			
			location.href = 'checkout.php?orderPrice={'+total+'}';
		}
		window.addEventListener('load', setTotals);
		
		$(document).ready(function(){
			var check = document.getElementById('subtotals').innerHTML;
			check = parseFloat(check.replace("RM",""));
			if(check==0){
				$(".total-form").hide();
				$(".section-cart-empty").show();
			}
			else{
				$(".total-form").show();
				$(".section-cart-empty").hide();
			}
		});
	</script>
	<?php	
		if(isset($_POST["update"])){
			$sql = "SELECT * FROM orders WHERE custUsername='$custUsername'";
			$qry = mysqli_query($connect,$sql);
			//$data = mysqli_fetch_array($qry);			
			if($qry){
				$c=0;
				foreach($qry as $row){
					/*$item = "orderPrice".(string)$cQty;
					$subtotal = $_POST[$item];
					$subtotal = str_replace("RM","",$subtotal);*/
					$bookISBN = $row["bookISBN"];
					$orderQuantity = $row["orderQuantity"];

					$sql2 = "UPDATE orders SET orderTotalPrice=$subItem[$c], orderQuantity=$orderQty[$c] WHERE custUsername='$custUsername' AND bookISBN='$bookISBN'";
					$sendsql = mysqli_query($connect,$sql2);	

					if($sendsql) {
						//letak sini refresh page
						echo "<script>window.open('cart.php','_self')</script>";
					}
					else
					{
						echo mysqli_error();
					}
					$c++;
				}
			}
		}	
					
	?>
	<?php
		if(isset($_POST['delete'])){
			foreach($_POST['delete'] as $remove_id){
				$sql2 = "DELETE FROM orders WHERE custUsername = '$custUsername' AND bookISBN = '$remove_id'";
				
				$sendsql = mysqli_query($connect,$sql2);
				
				if($sendsql){
					echo "<script>alert('The order has been removed');window.open('cart.php','_self')</script>";
				}
			}
		}
	?>
		
	</body>
</body>
</html>