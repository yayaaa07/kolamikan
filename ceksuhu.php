<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT suhu FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);
$suhu = $data["suhu"];

$alert = '';
if ($suhu > 40) {
    $alert = "<script>
        swal({  
            title: 'Suhu Air Meningkat, Masukkan Air Baru Agar Suhu Kembali Normal',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ff0055',
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true
        });
    </script>";
} elseif ($suhu < 20) {
    $alert = "<script>
        swal({  
            title: 'Suhu Air Terlalu Rendah, Perhatikan Pendinginan',
            type: 'info',
            showCancelButton: true,
            reverseButtons: true,  
            confirmButtonColor: '#ff0055',
            
        });
    </script>";
}
echo $suhu . $alert;
?>
