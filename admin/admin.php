<?php
include 'config.php';


$result = mysqli_query($mysqli, "SELECT * FROM users WHERE level='admin' ORDER BY id_user DESC");

if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Admin Data Management </h4>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" style="position:relative; float:left;" href="?page=user_tambah">Insert Admin</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Password</th>
                        <th>Level</level>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                            while($user_data = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>".$user_data['id_user']."</td>";
                                echo "<td>".$user_data['username']."</td>";
                                echo "<td>".$user_data['nama']."</td>";
                                echo "<td>".$user_data['alamat']."</td>";
                                echo "<td>".$user_data['password']."</td>";
                                echo "<td>".$user_data['level']."</td>";
                                echo "<td><center><a href='?page=user_edit&id_user=$user_data[id_user]'class='btn btn-warning'>EDIT</a> 
                                | <a href='?page=admin_hapus&id_user=$user_data[id_user]' class='btn btn-danger'>DELETE</a><center></td>";
                            }
                        ?>
                    </tr>
                </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" style="position:relative; float:right;" href="laporan_buku.php">Admin Data Report</a>
            </div>
        </div>
    </div>
</div>