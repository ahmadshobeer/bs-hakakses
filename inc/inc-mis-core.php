<?php 
$servername = "localhost"; 
$username   = "root";  
$password   = ""; 
$dbname     = "mis_core"; 
$dbport     = "3306";
$conn = mysqli_connect("$servername","$username","$password","$dbname","$dbport") or die ('Error Connection to Database');
?>