<?PHP

$host="localhost";
$user="c43740";
$pass="1db23";
//$db="tutorials";

$con = mysql_connect($host, $user, $pass) or die("Sorry, cannot connect to server.");

//mysql_select_db($db) or die("Sorry, cannot select the db.");



mysql_select_db("c43740", $con);


$sqlc = "CREATE TABLE products(
	id_product int NOT NULL AUTO_INCREMENT,
	name varchar(100),
	description varchar(250),
	price decimal(6,0)     
	)";

mysql_query($sqlc, $con);

$sql3 = "INSERT INTO products 
	(name, description, price)
	VALUES (
	'product 1',
	'some decription',
	15)";

$result3 = mysql_query($sql3);

$sql4 = "INSERT INTO products 
	(name, description, price)
	VALUES (
	'product 2',
	'some decription',
	25)";

$result4 = mysql_query($sql4);

?>