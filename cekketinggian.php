<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT avg(suhu) as suhu, avg(ketinggian) as ketinggian, avg(ph) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu) ORDER BY waktu DESC LIMIT 5");
$data = mysqli_fetch_array($sql);
$ketinggian = number_format($data["ketinggian"], 2); 

$alert = null;
if ($ketinggian > 150) {
    $alert = "Buka Penutup Air Agar Air Berkurang dan Tidak Penuh";
} elseif ($ketinggian < 50) {
    $alert = "Ketinggian Air Rendah, Tambahkan Air Agar Tidak Kering";
}

echo $ketinggian;

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
