<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// Pastikan id_user dan id_route ada nilainya
$id_user = isset($_SESSION['users']['id_user']) ? $_SESSION['users']['id_user'] : null;
$id_route = isset($_GET['id_route']) ? $_GET['id_route'] : null;



// Ambil data stasiun asal, tujuan, dan harga dari tabel route
$result = mysqli_query($mysqli, "SELECT stasiun_tujuan, stasiun_asal, harga FROM route WHERE id_route=$id_route");

if (!$result || mysqli_num_rows($result) === 0) {
    echo '<script>alert("Data route tidak ditemukan atau ID route tidak valid");location.href="?page=kereta";</script>';
    exit;
}

$data = mysqli_fetch_array($result);
$harga_per_seat = $data['harga'];

if (isset($_POST['add'])) {
    // Ambil data dari form
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $seat = $_POST['seat'];
    $tanggal_berangkat = $_POST['tanggal_berangkat'];
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];

    // Pastikan semua variabel yang diperlukan telah terisi
    if ($id_user && $id_route && $nama_pelanggan && $seat && $tanggal_berangkat && $kategori) {
        // Hitung harga total
        $harga_total = $harga_per_seat * $seat;

        // Insert data ke database
        $query = "INSERT INTO pemesanan (nama_pelanggan, id_route, id_user, seat, tanggal_berangkat, kategori, harga_total, status) 
                  VALUES ('$nama_pelanggan', '$id_route', '$id_user', '$seat', '$tanggal_berangkat', '$kategori',  '$harga_total', '$status')";

        $result = mysqli_query($mysqli, $query);
        
        if ($result) {
            echo '<script>alert("Add Train Data Successfully");location.href="?page=pembayaran";</script>';
        } else {
            echo '<script>alert("Add Train Data Failed: ' . mysqli_error($mysqli) . '");</script>';
        }
    } else {
        echo '<script>alert("Pastikan semua data terisi dengan benar!");</script>';
    }
}
?>

<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h3 class="text-white mb-4">BOOKING</h3>
                <h5 class="text-white"></h5>
                <h1 class="text-white mb-4">Online Ticket Booking</h1>                        
            </div>
            <div class="col-lg-6">
                <h1 class="text-white mb-3">Pergi Ke Mana Hari Ini?</h1>
                <form name="add" method="post" action="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Kamu" required>
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="date" name="tanggal_berangkat" class="form-control bg-white border-0" id="tanggal_berangkat" placeholder="Tanggal Berangkat" data-target="#date3" data-toggle="datetimepicker" required />
                                <label for="tanggal_berangkat">Tanggal Berangkat</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control bg-white border-0" name="seat" id="seat" placeholder="1" min="1" required>
                                <label for="seat">Untuk Berapa Orang</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select bg-white border-0" name="kategori" id="kategori" required>
                                    <option value="dewasa">Dewasa</option>
                                    <option value="anak-anak">Anak-anak</option>
                                </select>
                                <label for="kategori">Kategori</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form">
                                <input type="text" readonly class="form-control bg-white border-0" id="tujuan" placeholder="<?php echo isset($data) ? $data['stasiun_asal'] . ' -- ' . $data['stasiun_tujuan'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-white border-0" name="catatan" placeholder="Special Request" id="catatan" style="height: 150px"></textarea>
                                <label for="catatan">Deskripsi</label>
                                <input type="hidden" value="belum bayar" name="status">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary text-white w-100 py-3" name="add" method="post" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
