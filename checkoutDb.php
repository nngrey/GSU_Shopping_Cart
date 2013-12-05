<?php
$host = 'localhost';
$username = 'c43740';
$pswd = '1db23';

$con = mysql_connect($host, $username, $pswd);
if (!$con){
	die('Could not connect: ' . mysql_error());
	}
mysql_select_db("c43740", $con);

$sqlc = "CREATE TABLE checkout(
	Name varchar(128),
	Street varchar(128),
	City varchar(72),
	State varchar(4),
	Zip varchar(6),
	Card varchar (72),
	Exp varchar(12)      
	)";
	
mysql_query($sqlc, $con);

$sql3="INSERT INTO checkout 
	(Name, Street, City, State, Zip, Card, Exp)
	VALUES ('$_POST[name]',
	'$_POST[street]',
	'$_POST[city]',
	'$_POST[state]',
	'$_POST[zip]',
	'$_POST[card]',
	'$_POST[exp]',)";

$result3 = mysql_query($sql3);

if ($result3=="1"){
	echo "1 record added";
	echo "<form action='albums.html'>";
    echo "<input type='submit' value='Add Another?'>";
	echo "</form>";
}

mysql_close($con);

session_start();
session_destroy();

?>

<h2> Thank you for your order!</h2>

<p><a href="index.php?page=products">Return to Shopping</a></p>
