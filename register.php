<?php
include 'config.php';
if(isset($_POST['add'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];


    include 'config.php';
    $query = mysqli_query($mysqli, "INSERT INTO users (username,nama,alamat,password,level) VALUES('$username','$nama','$alamat','$password','user')");
    

    if($query) {

        echo "<script>alert('Tambah data users berhasil');location.href='index.php  ';</script>";
    } else {
        echo '<script>alert("Tambah data users gagal")</script>';
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneat Ticket | Lang</title>
    <!-- Link ke Bootstrap CSS untuk styling modern -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            max-width: 500px;
            width: 100%;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-weight: bold;
            color: #007bff;
        }
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2 class="form-title text-center mb-4">Buat Akun</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Link ke Bootstrap JS untuk interaktivitas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
