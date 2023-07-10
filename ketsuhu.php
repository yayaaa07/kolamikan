<?php
include "koneksi.php";


$sql = mysqli_query($con, "SELECT suhu FROM sensor order by id DESC");
$data=mysqli_fetch_array($sql);
$suhu=$data["suhu"];
if ($suhu < 25) {
    $ketsuhu = "Suhu Air dingin";
} else if ($suhu >= 25 && $suhu <= 32) {
    $ketsuhu = "Suhu Air Ideal";
} else if ($suhu > 33) {
    $ketsuhu = "Suhu Air Panas";
}
echo $ketsuhu;

?>