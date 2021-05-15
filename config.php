<?php
//database connection
$dbhostname = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'login';

try{
$conn = new PDO("mysql:host=".$dbhostname.";dbname=".$dbname,$dbusername, $dbpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
exit("Error: " . $e->getMessage());
}
?> 