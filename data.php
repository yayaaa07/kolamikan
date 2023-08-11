<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Data Monitoring Kolam Ikan</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-10 text-center">
                <h1>Data Monitoring Kolam Ikan</h1>
                <div class="row justify-content-center">
                    <form action="data.php" method="get" class="form-inline">
                    <div class="from-group">
                        <input type="date" name="cari" id="tanggal">
                    </div>
                    <div class="form-group col-sm-2">
                    <button type="submit"  class="btn btn-primary mb-2">Cari</button>
                    </div>
                    </form>
                </div>
                
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">No</td>
                                <td scope="col">Suhu</td>
                                <td scope="col">Ketinggian</td>
                                <td scope="col">pH</td>
                                <td scope="col">Waktu</td>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            <?php 
                                include 'koneksi.php';
                                $batas = 10;
                                $halaman =isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                $hal_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                                $previous = $halaman-1;
                                $next = $halaman +1;
                                $data =  mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, avg(format(ph,2)) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu)");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_hal = ceil($jumlah_data / $batas);
                                $no = $hal_awal +1;
                                if ($_GET['cari']) {
                                    $cari = $_GET['cari'];
                                    $sql =  mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, avg(format(ph,2)) as ph, LEFT(waktu, 10) as waktu FROM sensor WHERE LEFT(waktu, 10) = '$cari' GROUP BY day(waktu) LIMIT $hal_awal, $batas");
                                } else {
                                    $sql =  mysqli_query($con, "SELECT avg(format(suhu,2)) as suhu, avg(format(ketinggian,2)) as ketinggian, avg(format(ph,2)) as ph, LEFT(waktu, 10) as waktu FROM sensor GROUP BY day(waktu) ORDER BY day(waktu) DESC LIMIT $hal_awal, $batas");
                                }
                                
                                $result = array();
                                while ($row = $sql->fetch_array()) {
                                    $suhu = number_format($row["suhu"], 2);
                                    $ketinggian = number_format($row["ketinggian"], 2);
                                    $ph = number_format($row["ph"], 2);
                                    $waktu = $row["waktu"];
                                    $result[] = $row;
                                }

                                foreach ($result as $res) {
                                    $suhu = number_format($res["suhu"], 2);
                                    $ketinggian = number_format($res["ketinggian"], 2);
                                    $ph = number_format($res["ph"], 2);
                                    $waktu = $res["waktu"];
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $suhu . " ℃"; ?></td>
                                    <td><?php echo $ketinggian . " Cm"; ?></td>
                                    <td><?php echo $ph; ?></td> 
                                    <td><?php echo $waktu; ?></td>
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