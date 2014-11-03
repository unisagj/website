<?php
	include '../conf/db_data.inc.php';

	$bool_query=false;

	session_start();

	if(!isset($_SESSION["jammer"]) || $_SESSION["jammer"] == "false")
        header('Location: http://www.unisagj.it/');

	if(isset($_POST)){
		if(isset($_POST['team']) && $_POST['team'] != null){
			$bool_query=true;
		}
	}

	if($bool_query){
		$sql = 'UPDATE jammers SET ID_T = '.$_POST['team'].' WHERE ID_J = '.$_SESSION["jammer"].';';
		mysql_query($sql);
		header('Location: console.php');
	}

?>