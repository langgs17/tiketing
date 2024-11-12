<?php
include "config.php";
$id_user = $_SESSION['users']['id_user'];
$result = mysqli_query($mysqli, "SELECT pemesanan.*, route.* FROM pemesanan INNER JOIN route ON pemesanan.id_route = route.id_route WHERE pemesanan.id_user = '$id_user'");
?>

<style>
  .btn-padding {
    padding: 10px 20px;
    margin-top: 10px;
  }

  .td-padding {
    text-align: center;
    padding: 10px;
    margin-top: 10px;
  }
</style>

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Daftar Tiket Anda</h3>  
    </div>
</div>
<!-- Header End -->

<!-- Packages Start -->
<div class="container-fluid packages py-5">
    <div class="container py-5">
        <div class="packages-row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nama_kereta = $row['nama_kereta'];
                    $seat = $row['seat'];
                    $stasiun_asal = $row['stasiun_asal'];
                    $stasiun_tujuan = $row['stasiun_tujuan'];

                    $status = $row['status'];

                    if ($status == 'belum bayar') {
                        $status_class = 'bg-label-danger'; 

                    } elseif ($status == 'pending') {
                        $status_class = 'bg-label-success'; 

                    } elseif ($status == 'sudah bayar') {
                        $status_class = 'bg-label-primary';
                    }
                    ?>
                    <div class="packages-item">
                        <div class="packages-content bg-light p-4 mb-4 rounded shadow-sm">
                            <h5 class="mb-3"><?php echo $stasiun_asal; ?> <small class="fa fa-arrow-right text-black"></small> <?php echo $stasiun_tujuan; ?></h5>
                            <p class="text-uppercase mb-4 font-weight-bold"><?php echo $nama_kereta; ?></p>
                            <table style="width: 100%;">
                                <tr class="mb-4">
                                    <td>Nama Pelanggan</td>
                                    <td>: <?php echo $row['nama_pelanggan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="status-pending">Jumlah penumpang</td>
                                    <td>: <?php echo $seat; ?> Orang</td><td hidden><?php echo $row['id_pemesanan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Berangkat</td>
                                    <td>: <?php echo $row['tanggal_berangkat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Berangkat</td>
                                    <td>: <?php echo $row['waktu_berangkat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Tiba</td>
                                    <td>: <?php echo $row['waktu_tiba']; ?></td>
                                </tr>
                                <tr class="mb-4">
                                    <td>Harga Total</td>
                                    <td>: <?php echo $row['harga_total']; ?></td>
                                </tr>
                                <tr class="mb-4">
                                    <td style="color: rgba(0, 0, 0, 0.0);">status</td>
                                    <td class="status-wrapper <?php echo $status_class; ?>">
                                        <?php echo $row['status']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <?php if ($status == 'belum bayar') { ?>
                                        <td><a href="?page=pembatalan&id_pemesanan=<?php echo $row['id_pemesanan']?>" class='btn btn-danger btn-padding'>Batalkan Pesanan</a></td>
                                        <td><a href="?page=bayar&id_pemesanan=<?php echo $row['id_pemesanan']?>" class='btn btn-success btn-padding'>Bayar Sekarang</a></td>
                                    <?php } elseif ($status == 'sudah bayar') { ?>
                                        <td><a href="?page=cetak&id_pemesanan=<?php echo $row['id_pemesanan']?>" class='btn btn-primary btn-padding'>Cetak Tiket</a></td>
                                    <?php } elseif ($status == 'pending') { ?>
                                        <td><span class="status-pending bg-label-success">Menunggu Konfirmasi</span></td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="mx-auto text-center"><font size="5">Tidak Ada Tiket Yang Belum Dibayar</font></div>';
            }
            ?>
        </div>
    </div>
</div>

<style>
    .packages-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Jarak antar item */
        justify-content: flex-start; /* Menjaga jarak antar item */
    }

    .status-pending {
        white-space: nowrap; /* Menambahkan jarak antar baris untuk teks 'Menunggu Konfirmasi' */
        font-size: 16px;  /* Anda bisa mengatur ukuran font sesuai kebutuhan */
    }

    .packages-item {
        flex: 0 0 calc(33.333% - 20px); /* Lebar tetap 1/3 dari container */
        box-sizing: border-box;
    }

    .packages-content {
        min-width: 350px;
        max-width: 350px;
        height: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan shadow */
    }

    .packages-content table {
        max-width: 350px;
    }

    .packages-content table td {
        max-width: 350px;
    }

    .packages-content table td:first-child {
        width: 150px;
        text-align: left;
        padding-right: 10px;
    }

    /* Responsif untuk layar lebih kecil */
    @media (max-width: 768px) {
        .packages-item {
            flex: 0 0 100%; /* Setiap item akan mengambil 100% lebar pada layar kecil */
        }
    }
    .bg-label-primary {
        background-color: #e7e7ff !important;
        color: #696cff !important;
        border-radius: 8px !important;
    }

    .bg-label-secondary {
        background-color: #ebeef0 !important;
        color: #8592a3 !important;
        border-radius: 8px !important;
    }
    .bg-label-success {
        background-color: #e8fadf !important;
        color: #71dd37 !important;
        border-radius: 8px !important;
    }
    .bg-label-danger {
        background-color: #ffe0db !important;
        color: #ff3e1d !important;
        border-radius: 8px !important;
    }

    .packages-content table td.status-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30px;            
        padding: 0;              
    }


</style>