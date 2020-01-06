<?php
	session_start();
	
	include 'database.php';
	if(isset($_POST['confirm'])){
		$s_id = place_shipping($connect);
		$o_id = place_order($s_id,$connect);
		$o_item = place_items($o_id,$connect);
		
		if(isset($s_id) and isset($o_id) and $o_item==true){
			unset($_SESSION['carts']);
			unset($_SESSION['total_price']);
			echo "order place successfully";
			echo'<a href="home.php">Go to Home </a>';
		}
	}else{
		exit("Nothing ??");
	}
	//*--------------------------------------------------------------------*//
	
	function place_shipping($connect){
		$fullname=$_POST['fullname'];
		$email = $_POST['email'];
		$phone =$_POST['phone'];
		$address = $_POST['address'];
		
		$sql="insert into shippings values('','$fullname','$phone','$email','$address')";
		$result = mysqli_query($connect,$sql);
		if($result){
			return mysqli_insert_id($connect) ;
		}else {
			echo mysqli_error($connect);
		}
	}
	
	//*--------------------------------------------------------------------*//
	
	function place_order($sid,$connect){
		$total_price = $_SESSION['total_price'];
		$sql = "insert into orders values('','$sid','$total_price')";
		$result = mysqli_query($connect,$sql);
		if($result){
			return mysqli_insert_id($connect);
		}else{
			echo mysqli_error($connect);
		}
	}
	
	//*--------------------------------------------------------------------*//
	
	function place_items($oid,$connect){
		$sql = "insert into items(o_id ,o_item,quantity ,price) values(?,?,?,?)";
		        if($stmt=mysqli_prepare($connect,$sql)){
					 mysqli_stmt_bind_param($stmt,"iiid",$o_id,$o_item,$quantity,$price);
					 
					 foreach($_SESSION['carts'] as $brand_id => $quantity){						 
							 $product = mysqli_fetch_assoc(show_product($brand_id,$connect));
							 $o_id = $oid;
							 $o_item = $brand_id;
							 $quantity = $quantity;
							 $price = $product['p_price'];
							$res= mysqli_stmt_execute($stmt); 
					 } 
					  if(!$res){
						echo "ERROR: Could not prepare query: $sql. " . mysqli_error($connect);
						exit();
					  }else {
						  return true ;
					  } 		 
	            }
	}
	
	 function show_product($brand_id,$connect){	  
	   $sql = "select p_price  from product where p_id = '$brand_id'";	   
	   $result = mysqli_query($connect,$sql);	   
       if(!$result){	   
	     echo mysqli_error($connect);
         exit() ;	   
	   }   
     return $result ;
   }
?>



<!--
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
	<div><?php //include 'header.php' ?></div>
	<h1>Payment and order confirmation </h1>
	<p>here one can confirm order after giving payment method</p>
	<form action="">
		<div align="">
			Payment 
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
		<input type="submit" value="Confirm Order" />
	</form>
</body>
</html> -->