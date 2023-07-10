<?php

include "koneksi.php"; 

if (isset($_POST['cari'])) {

$cari = $_POST['cari'];
$sql = mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, if(count(cuaca = 'hujan') > count(cuaca = 'tidak hujan'), 'Hujan', 'Tidak Hujan') as cuaca, LEFT(waktu, 10) as waktu FROM datasensor WHERE LEFT(waktu, 10) = '$cari' GROUP BY LEFT(waktu, 10)");
}


?>