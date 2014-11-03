<?php
	include '../conf/db_data.inc.php';
	
	session_start();

	if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == false)
        header('Location: http://www.unisagj.it/');

	$sql = mysql_query('SELECT * FROM teams');
	while ($row = mysql_fetch_array($sql)) {
		echo "aa";
		$i=1;
			while ($i == 1) {
				echo "bb";
				$ris = mysql_fetch_array(mysql_query("SELECT * FROM objects ORDER BY RAND() LIMIT 1"));

				$risultato = mysql_fetch_array(mysql_query('SELECT * FROM teams WHERE ID_O = '.$risultato[0].''));

				if(!$risultato){
					mysql_query('UPDATE teams SET ID_O = '.$ris[0].' WHERE ID_T = '.$row[0].'');
					$i=0;
				}
			}
	}
	header('Location: admin.php');
?>