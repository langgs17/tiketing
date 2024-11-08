<?php
include 'config.php';

$result = mysqli_query($mysqli, "SELECT * FROM kereta ORDER BY id_kereta DESC");

if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Train Data Management </h4>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" style="position:relative; float:left;" href="?page=kereta_tambah">Insert Train</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID Kereta</th>
                        <th>Nama Kereta</th>
                        <th>Tipe kereta</th>
                        <th>Kapasitas</th>
                        <th>Kode</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                            while($user_data = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>".$user_data['id_kereta']."</td>";
                                echo "<td>".$user_data['nama_kereta']."</td>";
                                echo "<td>".$user_data['tipe']."</td>";
                                echo "<td>".$user_data['kapasitas']."</td>";
                                echo "<td>".$user_data['kode']."</td>";
                                echo "<td><center><a href='?page=kereta_edit&id_kereta=$user_data[id_kereta]'class='btn btn-warning'>EDIT</a> 
                                | <a href='?page=kereta_hapus&id_kereta=$user_data[id_kereta]' class='btn btn-danger'>DELETE</a><center></td>";
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