<?php
	include 'database.php';
	$brand_id = $_REQUEST['brandid'];
	$sql="SELECT product.p_id,product.p_name,product.strength,product.Dosage_type,product.p_price,p_generic.g_name,company.c_name,p_generic.g_indication\n"
    ."FROM product join p_generic on product.g_id = p_generic.g_id JOIN company on product.c_id =company.c_id\n"
	."where product.p_id = '$brand_id'";
	$result = mysqli_query($connect,$sql);
	if(!$result){
		echo mysqli_error($connect);
	}
	
	//echo $brand_name ;
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
			margin:10px;
			overflow: hidden;
		}
		
		#footer{
			clear:left;
			background-color:#ee82ee;
		}
		#spec{
			padding:5px;
			margin:5px;
			position: relative;
			left:550px;
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

	</style>
</head>
<body>
	<div> 
		<?php 
		     include 'header.php';
		?>
	 </div>
	
		<div id="content"> 
			<h1>Brand Details</h1>
			<p>Here one can see the Details of the selected Brand</p>
				<hr />
			<?php 
				if($result){
					while($row=mysqli_fetch_assoc($result)){
			?>		
						<div > 
							<img src="#" alt="Image" />
						</div>
						
						<div id="spec"> 
					
							<p> <?php echo 'Brand Name: '. $row['p_name'].'<br />'; ?></p>
							<p> <?php echo 'Generic Name: '.$row['g_name'].'<br />'; ?></p>
							<p> <?php echo 'Strength :'. $row['strength'].'<br />'; ?></p>
							<p> <?php echo 'Dosage Description: '.$row['Dosage_type'].'<br />'; ?></p>
							<p> <?php //echo 'Indication: '.$row['g_indication'].'<br />'; ?></p>
							<p> <?php //echo 'Indication: '.$row['g_side_effet'].'<br />'; ?></p>
							<p> <?php echo 'Manufacturer: '.$row['c_name'].'<br />'; ?></p>
							<p> <?php echo 'Price: '.$row['p_price']. ' TK.'; ?></p>
						</div>
			<?php	
					}
				}
		    ?>
			
			<div > 
				 <form action="cart.php" method="post">
					<input type="hidden" name ="cart_item" value="<?php echo $brand_id ;?>"/>
					<input type="submit" value="Add to cart" />
				</form>
			</div>

		</div>
		<div> 
				 <div> 
						<p> Indication :</p> 
						<p>Side effect :</p>
				 </div>			
		</div>
	
			
			
</body>
</html>