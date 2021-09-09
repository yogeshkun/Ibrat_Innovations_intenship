<?php
	$conn = new mysqli("localhost", "root", "", "assignement");
	
	if(!$conn){
		die("Error: Cannot connect to the database");
	}

?>