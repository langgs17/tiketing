<?php
include 'config.php';

$result = mysqli_query($mysqli, "SELECT * FROM pemesanan ORDER BY id_pemesanan DESC");

if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> pemesanan Data Management </h4>
        <div class="card">

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>tanggal pesan</th>
                        <th>Stasiun Awal</th>
                        <th>Stasiun Tujuan</th>
                        <th>Train ID</th>
                        <th>Train Name</th>
                        <th>Departure Time</level>
                        <th>Arrival Time</level>
                        <th>harga</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                            
                            while($data = mysqli_fetch_array($result)) {

                                if ($data['status'] == 'belum dibayar') {
                                    $color = 'badge bg-label-danger me-1';
                                } elseif ($data['status'] == 'pending') {
                                    $color = 'badge bg-label-primary me-1';
                                } elseif ($data['status'] == 'sudah dibayar') {
                                    $color = 'badge bg-label-success me-1';
                                }
                                
                                echo "<tr>";
                                echo "<td>".$data['id_pemesanan']."</td>";
                                echo "<td>".$data['tanggal_pemesanan']."</td>";
                                echo "<td>".$data['id_user']."</td>";
                                echo "<td>".$data['id_route']."</td>";
                                echo "<td>".$data['tanggal_berangkat']."</td>";
                                echo "<td>".$data['waktu_tiba']."</td>";
                                echo "<td>".$data['waktu_berangkat']."</td>";
                                echo "<td>".$data['harga']."</td>";
                                echo "<td> Rp. " . number_format($data['harga'], 0, ',', '.') . "</td>";
                                echo 
                                    '<td><span class="' . $color . ';">' . ucfirst($data['status']) . '</span></td>';
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