<?php
include "koneksi.php"; 

$sql = mysqli_query($con, "SELECT avg(suhu) as suhu, avg(ketinggian) as ketinggian, avg(ph) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu) ORDER BY waktu DESC LIMIT 5");

while ($row = mysqli_fetch_array($sql)) {
    $suhu = $row["suhu"];
    $ketinggian = $row["ketinggian"];
    $ph = $row["ph"];
    $waktu = $row["waktu"];

    echo "<tr>
        <td>".$suhu."℃</td>
        <td>".$ketinggian." cm</td>
        <td>".$ph."</td>
        <td>".$waktu."</td>
    </tr>";
}
?>
