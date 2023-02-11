<?php 
 include "dataconfig.php";
 if(isset($_GET['id'])){
 	$delete_id=$_GET['id'];
 	// $delete_from_floder=$_GET['myFile'];

 	$delete_from_floder_sscFile=$_GET['sscFile'];
 	$delete_from_floder_hscFile=$_GET['hscFile'];

 	$files=array("$delete_from_floder_sscFile", "$delete_from_floder_hscFile");
 	
 	foreach ($files as $file) {
 		$path="ff/".$file;
 		if(file_exists($path)){
 			unlink("$path");
 		}
 	}
 		

 	// $deletesql="DELETE FROM cinfo WHERE id=$delete_id";
 	$deletesql2="DELETE FROM contactinfo WHERE id=$delete_id";
 	if($connection-> query($deletesql2)){
 		// unlink("ff/$delete_from_floder");

 		header("location:admin.php?deleted");
 		
 	}
 	else{
 		die($connection -> error);

 	}

 }
 else{
 	header("location:admin.php");
 }

 ?>