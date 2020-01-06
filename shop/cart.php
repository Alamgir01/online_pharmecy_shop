<?php
	  session_start();
	
		if(isset($_POST['cart_item'])){
			$data = $_POST['cart_item'];
			if(!isset($_SESSION['carts'][$data])){
				$_SESSION['carts'][$data]=1;
			}else{
				$_SESSION['carts'][$data]+=1;
			}
		}
		
		if(isset($_POST['save'])){
			    foreach($_SESSION['carts'] as $keys => $values){
				    $_SESSION['carts'][$keys]= $_POST[$keys];	
				}			
		}
		
		if(isset($_POST['delete'])&& isset($_POST['select'])){
			foreach($_POST['select'] as  $value){
				unset($_SESSION['carts'][$value]);
			}
			
		}
		
	function fetch_data($id){
		include "database.php";
		$query="SELECT product.p_id,product.p_name,product.strength,product.Dosage_type,product.p_price,p_generic.g_name,company.c_name,p_generic.g_indication\n"
                ."FROM product join p_generic on product.g_id = p_generic.g_id JOIN company on product.c_id =company.c_id\n"
	            ."where product.p_id = '$id'";
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
		}
	</style>
</head>
<body>
    <div>  
	    <?php include "header.php" ; 
		if(empty($_SESSION['carts'])){
			echo 'No Product info';
			exit();
		} 
		?>
	</div>
	<h1>Shopping Cart</h1>
	<p>here shows all the Brands that one want to buy</p>
	
	<div id="content"> 
				<form action="cart.php" method ="post">
				<table border='1px'>
					<tr> 
						<th>Brand Name</td>
						<th>Quantity</td>
						<th>Price</th>
						<th>Total</th>
						<th>Select</td>
					</tr>
			<?php 
				$total=0;
				foreach($_SESSION['carts'] as $brandid => $quantity){ 
					$result = mysqli_fetch_assoc(fetch_data($brandid));
				
				?>
					 <tr> 
						<td><?php echo $result['p_name'] ;?></td>
						<td><input type="text"  name="<?php echo $brandid ;?>"  value="<?php echo $quantity ;?>"/></td>
						<td><?php echo $result['p_price'] ?> TK.</td>
						<td><?php echo $quantity*$result['p_price']?> TK.</td>
						<td> <input type="checkbox" name="select[]" value="<?php echo $brandid ;?>" /> </td>
					 </tr>
			<?php
				$total = $total+($quantity*$result['p_price']);
					$_SESSION['total_price']=$total ;
				}
				
			?>       <tr>  
						<td colspan="3"> Total Tk.</td>
						<td colspan="2" > <?php echo $total?> TK</td>
					 </tr>
				</table>
				
				<input type="submit" value="Save" name="save" />
				<input type="submit" value="Delete" name="delete" />
			</form>
	
	</div>
	
	
	<a href="checkout.php">Check Out</a>
	<a href="home.php">Continue Shopping</a>
</body>
</html>