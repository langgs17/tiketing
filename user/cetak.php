<?php
include 'config.php';

// Ambil data pemesanan yang telah berhasil disimpan di database
$id_pemesanan = $_GET['id_pemesanan']; // ID pemesanan didapat dari query string

$query = "SELECT pemesanan.*, route.*
          FROM pemesanan 
          JOIN route ON pemesanan.id_route = route.id_route
          WHERE pemesanan.id_pemesanan = '$id_pemesanan'";

$result = mysqli_query($mysqli, $query);
$pemesanan = mysqli_fetch_assoc($result);

if ($pemesanan) {
    $nama_pelanggan = $pemesanan['nama_pelanggan'];
    $stasiun_asal = $pemesanan['stasiun_asal'];
    $stasiun_tujuan = $pemesanan['stasiun_tujuan'];
    $tanggal_berangkat = date('d-m-Y', strtotime($pemesanan['tanggal_berangkat'])); // Format tanggal
    $waktu_keberangkat = date('H:i', strtotime($pemesanan['waktu_berangkat'])); // Format waktu
    $seat = $pemesanan['seat'];
    $harga_total = $pemesanan['harga_total'];
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
    <title>E-Tiket Kereta</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .tiket-container {
            width: 650px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 180px;
            height: auto;
        }
        .header h2 {
            margin-top: 10px;
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .ticket-details {
            margin-top: 20px;
            font-size: 16px;
        }
        .ticket-details p {
            margin: 10px 0;
        }
        .ticket-details .label {
            font-weight: bold;
            color: #444;
            display: inline-block;
            width: 180px;
        }
        .ticket-details .value {
            color: #555;
            display: inline-block;
        }
        .divider {
            border-top: 2px solid #ccc;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
        }
        .footer button {
            padding: 12px 25px;
            background-color: #008CBA;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            width: 220px;
        }
        .footer button:hover {
            background-color: #006F8A;
        }
        .footer p {
            margin-top: 15px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="tiket-container">
        <div class="header">
            <!-- Logo atau Gambar Header -->
            <img src="https://syfaganjarstory.com/wp-content/uploads/2023/01/e-ticket-kereta_reg_1.webp" alt="Logo Kereta">
            <h2>E-Tiket Kereta Api</h2>
        </div>

        <div class="ticket-details">
            <p><span class="label">Nama Pemesan:</span><span class="value"> <?php echo htmlspecialchars($nama_pelanggan); ?> </span></p>
            <p><span class="label">Stasiun Asal:</span><span class="value"><?php echo htmlspecialchars($stasiun_asal); ?> </span></p>
            <p><span class="label">Stasiun Tujuan:</span><span class="value"><?php echo htmlspecialchars($stasiun_tujuan); ?> </span></p>
            <p><span class="label">Tanggal Keberangkatan:</span><span class="value"><?php echo $tanggal_berangkat; ?> </span></p>
            <p><span class="label">Waktu Keberangkatan:</span><span class="value"><?php echo $waktu_keberangkat; ?> </span></p>
            <p><span class="label">Jumlah Tiket:</span><span class="value"><?php echo $seat; ?> </span></p>
            <p><span class="label">Total Harga:</span><span class="value">Rp <?php echo number_format($harga_total, 2, ',', '.'); ?> </span></p>
        </div>

        <div class="divider"></div>

        <div class="footer">
            <button onclick="window.print()">Cetak Tiket</button>
            <p>* Tanda terima ini sah digunakan untuk perjalanan</p>
        </div>
    </div>

</body>
</html>
