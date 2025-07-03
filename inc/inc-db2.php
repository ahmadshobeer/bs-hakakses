<?php
include "inc-mis-core.php";
$query = mysqli_query($conn,"SELECT * FROM tbl_config WHERE status='Y'");
$data = mysqli_fetch_array($query);

$userId=$data['user'];
$pass=$data['pswrd'];
$connect=$data['connector'];

$conndb2=odbc_connect($connect,$userId,$pass);
?>