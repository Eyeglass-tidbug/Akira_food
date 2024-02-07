<?php
	function isempy($fnd){
		$result;
		if(empty($fnd)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	
	function clear2(){
		session_start();
		session_destroy();
		header('Location: foodmenu.php');
		exit;
	}
	function cart($id, $price){
		session_start();
		if(isset($id)){
			if(!isset($_SESSION["cart"])){
				$_SESSION["cart"] = [];
			}
			if(!isset($_SESSION["total"])){
				$_SESSION["total"] = 0;
			}
			$_SESSION["cart"][] = $id;
			$_SESSION["total"] += $price;

			header("location: foodmenuphp.php?error=Work");
        	exit();
		}
		else{
			header("location: foodmenuphp.php?error=Notwork");
        	exit();
		}
	}

	function View2($conn, $fnd){
		$sql = "SELECT * FROM $fnd;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location:foodmenu.php?error=StmtFaild");
			exit();
		}                                                      
		mysqli_stmt_execute($stmt);
	
		$resultData = mysqli_stmt_get_result($stmt);
		$Arrays = [];
		while($row = mysqli_fetch_assoc($resultData)){
			array_push($Arrays, $row);
		}
		session_start();
		$_SESSION["fn"] = $Arrays;
		mysqli_stmt_close($stmt);
		
		header("location:foodmenu.php?eror=$fnd");
		exit();
	}
	
	function selectres($conn, $fnd, $id){
		$sql = "SELECT * FROM $fnd WHERE id = ?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location:foodv.php?error=StmtFaild");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		
		$resultData = mysqli_stmt_get_result($stmt);
		if($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else{
			$result = false;
			return $result;
		}
		mysqli_stmt_close($stmt);
		header("location:Update.php?error=error?name=".$_SESSION["name"]);
		exit();
	}

?>