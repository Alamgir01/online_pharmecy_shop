<?php
	//session_start();

?>
<div id="header">
		<div> 
			<h1>Pharmacy shop </h1>
			<p> This project  contains only Bangladeshi  medicine brand </p>
			<a href="home.php">Home</a> 
			<a href="manufacturer.php">List of All Manufacturer</a>
			<?php
				if(!empty($_SESSION['carts'])){
					echo "<a href='cart.php'>Cart</a>";
				}
            ?>
		</div>
		
		<div id="search">
			<form action="search.php" method ="get">
				<input type="search" name="search" value="" />
				<input type="submit" name ="" value = "Search" />
			</form>		
		</div>	
</div>