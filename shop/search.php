<?php
	include "database.php";
	$val =$_GET['search'];
	if(!empty($val)){
		$query = "select * from  product where p_name like '$val%'";
		$result  =mysqli_query($connect,$query);
		if(!$result){
			echo mysqli_error($connect);
			exit();
		}		
	}else{
		
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
			color:green;
			background-color:#3cb371;
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
	
	<p>This is Search result page......!</p>
	<div>
	
	</div>
	<div> 
		<?php
		if(!empty($val)){
			if(mysqli_num_rows($result)>=1){
				while($row = mysqli_fetch_assoc($result)){
					
		?>
		
		<a href="brand_specification.php?brandid=<?php echo $row['p_id']?>"><?php echo $row['p_name'] ?></a>
	    <?php 	
     		echo '<br />';
			}
			}else{
				echo "No result found";
				exit();
			}		
		}else{
			exit("Search box is empty");
		}
				
		?>
	</div>
</body>
</html>

