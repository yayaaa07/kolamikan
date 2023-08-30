<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT avg(format(suhu, 2)) as suhu, avg(format(ketinggian, 2)) as ketinggian, avg(format(ph, 2)) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu) ORDER BY waktu DESC LIMIT 5");
$data = mysqli_fetch_array($sql);
$ph = $data["ph"];

$alert = null;
if ($ph < 5) {
    $alert = "pH Air Terlalu Rendah, Lakukan Penyesuaian pH";
} elseif ($ph > 8) {
    $alert = "pH Air Terlalu Tinggi, Lakukan Penyesuaian pH";
}

echo $ph;

if ($alert) {
    echo "<script>
        swal({  
            title: '$alert',
            type: 'info',
            showCancelButton: true,
            reverseButtons: true,  
            confirmButtonColor: '#ff0055'
        });
    </script>";
}
?>
