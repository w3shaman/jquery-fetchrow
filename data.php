<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$host = "localhost";
$username = "root";
$password = "123xyz";
$database = "lab";

$con = mysqli_connect($host,$username,$password,$database);

$data = null;
$result = mysqli_query($con, "SELECT id, name, qty FROM item WHERE id = ".intval($_GET['id']));
if(mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_assoc($result);
}

mysqli_close($con);

// Encode it with JSON format
echo json_encode($data);
