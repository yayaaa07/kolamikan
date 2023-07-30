<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian head tetap sama -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-10 text-center">
                <h1>Data Monitoring Kolam Ikan</h1>
                <div class="row justify-content-center">
                    <form action="data.php" method="get" class="form-inline">
                    <div class="form-group">
                        <input type="date" name="cari" id="tanggal">
                    </div>
                    <div class="form-group col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Cari</button>
                    </div>
                    </form>
                </div>
                
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Suhu</th>
                                <th scope="col">Ketinggian</th>
                                <th scope="col">Cuaca</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            <?php 
                                include 'koneksi.php';
                                $batas = 10;
                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                $hal_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                // Ubah query berikut agar data sesuai dengan tanggal yang dipilih
                                if ($_GET['cari']) {
                                    $cari = $_GET['cari'];
                                    $sql = mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, if(count(cuaca = 'hujan') > count(cuaca = 'tidak hujan'), 'Hujan', 'Tidak Hujan') as cuaca, LEFT(waktu, 10) as tanggal FROM sensor WHERE LEFT(waktu, 10) = '$cari' GROUP BY LEFT(waktu, 10) ORDER BY waktu DESC LIMIT $hal_awal, $batas");
                                } else {
                                    $sql = mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, if(count(cuaca = 'hujan') > count(cuaca = 'tidak hujan'), 'Hujan', 'Tidak Hujan') as cuaca, LEFT(waktu, 10) as tanggal FROM sensor GROUP BY LEFT(waktu, 10) ORDER BY tanggal DESC LIMIT $hal_awal, $batas");
                                }

                                $result = array();
                                while ($row = $sql->fetch_assoc()) {
                                    $suhu = number_format($row["suhu"], 2);
                                    $ketinggian = number_format($row["ketinggian"], 2);
                                    // Kita bisa langsung menggunakan $row['tanggal'] tanpa membuat variabel terpisah $waktu
                                    $result[] = $row;
                                }   
                                
                                $no = $hal_awal + 1;
                                foreach ($result as $res) {
                                
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $suhu. " ℃"; ?></td>
                                <td><?php echo $ketinggian." Cm"; ?></td>
                                <td><?php echo $res['cuaca']; ?></td>
                                <td><?php echo $res['tanggal']; ?></td>
                            </tr>
                             <?php } ?>

                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link"<?php if($halaman > 1){echo "href='?cari=&halaman=$previous'";} ?>>Previous</a>
                            </li>
                        <?php
                         for($x=1; $x<=$total_hal;$x++){
                            ?>
                            <li class="page-item"><a class="page-link" href="?cari=&halaman=<?php echo $x?>"><?php echo $x;?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" <?php if($halaman < $total_hal) {echo "href='?cari=&halaman=$next'";}?>>Next</a>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
