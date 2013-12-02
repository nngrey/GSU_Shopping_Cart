<?PHP

$server="localhost";
$user="tutorial";
$pass="molly02";
$db="tutorials";

mysql_connect($server, $user, $pass) or die("Sorry, cannot connect to server.");

mysql_select_db($db) or die("Sorry, cannot select the db.");


?>