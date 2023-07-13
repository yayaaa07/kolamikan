<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ketinggian FROM sensor order by id DESC");
$data=mysqli_fetch_array($sql);
$ketinggian=$data["ketinggian"];
if($ketinggian > 300 ){
    $ket = "Tidak Aman";
}else{
    $ket = "Aman";
}
echo  $ket;
