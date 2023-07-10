<?php

include "koneksi.php";

$sql = mysqli_query($con, "SELECT suhu FROM sensor order by id DESC");
$data=mysqli_fetch_array($sql);
$suhu=$data["suhu"];

if ($suhu > 40) {
    $alert = "<script>
  swal({  title: 'Suhu Air Meningkat, Masukkan Air Baru Agar Suhu Kembali Normal',
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#ff0055',
    reverseButtons: true,
    focusConfirm: false,
    focusCancel: true});
</script>";
} else {
    $alert = null;
}
echo $suhu, $alert;


?>