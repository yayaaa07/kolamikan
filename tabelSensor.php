<?php

include "koneksi.php"; 

$sql = mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, if(count(cuaca = 'hujan') > count(cuaca = 'tidak hujan'), 'Hujan', 'Tidak Hujan') as cuaca, LEFT(waktu, 10) as waktu FROM datasensor  GROUP BY day(waktu) ORDER BY waktu DESC LIMIT 5");
$result = array(); 
while($row=mysqli_fetch_array($sql)){
    
$suhu=number_format($row["suhu"], 2);
$ketinggian=number_format($row["ketinggian"], 2);
$waktu=$row["waktu"];
echo "<tr>
        <td id='suhu'>".$suhu."℃ "."</td>
        <td id='tinggi'>".$ketinggian." cm"."</td>
        <td>".$waktu."</td>
    </tr>";
echo $suhu, $ketinggian, $waktu;
}
//     $data[] = $row;
// };
// echo json_encode(array("result" => $data));



?>