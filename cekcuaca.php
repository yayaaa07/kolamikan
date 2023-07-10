<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT cuaca FROM sensor order by id DESC");
$data=mysqli_fetch_array($sql);
$cuaca=$data["cuaca"];

echo $cuaca;


?>