<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ketinggian FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);
$ketinggian = $data["ketinggian"];

$alert = '';
if ($ketinggian > 150) {
    $alert = "<script>
        swal({  
            title: 'Buka Penutup Air Agar Air Berkurang dan Tidak Penuh',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ff0055',
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true
        });
    </script>";
} elseif ($ketinggian < 50) {
    $alert = "<script>
        swal({  
            title: 'Ketinggian Air Rendah, Tambahkan Air Agar Tidak Kering',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ff0055',
            reverseButtons: true,
            
        });
    </script>";
}

echo $ketinggian . $alert;
?>
