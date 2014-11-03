<?php
	include '../conf/db_data.inc.php';
	$bool_query=false;

	session_start();

	if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == false)
        header('Location: http://www.unisagj.it/');

	if(isset($_GET)){
		if(isset($_GET['id']) && $_GET['id'] != null){
			$bool_query=true;
		}
	}

	if($bool_query){
		$sql = "UPDATE `jammers` SET `PRESENCE` = 1 WHERE `ID_J` = ".$_GET['id'].";";
		mysql_query($sql) or die("Query non valida: " . mysql_error());
		header('Location: jammerslist.php');
	}

?>