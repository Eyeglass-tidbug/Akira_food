<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
		body {
            font-family: Sarabun;
			margin: 1;
			padding: 0;
			line-height: 1.6;
			word-spacing: 1.4px;
			display: grid;
			height: 100vh;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            border: 1px solid var(--clr-dark);
			gap: 1em;
        }
        .mid {
            width: 300px;
			height: 150px;
			background-color: #eee;
			font-weight: 700;
			text-align: center;
			border-radius: 10px;
        }
        .btn {
            width: 100%;
            height: 100%;
            background-color: #AEEE;
            border-radius: 8px;
            border-color: #EEE;
        }
		</style>
	</head>
	<body>
		<h1>รายการอาหาร</h1>
		<form name="form1" action="foodmenuphp.php" method="POST">
			<select name="foodtype" id="foodtype">
				<option value="foods">foods</option>
				<option value="drinks">drinks</option>
			</select>
			<button type="submit" name="Choose">Choose</button>
			<button type="submit" name="Clear">Clear</button>
			<div class="container">
			<?php
				if(isset($_SESSION["fn"])){
				foreach($_SESSION["fn"] as $x){
					echo '<div class="mid">';
						echo '<div class="small">';
						echo "<p><h3>". $x["name"]."</h3></p>";
						echo "<p><h4>$50.00</h4></p>";
						echo "<p><button class='btn' type='submit' name='Select' value=".$x["id"].">Select</button></p>";
						echo "</div>";
					echo "</div>";
							}
				}
			?>
			</div>
		</form>
	</body>
</html>