<?php 
	session_start();
	function fetch_data($id){
		include "database.php";
		$query="select * from product where p_id ='$id'";
		$result=mysqli_query($connect,$query);
		if($result){			
			return $result ;
		}else{
			exit();
		}
	}	
?>




<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
	
		#header{
			color:green;
			background-color:orange;
			padding:10px;
			margin:5px;
		}
		
		#side_bar{
			color:white;
			background-color:#6a5acd;
			width:200px;
			//height:90%;
			over-flow:auto;
			float:left;
		}
		
		#content{
			color:black;
			background-color:#3cb371;
			//margin-left:210px;
			
			
		}
		
		#footer{
			clear:left;
			background-color:#ee82ee;
		}
		input[type=button], input[type=submit], input[type=reset] {
			background-color:#6a5acd;
			border: none;
			color: white;
			padding: 5px 10px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
		}
		table {
			width : 100% ;
			background-color:green ;
		}
		td,th{
			  text-align:left;
		}
	</style>
</head>
<body>
	<div> 
		<?php include "header.php"; ?>
	</div>
	<h1>Payment and order confirmation </h1>
	<p>here one should provide the shipping address and payment details</p>
	
	<div>
	<table border='1px' >          
			<tr> 
				<th>Brand Name</td>
				<th>Quantity</td>
				<th>Price</th>
				<th>Total</th>
				
			</tr>
		<?php 
			foreach($_SESSION['carts'] as $brandid => $quantity){ 
					$result = mysqli_fetch_assoc(fetch_data($brandid));
					
		?>          <tr> 
						<td><?php echo $result['p_name'] ;?></td>
						<td><?php echo $quantity ;?></td>
						<td><?php echo $result['p_price'] ?> TK.</td>
						<td><?php echo $quantity*$result['p_price']?> TK.</td>
					 </tr>
			<?php
				}	
			?>
			 <tr>  
				<td></td>
				<td></td>
				<td> Total Tk.</td>
				<td> <?php echo $_SESSION['total_price'];?></td>
			 </tr>
	</table>		
	</div>
	<form action="order.php" method="post">
		<div>
			<p> Shipping Address </p>
				<label for="fullname">Full Name </label>
				<input type="text" name='fullname' /> <br />
				<label for="email">Email </label>
				<input type="email" name='email' /> <br />
				<label for="phone">Phone Number </label>
				<input type="text" name='phone' /> <br />
				<label for="address">Address </label>
				<input type="text" name='address' /> <br />
		</div>

		<div align="">
			<p>Payment  </p>
				<p> Accepted Cards</p>
				<label for="name_on_card">Name on Card</label>
				<input type="text" name='name_on_card' /> <br />
				<label for="credit_card_number">Credit card number</label>
				<input type="text" name='card_number' /> <br />
				<label for="expmonth">Exp Month</label>
				<input type="text" name='expmonth' /> <br />
				<label for="expyear">Exp Year</label>
				<input type="text" name='expyear' /> <br />
				<label for="cvv">CVV</label>
				<input type="text" id="cvv" name="cvv" placeholder="352">		
		</div>
		<input type="submit" value="Confirm Order" name='confirm' />
	</form>
</body>
</html>
