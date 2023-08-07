<?php


include "koneksi.php";

if (isset($_POST['cari'])) {

    $cari = $_POST['cari'];
    $sql = mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, avg(format(ph,2)) as ph, LEFT(waktu, 10) as waktu FROM sensor WHERE LEFT(waktu, 10) = '$cari' GROUP BY LEFT(waktu, 10)");
}


?>



