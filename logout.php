<?php 
session_start();
session_unset();
// menghapus semua session
session_destroy();

 
// mengalihkan halaman sambil mengirim pesan logout
header("location:login.php?pesan=logout");
?>