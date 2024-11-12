<?php
include "config.php";
$id_user = $_SESSION['users']['id_user'];
$result = mysqli_query($mysqli, "SELECT pemesanan.*, route.* FROM pemesanan INNER JOIN route ON pemesanan.id_route = route.id_route WHERE pemesanan.id_user = '$id_user' AND pemesanan.status = 'belum bayar'");
?>
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Travel Packages</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Packages</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Packages Start -->
<div class="container-fluid packages py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Packages</h5>
            <h1 class="mb-0">Awesome Packages</h1>
        </div>
        <div class="packages-row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nama_kereta = $row['nama_kereta'];
                    $seat = $row['seat'];
                    $stasiun_asal = $row['stasiun_asal'];
                    $stasiun_tujuan = $row['stasiun_tujuan'];
                    ?>
                    <div class="packages-item">
                        <div class="packages-content bg-light p-4 mb-4 rounded shadow-sm">
                            <h5 class="mb-3"><?php echo $stasiun_asal; ?> <small class="fa fa-arrow-right text-black"></small> <?php echo $stasiun_tujuan; ?></h5>
                            <p class="text-uppercase mb-4 font-weight-bold"><?php echo $nama_kereta; ?></p>
                            <table style="width: 100%;">
                                <tr>
                                    <td>Jumlah penumpang</td>
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
                                
                                <tr>
                                    <td><a href="?page=bayar&id_pemesanan=<?php echo $row['id_pemesanan']?>" class='btn btn-danger'>Bayar Sekarang</a></td>
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

    .packages-item {
        flex: 0 0 calc(33.333% - 20px); /* Lebar tetap 1/3 dari container */
        box-sizing: border-box;
    }

    .packages-content {
        height: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan shadow */
    }

    .packages-content table {
        width: 100%;
    }

    .packages-content table td {
        white-space: nowrap;
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
</style>