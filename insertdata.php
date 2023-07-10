	<?php
 
    //Variabel database
    include "koneksi.php";

    // Prepare the SQL statement
	$var1 = $_GET['suhu'];
    $var2 = $_GET['tinggi'];
    $var3 = $_GET['cuaca'];
    $var4 = date("Y-m-d H:i:s");
        
    $result = mysqli_query ($con,"INSERT INTO sensor (suhu,ketinggian,cuaca,waktu) VALUES ('$var1','$var2','$var3','$var4')");
    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($con));
        }  
?>