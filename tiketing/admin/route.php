<?php
include 'config.php';

$result = mysqli_query($mysqli, "SELECT * FROM route ORDER BY id_route DESC");

if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Route Data Management </h4>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" style="position:relative; float:left;" href="?page=route_tambah">Insert Route</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Route ID</th>
                        <th>Stasiun Awal</th>
                        <th>Stasiun Tujuan</th>
                        <th>Train ID</th>
                        <th>Train Name</th>
                        <th>Departure Time</level>
                        <th>Arrival Time</level>
                        <th>harga</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                            while($data = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>".$data['id_route']."</td>";
                                echo "<td>".$data['stasiun_asal']."</td>";
                                echo "<td>".$data['stasiun_tujuan']."</td>";
                                echo "<td>".$data['id_kereta']."</td>";
                                echo "<td>".$data['nama_kereta']."</td>";
                                echo "<td>".$data['waktu_tiba']."</td>";
                                echo "<td>".$data['waktu_berangkat']."</td>";
                                echo "<td> Rp. " . number_format($data['harga'], 0, ',', '.') . "</td>";
                                echo "<td><center><a href='?page=route_edit&id_route=$data[id_route]'class='btn btn-warning'>EDIT</a> 
                                | <a href='?page=route_hapus&id_route=$data[id_route]' class='btn btn-danger'>DELETE</a><center></td>";
                            }
                        ?>
                    </tr>
                </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" style="position:relative; float:right;" href="laporan_buku.php">Cetak Laporan</a>
            </div>
        </div>
    </div>
</div>