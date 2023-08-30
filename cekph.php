<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT avg(suhu) as suhu, avg(ketinggian) as ketinggian, avg(ph) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu) ORDER BY waktu DESC LIMIT 5");
$data = mysqli_fetch_array($sql);
$ph = number_format($data["ph"], 2); // Format pH dengan 2 digit desimal

$alert = null;
if ($ph < 5) {
    $alert = "pH Air Terlalu Rendah, Lakukan Penyesuaian pH";
} elseif ($ph > 8) {
    $alert = "pH Air Terlalu Tinggi, Lakukan Penyesuaian pH";
}

echo $ph;

if ($alert) {
    $alertScript = "<script>
        swal({  
            title: '$alert',
            type: 'info',
            showCancelButton: true,
            reverseButtons: true,  
            confirmButtonColor: '#ff0055'
        });
    </script>";
    echo $alertScript;
}
?>
