<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ph FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);


$ph = $data["ph"];

if ($ph < 5) {
    $ketph = "Asam";
} else if ($ph >= 5 && $ph <= 7) {
    $ketph = "Netral";
} else if ($ph > 7) {
    $ketph = "Basa";
}
echo $ketph;
?>
