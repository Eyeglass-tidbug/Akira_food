<?php
	require_once 'dbh.php';
	require_once 'function.php';
	
	if(isset($_POST["Choose"])){
		session_start();
		$_SESSION["sfd"] = $_POST['foodtype'];
		$fnd = $_SESSION["sfd"];
		
		if(isempy($fnd) !== false){
			header("location:foodmenu.php?error=Empfood");
			exit();
		}
		View2($conn, $fnd);
	}
	elseif(isset($_POST["Clear"])){
		clear2();
	}
	else{
		header("location:foodmenu.php?eror=error");
		exit();
	}
?>