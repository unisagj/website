<?php
	include '../conf/db_data.inc.php';

	$bool_query=false;

	session_start();

	if(!isset($_SESSION["jammer"]) || $_SESSION["jammer"] == "false")
        header('Location: http://www.unisagj.it/');

	if(isset($_POST)){
		if(isset($_POST['team_name']) && $_POST['team_name'] != null){
			$bool_query=true;
		}
	}

	if($bool_query){
		$sql = 'INSERT INTO teams (ID_T, NAME, TEAM_LEADER, ID_O) VALUES (NULL, "'.$_POST['team_name'].'", "'.$_SESSION["jammer"].'", 0);';
		mysql_query($sql) or die("Query non valida: " . mysql_error());
		$sql = 'SELECT ID_T FROM teams WHERE TEAM_LEADER='.$_SESSION["jammer"].'';
		$row = mysql_fetch_array(mysql_query($sql));
		$sql = 'UPDATE jammers SET ID_T = '.$row[0].' WHERE ID_J = '.$_SESSION["jammer"].';';
		mysql_query($sql);
		header('Location: console.php');
	}

?>