<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT suhu FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);
$suhu = $data["suhu"];

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
