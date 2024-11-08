<?php
include 'config.php';

$result = mysqli_query($mysqli, "SELECT * FROM stasiun ORDER BY id_stasiun DESC");

if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Manage Train Station Data</h4>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" style="position:relative; float:left;" href="?page=stasiun_tambah">Insert Train Station</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID Stasiun</th>
                        <th>Nama Stasiun</th>
                        <th>kota </th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                            while($user_data = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>".$user_data['id_stasiun']."</td>";
                                echo "<td>".$user_data['nama_stasiun']."</td>";
                                echo "<td>".$user_data['kota']."</td>";
                                echo "<td><center><a href='?page=stasiun_edit&id_stasiun=$user_data[id_stasiun]'class='btn btn-warning'>EDIT</a> | <a href='?page=stasiun_hapus&id_stasiun=$user_data[id_stasiun]' class='btn btn-danger'>DELETE</a><center></td>";
                            }
                        ?>
                    </tr>
                </tbody>
                </table>
                </div>
            </div>
            <div class="card-header">
                <a class="btn btn-secondary" style="position:relative; float:right;" href="?page=kereta_tambah">Print Out Train Station Data</a>
            </div>
        </div>
    </div>
</div>