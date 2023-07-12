<?php
$con = mysqli_connect("localhost","root","","kolamikan");
// $con = mysqli_connect("localhost","root","12345","kolamikan");

// Melihat koneksi error atau tidak
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>