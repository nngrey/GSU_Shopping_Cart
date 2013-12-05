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

<h1>View Cart</h1>
<a href="index.php?page=products">Go back to products page</a>
<form method="post" action="index.php?page=cart">

	<table>
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Subtotal</th>
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
					<td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>"/></td>
					<td>$<?php echo $row['price'] ?></td>
					<td>$<?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?></td>
				</tr>

				<?php

			}

			?>

			<tr>
				<td></td>
				<td><button type="submit" name="submit">Update Cart</button></td>
				<td></td>
			<td><h3>Total Price: $<?php echo $totalprice ?></h3></td>
			</tr>
	</table>

</form>

<p>To remove an item set it's quantity to zero.</p>