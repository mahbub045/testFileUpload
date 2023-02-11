<?php

$host="localhost";
$user="root";
$pass="";
$datab="testfileupload";

$connection=new mysqli($host,$user,$pass,$datab);

if($connection -> connect_error ){
	die($connection -> error);
}
else{
	// echo "Database Connected";
}

?>