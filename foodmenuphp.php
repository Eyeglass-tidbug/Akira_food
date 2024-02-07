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
	//select
	elseif(isset($_POST["Select"])){
		$id = $_POST["Select"];
		$fnd = $_POST["foodtype"];
		$price = $_POST["selectedPrice"];
		//find food
		$cal = selectres($conn, $fnd, $id);

		if(!empty($cal)){
			//cal total
			cart($cal, $price);
		}
		else{
			header("location:foodcart.php?eror=error");
			exit();
		}
	}
	elseif(isset($_POST["Cart"])){
		header("location:foodcart.php?eror=error");
		exit();
	}
	elseif(isset($_POST["Clear"])){
		clear2();
	}
	else{
		header("location:foodmenu.php?eror=error");
		exit();
	}
?>