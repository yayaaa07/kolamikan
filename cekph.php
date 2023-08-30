<?php
include "koneksi.php"; 

$sql = mysqli_query($con, "SELECT AVG(suhu) as avg_suhu, AVG(ketinggian) as avg_ketinggian, AVG(ph) as avg_ph, LEFT(waktu, 10) as waktu FROM datasensor GROUP BY DAY(waktu) ORDER BY waktu DESC LIMIT 5");

while ($row = mysqli_fetch_array($sql)) {
    $avg_suhu = number_format($row["avg_suhu"], 2);
    $avg_ketinggian = number_format($row["avg_ketinggian"], 2);
    $avg_ph = number_format($row["avg_ph"], 2);
    $waktu = $row["waktu"];

    echo "<tr>
        <td>".$avg_suhu."℃</td>
        <td>".$avg_ketinggian." cm</td>
        <td>".$avg_ph."</td>
        <td>".$waktu."</td>
    </tr>";
}
?>
