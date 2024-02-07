<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<body>
		<h1>รายการสั่งอาหาร</h1>
		<form name="form1" action="foodcartphp.php" method="POST">
		<button class='btn' type='submit' name='back' >Back</button>
		<?php
			if(isset($_SESSION["cart"])){
				$cartItems = $_SESSION["cart"];
				$total = $_SESSION["total"];
				if(!empty($cartItems)) {
					echo "<table border = 1>";
					echo "<tr>";
					echo "<td align=center>Name</td>";
					echo "<td align=center>Price</td>";
					// echo "<td align=center>Quantity</td>";
					echo "<td align=center>Delete</td>";
					echo "</tr>";
					foreach($_SESSION["cart"] as $x){
						echo "<tr>";	
						echo "<td align=center>".$x["name"]."</td>";
						echo "<td align=center>".$x["price"]."</td>";
						// echo "<td align=center>".$x["price"]."</td>";
						echo "<td align=center><button class='btn' type='submit' name='delete' value=".$x["id"].">Delete</button></td>";
						echo "</tr>";
					}
					echo "<tr>";
						echo "<td align=center>Total</td>";
						echo "<td align=center>".$total."</td>";
					echo "</tr>";
					echo "</table>";
				}
				else {
					echo "<p>Your cart is empty.</p>";
				}
			}
			else {
				echo "<p>Your cart is empty.</p>";
			}
			
		?>
		</form>
	</body>
</html>