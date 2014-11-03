<?php
	
	session_start();

	include '../conf/db_data.inc.php';

	$code = $_GET['code'];

	if(!empty($code) && isset($code)){
		$result=mysql_query("SELECT ID_J FROM jammers WHERE ACTIVATION='".$code."'");

		if(mysql_num_rows($result) > 0){
			$result_1=mysql_query("SELECT ID_J FROM jammers WHERE ACTIVATION='".$code."' and STATUS='false'");

			if(mysql_num_rows($result_1) == 1){
				mysql_query("UPDATE jammers SET STATUS='1' WHERE activation='".$code."'");
				//echo "attivato";
				$_SESSION["activation"] = "attivato";
				header('Location: ../activation.php');
			}else{
				$_SESSION["activation"] = "gia_attivato";
				header('Location: ../activation.php');
				//echo "gia_attivato";
			}

		}else{
			$_SESSION["activation"] = "codice_sbagliato";
			header('Location: ../activation.php');
			//echo "codice_sbagliato";
		}
	}


?>
