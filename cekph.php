<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ph FROM sensor ORDER BY id DESC");
$data = mysqli_fetch_array($sql);
$ph = $data["ph"];

$alert = null;
if ($ph < 5) {
    $alert = "<script>
        swal({  
            title: 'pH Air Terlalu Rendah, Lakukan Penyesuaian pH',
            type: 'info',
            showCancelButton: true,
            reverseButtons: true,  
            confirmButtonColor: '#ff0055'
        });
    </script>";
} elseif ($ph > 8) {
    $alert = "<script>
        swal({  
            title: 'pH Air Terlalu Tinggi, Lakukan Penyesuaian pH',
            type: 'info',
            showCancelButton: true,
            reverseButtons: true,  
            confirmButtonColor: '#ff0055'
        });
    </script>";
}

echo $ph, $alert;
?>
