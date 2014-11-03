<?php
	include '../conf/db_data.inc.php';

	$bool_query=false;

	session_start();

	if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == false)
        header('Location: http://www.unisagj.it/');

	if(isset($_POST)){
		if(isset($_POST['obj']) && $_POST['obj'] != null){
			$bool_query=true;
		}
	}

	if($bool_query){
		$sql = "INSERT INTO `objects` (`ID_O`, `NAME`) VALUES (NULL, '".$_POST['obj']."');";
		mysql_query($sql) or die("Query non valida: " . mysql_error());
		header('Location: insertobj.php');
	}

?>