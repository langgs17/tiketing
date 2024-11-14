<?php
include 'config.php';

// Ambil ID pemesanan dari query string
$id_pemesanan = $_GET['id_pemesanan'];

// Query untuk mengambil data pemesanan dan rute berdasarkan ID pemesanan
$query = "SELECT pemesanan.*, route.* FROM pemesanan 
          JOIN route ON pemesanan.id_route = route.id_route 
          WHERE pemesanan.id_pemesanan = '$id_pemesanan'";

$result = mysqli_query($mysqli, $query);
$pemesanan = mysqli_fetch_assoc($result);

// Jika data pemesanan ditemukan, ambil informasinya
if ($pemesanan) {
    $nama_pelanggan = $pemesanan['nama_pelanggan'];
    $stasiun_asal = $pemesanan['stasiun_asal'];
    $stasiun_tujuan = $pemesanan['stasiun_tujuan'];
    $tanggal_berangkat = date('l, d F Y', strtotime($pemesanan['tanggal_berangkat']));
    $waktu_keberangkat = date('H:i', strtotime($pemesanan['waktu_berangkat']));
    $waktu_tiba = date('H:i', strtotime($pemesanan['waktu_tiba']));
    $seat = $pemesanan['seat'];
    $harga_total = number_format($pemesanan['harga_total'], 0, ',', '.');
    $kode_booking = strtoupper(substr(md5($id_pemesanan), 0, 8));
} else {
    echo "Data pemesanan tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
    <style>
        /* CSS untuk tampilan tiket */
        .ticket-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            font-family: Arial, sans-serif;
            position: relative;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .header img {
            width: 30px;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
        }
        .logo {
            display: flex;
            align-items: center; /* Untuk menengahkan logo Sneat */
            font-size: 20px;
            font-weight: bold;
        }
        .kode-booking {
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
        }
        .ticket-info {
            margin-top: 15px;
        }
        .info-item {
            margin: 5px 0;
        }
        .station-info {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .station-info div {
            text-align: center;
            font-weight: bold;
        }
        .station-info div span {
            display: block;
            font-size: 14px;
            color: #555;
        }
        .arrow {
            font-size: 24px;
            align-self: center;
        }
        .details {
            font-size: 12px;
            color: #555;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .price {
            font-size: 16px;
            font-weight: bold;
            color: #FF5733;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <script>
        function printTicket() {
            window.print();
        }
    </script>
</head>
<body onload="printTicket()">

<div class="ticket-container">
    <div class="header">
        <div class="logo"><img src="img/logo-cetak.ico"> Sneat </div>
        <div class="title">E-Tiket </div>
        <div class="kode-booking">Kode Booking: <?= $kode_booking ?></div>
    </div>

    <div class="ticket-info">
        <div class="info-item"><strong>Nama Penumpang:</strong> <?= htmlspecialchars($nama_pelanggan) ?></div>
        <div class="info-item"><strong>Tanggal Berangkat:</strong> <?= htmlspecialchars($tanggal_berangkat) ?></div>
    </div>

    <div class="station-info">
        <div>
            <strong><?= htmlspecialchars($waktu_keberangkat) ?></strong>
            <span><?= htmlspecialchars($stasiun_asal) ?></span>
        </div>
        <div class="arrow">&#x27A4;</div>
        <div>
            <strong><?= htmlspecialchars($waktu_tiba) ?></strong>
            <span><?= htmlspecialchars($stasiun_tujuan) ?></span>
        </div>
    </div>

    <div class="price">Harga Total: Rp <?= htmlspecialchars($harga_total) ?></div>

    <div class="details">
        <p>Gunakan e-tiket untuk cetak boarding pass di stasiun, dari 7x24 jam sebelum keberangkatan.</p>
        <p>Untuk boarding, bawa tanda pengenal resmi sesuai yang digunakan pada saat pemesanan.</p>
        <p>Tiba di stasiun setidaknya 60 menit sebelum keberangkatan.</p>
    </div>
</div>

</body>
</html>
