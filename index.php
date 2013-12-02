//shopping cart app

<?php

session_start();

require("connection.php");

if(isset($_GET['page'])){

	$pages=array("products", "cart");

	if(in_array($_GET['page'], $pages)) {

		$_page=$_GET['page'];

	}else{

		$_page="products";

	}


}else{

	$_page="products";
}

?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="reset.css"/>
	<link rel="stylesheet" href="style.css"/>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<title>Shopping Cart</title>

	<script type="text/javascript">
	$(function(){

	});

	</script>

</head>

<body>

	<div id="container">

		<div id="main">

			<?php require($_page.".php"); ?>

		</div>

		<div id="sidebar">
			<h1>Cart</h1>

			<?php

			if (isset($_SESSION['cart'])){

				$sql="SELECT * FROM products WHERE id_product IN (";

				foreach ($_SESSION['cart'] as $id => $value) {
					$sql.=$id.",";
				}

				$sql=substr($sql, 0, -1).") ORDER BY name ASC";
				$query=mysql_query($sql);
				while($row=mysql_fetch_array($query)){

				?>

					<?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?><br />
				<?php

				}

				?>

				<hr />
				<a href="index.php?page=cart">Go to cart</a>
			<?php 

			}else{

				echo "<p>Your cart is empty. Please add some products.</p>";
			}

			?>

		</div>

	</div>

</body>

</html>
