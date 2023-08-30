<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT suhu FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);
$suhu = $data["suhu"];

$alert = '';
if ($suhu > 40) {
    $alert = "Suhu Air Meningkat, Masukkan Air Baru Agar Suhu Kembali Normal";
} elseif ($suhu < 20) {
    $alert = "Suhu Air Terlalu Rendah, Perhatikan Pendinginan";
}

echo $suhu;

if (!empty($alert)) {
    echo "<script>
        swal({  
            title: '$alert',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ff0055',
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true
        });
    </script>";
}
?>
