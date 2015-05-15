<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$host = "localhost";
$username = "root";
$password = "123xyz";
$database = "lab";

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database,$con) or die(mysql_error());

$data = null;
$result = mysql_query("SELECT id, name, qty FROM item WHERE id = ".intval($_GET['id']),$con);
if(mysql_num_rows($result) > 0){
    $data = mysql_fetch_assoc($result);
}

mysql_close($con);

// Encode it with JSON format
echo json_encode($data);
?>