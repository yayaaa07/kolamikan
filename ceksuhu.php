<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ketinggian FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);
$ketinggian = number_format($data["ketinggian"], 2); // Format ketinggian dengan 2 digit desimal

$alert = '';
if ($ketinggian > 40) {
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
} elseif ($ketinggian < 20) {
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
echo $ketinggian . $alert;
?>
