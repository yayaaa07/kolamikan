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
                    <form action="" method="get" class="form-inline">
                        <div class="form-group">
                            <label for="tanggal">Cari Berdasarkan Tanggal:</label>
                            <input type="date" name="cari" id="tanggal">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Cari</button>
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
                            // Database configuration
                            $host = 'localhost';
                            $username = 'your_username';
                            $password = 'your_password';
                            $database = 'fish_pond';
                            
                            // Create connection
                            $con = mysqli_connect($host, $username, $password, $database);
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                exit();
                            }
                            
                            $batas = 10;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $hal_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            
                            $cari = "";
                            if (isset($_GET['cari'])) {
                                $cari = $_GET['cari'];
                            }
                            
                            // Prepare the SQL query based on the search date (if provided)
                            $sql = "SELECT 
                                        AVG(suhu) as suhu,
                                        AVG(ketinggian) as ketinggian,
                                        CASE WHEN SUM(cuaca = 'hujan') > 0 THEN 'Hujan' ELSE 'Tidak Hujan' END as cuaca,
                                        LEFT(waktu, 10) as waktu 
                                    FROM sensor ";
                            if (!empty($cari)) {
                                $sql .= "WHERE DATE(waktu) = '$cari' ";
                            }
                            $sql .= "GROUP BY DATE(waktu) 
                                     ORDER BY DATE(waktu) DESC 
                                     LIMIT $hal_awal, $batas";
                            
                            // Execute the query
                            $result = mysqli_query($con, $sql);
                            if (!$result) {
                                echo "Error executing query: " . mysqli_error($con);
                            }
                            
                            $no = $hal_awal + 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $suhu = number_format($row["suhu"], 2);
                                $ketinggian = number_format($row["ketinggian"], 2);
                                $waktu = $row["waktu"];
                                $cuaca = $row["cuaca"];
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $suhu . " ℃"; ?></td>
                                    <td><?php echo $ketinggian . " Cm"; ?></td>
                                    <td><?php echo $cuaca; ?></td>
                                    <td><?php echo $waktu; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {echo "href='?cari=$cari&halaman=$previous'";} ?>>Previous</a>
                            </li>
                            <?php
                             for ($x = 1; $x <= $total_hal; $x++) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?cari=<?php echo $cari; ?>&halaman=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_hal) {echo "href='?cari=$cari&halaman=$next'";} ?>>Next</a>
                            </li>
                        </ul>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
