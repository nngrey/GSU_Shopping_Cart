<?PHP

$host="localhost";
$user="c43740";
$pass="1db23";
//$db="tutorials";

$con = mysql_connect($host, $user, $pass) or die("Sorry, cannot connect to server.");

//mysql_select_db($db) or die("Sorry, cannot select the db.");



mysql_select_db("c43740", $con);


?>