<?php
include 'config.php';

$query = mysqli_query($mysqli, "SELECT pemesanan.*, route.* FROM pemesanan INNER JOIN route ON pemesanan.id_route = route.id_route WHERE pemesanan.status = 'pending' ORDER BY pemesanan.id_pemesanan DESC");


?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Konfirmasi Pembayaran </h4>
        <div class="card">

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>ID User</th>
                        <th>Route Kereta</th>
                        <th>Train Name</th>
                        <th>harga</th>
                        <th><center>status</center></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                            
                            while($data = mysqli_fetch_array($query)) {

                                if ($data['status'] == 'belum bayar') {
                                    $color = 'badge bg-label-danger me-1';
                                } elseif ($data['status'] == 'pending') {
                                    $color = 'badge bg-label-primary me-1';
                                } elseif ($data['status'] == 'sudah bayar') {
                                    $color = 'badge bg-label-success me-1';
                                }
                                
                                echo "<tr>";
                                echo "<td>".$data['nama_pelanggan']."</td>";
                                echo "<td>".$data['id_user']."</td>";
                                echo "<td>".$data['stasiun_asal'].' - '.$data['stasiun_asal']."</td>";
                                echo "<td>".$data['nama_kereta']."</td>";
                                echo "<td> Rp. " . number_format($data['harga_total'], 0, ',', '.') . "</td>";
                                echo "<td><center><a href='?page=pem_confirm&id_pemesanan=$data[id_pemesanan]'class='btn btn-primary'>Konfirmasi</a>";                            }
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