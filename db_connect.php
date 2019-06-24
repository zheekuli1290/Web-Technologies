<?php 
	
	$db = mysqli_connect('localhost','root','','pizza');
	date_default_timezone_set('asia/taipei');

	if(!$db){
		echo "failed to connect mysql/db!";
			die("Connection Failed:".mysqli_connect_error());
	}else{
		echo "";
}

?>