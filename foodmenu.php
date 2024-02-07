<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div>
		<h1>รายการอาหาร</h1>
		<form name="form1" action="foodmenuphp.php" method="POST">
			<select name="foodtype" id="foodtype">
				<option value="foods">foods</option>
				<option value="drinks">drinks</option>
			</select>
			<button type="submit" name="Choose">Choose</button>
			<button type="submit" name="Clear">Clear</button>
			<button type="submit" name="Cart">Cart</button>
			<?php
				if(isset($_SESSION['cart'])) {

					$cartItems = $_SESSION['cart'];
	
					if(!empty($cartItems)) {
						echo "item in cart: ";
						echo count($cartItems);
					}
					}
			?>
		</div>
			<div class="container">
			<?php
				if(isset($_SESSION["fn"])){
				foreach($_SESSION["fn"] as $x){
					echo '<div class="mid">';
						echo '<div class="small">';
						echo "<p><h3>". $x["name"]."</h3></p>";
						$price = $x["price"];
						echo "<input type='hidden' name='selectedPrice' value='" . $price . "'>";
						echo "<p><h4>". $x["price"]."</h4></p>";
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