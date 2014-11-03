<?php
	include '../conf/db_data.inc.php';

	$pwd = md5($_POST['pwd']);

	session_start();

		
	$sql = 'SELECT * FROM jammers WHERE USERNAME= "'.$_POST["user"].'" AND PWD = "'.$pwd.'" AND STATUS = 1';


	$ris = mysql_query($sql) or die("Query non valida: " . mysql_error());
	$row = mysql_fetch_array($ris);

		

	if($row['USERNAME'] == $_POST['user'] && $row['PWD'] == $pwd){
		$_SESSION['jammer'] = $row['ID_J'];
		header('Location: console.php');
	}
	else{
		$_SESSION['jammer'] = false;
		header('Location: http://unisagj.it/login');
	}

?>