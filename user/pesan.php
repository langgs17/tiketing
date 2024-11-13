<?php
include "config.php";

$routeQuery = "SELECT route.*, kereta.tipe FROM route 
                JOIN kereta ON route.nama_kereta = kereta.nama_kereta";
$routeResult = $mysqli->query($routeQuery);
?>

<style>
    /* CSS for train card display similar to the provided image */
    a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .train-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;
        width: 100%;
        max-width: 1200px;
        border: 1px solid #e0e0e0;
        flex-direction: row;
        gap: 15px;
    }

    .train-info {
        flex: 2;
    }

    .train-name {
        font-size: 20px;
        font-weight: bold;
        margin: 0;
    }

    .train-class {
        font-size: 14px;
        color: #666;
    }

    .schedule {
        display: flex;
        align-items: center;
        flex: 3;
        padding-left: 20px;
    }

    .departure, .arrival {
        text-align: center;
    }

    .schedule h2 {
        font-size: 24px;
        margin: 0;
        color: #333;
    }

    .duration {
        text-align: center;
        color: #aaa;
        font-size: 14px;
        padding: 0 20px;
        display: flex;
        align-items: center;
    }

    .price {
        text-align: right;
        flex: 1;
    }

    .price-amount {
        font-size: 18px;
        color: #e63946;
        font-weight: bold;
        margin: 0;
    }

    .points {
        color: #888;
        font-size: 14px;
        text-align: right;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .train-card {
            flex-direction: column;
            text-align: center;
        }

        .train-info, .schedule, .price {
            width: 100%;
            text-align: center;
            padding: 10px 0;
        }
    }

    @media (max-width: 576px) {
        .train-name {
            font-size: 16px;
        }

        .departure h2, .arrival h2 {
            font-size: 20px;
        }

        .price-amount {
            font-size: 16px;
        }
    }
</style>

<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="container mt-4">
                <div class="row" style="margin-top: 8rem;">
                    <?php
                    if ($routeResult->num_rows > 0) {
                        while ($row = $routeResult->fetch_assoc()) {
                            ?>
                            <a href="?page=pesanan&id_route=<?php echo htmlspecialchars($row['id_route']); ?>" class="train-card col-12 mb-4">
                                <div class="train-info">
                                    <h5 class="train-name"><?php echo htmlspecialchars($row['nama_kereta']); ?></h5>
                                    <p class="train-class"><?php echo htmlspecialchars($row['tipe']); ?></p>
                                    <div class="schedule">
                                        <p>Waktu Berangkat: <?php echo htmlspecialchars($row['waktu_berangkat']); ?></p>
                                    </div>
                                </div>
                                <div class="schedule">
                                    <div class="departure">
                                        <h2><?php echo htmlspecialchars($row['stasiun_asal']); ?></h2>
                                        <p><?php echo htmlspecialchars($row['waktu_berangkat']); ?></p>
                                    </div>
                                    <div class="duration">
                                        <span><i class="fas fa-arrow-right" style="color:black"></i></span>
                                        
                                    </div>
                                    <div class="arrival">
                                        <h2><?php echo htmlspecialchars($row['stasiun_tujuan']); ?></h2>
                                        <p><?php echo htmlspecialchars($row['waktu_tiba']); ?> <sup>+1</sup></p>
                                    </div>
                                </div>
                                <div class="price">
                                    <p class="price-amount">IDR <?php echo number_format($row['harga'], 0, ',', '.'); ?>/pax</p>
                                    <p class="points">420 points</p>
                                </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo "<p>No route available</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
