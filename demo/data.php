<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-type: application/json");

$host = "localhost";
$username = "root";
$password = "Slacker";
$database = "lab";

$con = mysqli_connect($host,$username,$password,$database);

// Uncomment the sleep function if you want some the delay effect.
// sleep(1);

$data = null;
$where = "";
if (isset($_GET['category']))
  $where = " AND category = '" . mysqli_real_escape_string($con, $_GET['category']) . "'";

$result = mysqli_query($con, "SELECT id, name, qty FROM item WHERE id = ".intval($_GET['id']) . $where);
if(mysqli_num_rows($result) > 0){
  $data = mysqli_fetch_assoc($result);
  if (isset($_GET['category']))
    $data['request_param'] = $_SERVER['QUERY_STRING'];
}

mysqli_close($con);

// Encode it with JSON format
echo json_encode($data);
