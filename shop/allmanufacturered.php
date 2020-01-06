<?php
   session_start();
   include "database.php";
  $val=$_REQUEST['manu'];
  
   $current_page;
	$next_page;
	$prev_page;
	
	if(!isset($_REQUEST['page'])){
		$current_page = 1;
		$next_page = $current_page+1;
		$prev_page = $current_page-1;
	}else{
		$current_page = $_REQUEST['page'];
		$next_page = $current_page+1;
		$prev_page = $current_page-1;
	}
	$offset =($current_page-1)*9;
	
  $query="SELECT product.p_id,product.p_name,product.strength,product.Dosage_type,product.p_price,p_generic.g_name,company.c_name\n"
        ."FROM product join p_generic on product.g_id = p_generic.g_id JOIN company on product.c_id =company.c_id\n" 
	    ."where company.c_name = '$val' limit $offset,9";
  $result=mysqli_query($connect,$query);
  $num_row = mysqli_num_rows($result)/3;
  if(!$result){
	  echo mysqli_error($connect);
	  exit();
  }
  
  function total_page($connect,$val){
	//$val = $_REQUEST['manu'];
	$sql = "select product.p_id from product join company on product.c_id=company.c_id where company.c_name='$val'";
    $num_row = mysqli_num_rows(mysqli_query($connect,$sql));
	return ceil($num_row/9);
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
		table{
			background-color:#7dbde3;
			padding:10px;
			margin:0px;
			width:100%;"
		}
		.active{
			color:blue;
			background-color:white;
			padding:5px;
		}
		
		#paginate{
			margin-top:10px;
			padding:5px;
			border:5px;
			background-color:#008080;
		}
		#paginate a{
			text-align: center;
			padding:4px;
			border:4px;
			text-decoration:none;
			position: relative;
            left: 550px;
		}
	</style>
</head>
<body> 
        <div> 
			<?php include 'header.php'; ?>
		</div>
        <div id="content"> 
           <table border="0px" style ="padding:10px;margin:0px;width:100%;"> 
				
				<?php	
				$count = 0 ;
				for($i=0;$i<3;$i++){
				?>	
				<tr>
				<?php
				 if($result){
					while($row=mysqli_fetch_assoc($result)){
				?>   
				    <td>
					<a href="brand_specification.php?brandid=<?php echo $row['p_id'];?>"><img src="" alt="image" /></a>
					<p>Brand_Name:<?php echo $row['p_name'];?></p>
					<p>Generic_Name:<?php echo $row['g_name'];?></p>
					<p>Strength:<?php echo $row['strength']; ?> </p>
					<p>price:<?php echo $row['p_price']. ' TK.'; ?> </p>
					</td>
				<?php
                    $count++;
                    if($count == 3){
						$count = 0 ;
						break;
					}
					}
				?>
                </tr>				
				<?php
					
				}else{
					echo mysqli_error($connect);
				}
				}
				//mysqli_close($connect);
				?>				
			</table>
			<div id ="paginate"> 
				<div> 
					<?php
						$total_pages = total_page($connect,$val);
						//echo $total_pages ;
						if($current_page>1){
							echo "<a href='allmanufacturered.php?manu=$val&page=".$prev_page."'> Prev </a>";
						}
						$pagLink = "";						 
							for ($i=1; $i<=$total_pages; $i++) { 
									if ($i==$current_page) { 
										$pagLink .= "<a href='allmanufacturered.php?manu=$val&page=".$i."' class='active'>".$i."</a>"; 
									}			 
									else { 
										$pagLink .= "<a href='allmanufacturered.php?manu=$val&page=".$i."'> ".$i."</a>"; 
									} 
							}
							echo $pagLink;
						if($current_page<$total_pages){	
							echo "<a href='allmanufacturered.php?manu=$val&page=".$next_page."'> Next </a>";
						}	
					?>
				</div>
			</div>
		</div>   	
</body> 
</html>