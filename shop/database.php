<?php
	$connect = mysqli_connect('localhost','root','','phar_shop');
	if(!$connect){
		echo mysqli_error($connect);
	}
?>