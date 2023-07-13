<?php
include "koneksi.php";

$sql = mysqli_query($con, "SELECT ketinggian FROM sensor order by id DESC");
$data=mysqli_fetch_array($sql);
$ketinggian=$data["ketinggian"];

if($ketinggian > 300){
    $alert = "<script>
  swal({  title: 'Buka Penutup Air Agar Air Berkurang dan Tidak Penuh',
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
echo $ketinggian, $alert;
?>