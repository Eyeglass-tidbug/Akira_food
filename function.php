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
	
	function clear(){
		session_start();
		session_destroy();
		header('Location: foodv.php');
		exit;
	}
	function clear2(){
		session_start();
		session_destroy();
		header('Location: foodmenu.php');
		exit;
	}
	
	function View($conn, $fnd){
		$sql = "SELECT * FROM $fnd;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location:foodv.php?error=StmtFaild");
			exit();
		}                                                      
		mysqli_stmt_execute($stmt);
	
		$resultData = mysqli_stmt_get_result($stmt);
		$Arrays = array();
		while($row = mysqli_fetch_assoc($resultData)){
			array_push($Arrays, $row);
		}
		session_start();
		$_SESSION["fn"] = $Arrays;
		mysqli_stmt_close($stmt);
		
		header("location:foodv.php?eror=$fnd");
		exit();
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
		$Arrays = array();
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
			
			session_start();
			$_SESSION["fnd"] = $fnd;
			$_SESSION["id"] = $row["id"];
			$_SESSION["name"] = $row["name"];
			$_SESSION["recipes"] = $row["recipes"];
			$_SESSION["ingredient"] = $row["ingredient"];
			
		}
		else{
			$result = false;
			return $result;
		}
		mysqli_stmt_close($stmt);
		header("location:Update.php?error=error?name=".$_SESSION["name"]);
		exit();
	}
	
	function emptyadd($name, $rescipes, $ingredient){
		$result;
		if(empty($name) || empty($rescipes) || empty($ingredient)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function invalidname($array){
		$result;
		foreach($array as $x){
			if (!preg_match("/^[a-zA-Z]*$/", $x)){
				$result = true;
				return $result;
			}
			else{
			$result = false;
			return $result;
			}
		}
	}
	
	function Addmenu($conn, $fnd, $name, $recipes, $ingredient){
		$sql = "INSERT INTO $fnd (name, recipes, ingredient) VALUES (?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location:foodv.php?error=StmtFaild");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "sss", $name, $recipes, $ingredient);
		mysqli_stmt_execute($stmt);
		
		
		header("location:foodv.php?eror=ADDSUCCESSFUL");
		exit();
	}
	
	function Update($conn, $fnd, $id, $rescipes, $ingredient){	
		$sql = "UPDATE $fnd SET recipes = ?, ingredient = ? WHERE $fnd.id = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location:foodv.php?error=StmtFaild");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "sss", $rescipes, $ingredient, $id);
		mysqli_stmt_execute($stmt);
		
		View($conn, $fnd);
		header("location:foodv.php?eror=UpdateSUCCESSFUL?".$rescipes);
		exit();
	}
?>