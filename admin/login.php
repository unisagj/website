<?php
	include '../conf/admin_conf.inc.php';

	$bool_user=false;
	$bool_pass=false;

	session_start();

	if(isset($_POST)){
		if(isset($_POST['user']) && $_POST['user'] != null){
			$bool_user=true;
		}
		if(isset($_POST['pwd']) && $_POST['pwd'] != null){
			$bool_pass=true;
		}
	}

	if($bool_user && $bool_pass && $_POST['user'] == $admin_user_conf && $_POST['pwd'] == $admin_pwd_conf){
		$_SESSION['admin'] = true;
		header('Location: admin.php');
	}
	else{
		$_SESSION['admin'] = false;
		header('Location: http://www.unisagj.it/');
	}

?>