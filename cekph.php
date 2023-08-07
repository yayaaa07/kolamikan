<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ph FROM sensor order by id DESC");
$data=mysqli_fetch_array($sql);
$ph=$data["ph"];

echo $ph;


?>