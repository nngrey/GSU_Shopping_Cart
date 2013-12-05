<?php

	if (isset($_POST['submit'])){

		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]["quantity"]=$val;
			}
		}

	}

?>

<h1>Checkout</h1>
<a href="index.php?page=products">Go back to products page</a>
<form method="post" action="index.php?page=cart">

	<table>
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Item Price</th>
		</tr>

		<?php

			$sql="SELECT * FROM products WHERE id_product IN (";

				foreach ($_SESSION['cart'] as $id => $value) {
					$sql.=$id.",";
				}

				$sql=substr($sql, 0, -1).") ORDER BY name ASC";
				$query=mysql_query($sql);
				$totalprice=0;
				while($row=mysql_fetch_array($query)){
					$subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price'];
					$totalprice+=$subtotal;
				?>

				<tr>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></td>
					<td>$<?php echo $row['price'] ?></td>
					<td>$<?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?></td>
				</tr>

				<?php

			}

			?>

			<tr>
				<td></td>
				<td></td>
				<td></td>
			<td><h3>Total Price: $<?php echo $totalprice ?></h3></td>
			</tr>

	</table>

</form>

<div id="container2">

	<script>
function checkVal(){

	if(document.getElementById('name').value == ""){
		alert("Please enter your name.");
		return false;
	}
	if(document.getElementById('street').value == ""){
		alert("Please enter your street address.");
		return false;
	}

	if(document.getElementById('city').value == ""){
		alert("Please enter your city.");
		return false;
	}
	if(document.getElementById('state').value == ""){
		alert("Please enter your state.");
		return false;
	}
	if(document.getElementById('zip').value == ""){
		alert("Please enter your zip code.");
		return false;
	}
	if(document.getElementById('card').value.length != 16){
		alert("Please enter a valid credit card number.");
		return false;
	}
	if(document.getElementById('exp').value == ""){
		alert("Please enter the expiration date.");
		return false;
	}
}

	</script>

	<table cellspacing="15">
		<tr>
			<th>Billing/Shipping Address:</th>
			<th>Billing Information:</th>
		</tr>
		<tr>	
			<form action="checkoutDb.php" method="post" onSubmit="return checkVal();">

		<td valign="top">
		<label>Name:</label> <input type="text" size="35" name="name" id="name"/> <br />
		<label>Street:</label> <input type="text" size="35" name="street" id="street"/><br />
		<label>City:</label> <input type="text" size="35" name="city" id="city"/><br />
		<label>State:</label> <input type="text" size="4" name="state" id="state"/><br />
		<label>Zip Code:</label> <input type="text" size="8" name="zip" id="zip"/>
		</td>

		<td valign="top">
		<label>Credit Card Number:</label> <input type="text" size="35" name="card" id="card"/><br />
		<label>Expiration Date (MM/YYYY):</label> <input type="text" size="10" name="exp" id="exp"/>
		<p><input align="right" type="submit" value="Checkout"/></p>
		</td>
			</form>
		</tr>
	</table>

</div>

