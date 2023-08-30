

<?php
include "koneksi.php"; 

$sql = mysqli_query($con, "SELECT avg(format(suhu, 2)) as suhu, avg(format(ketinggian, 2)) as ketinggian, avg(format(ph, 2)) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu) ORDER BY waktu DESC LIMIT 5");

while ($row = mysqli_fetch_array($sql)) {
    $suhu = number_format($row["suhu"], 2);
    $ketinggian = number_format($row["ketinggian"], 2);
    $ph = number_format($row["ph"], 2);
    $waktu = $row["waktu"];

    echo "<tr>
        <td>".$suhu."℃</td>
        <td>".$ketinggian." cm</td>
        <td>".$ph."</td>
        <td>".$waktu."</td>
    </tr>";
}
?>

