<?php
$mysqli= new mysqli("localhost","designhu_dbd","dreams@123","designhu_dbd");
if (! $mysqli) {
	die("connection failed:".mysqli_connect_error());
}
?>