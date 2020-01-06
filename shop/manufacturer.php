<?php
    session_start();
	include 'database.php';
	$query = "SELECT company.c_name,count(product.p_id)as total_product\n"
    ."FROM product join company on product.c_id =company.c_id\n"
	."group by company.c_name" ;
	$result = mysqli_query($connect,$query);
	if(!$result){
		echo mysqli_error($connect);
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
		
		#content{
			color:green;
			background-color:white;
			//margin-left:210px;
			
			
		}
		
		#footer{
			clear:left;
			background-color:#ee82ee;
		}
		
	</style>
</head>
<body>
	<div> 
		<?php 
		     include 'header.php';
		?>
	</div>
	
	<h1>Manufacturer </h1>
	<p>here shows all the manufacturer list </p>
	<div id ="content"> 
	<table> 
				<?php
					while($row=mysqli_fetch_assoc($result)){
				?>
				        <tr>   
						    <td>  
							   <a href="allmanufacturered.php?manu=<?php echo $row['c_name']; ?>"> <?php echo $row['c_name']; ?></a> 
							</td>
							<td> 
							    <?php  echo $row['total_product'] ; ?>
							</td>
						</tr>
				<?php 
					}
				?>		
	</table>
		
	</div>
</body>
</html>