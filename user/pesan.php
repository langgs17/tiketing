<?php
include "config.php";

$routeQuery = "SELECT route.*, kereta.tipe FROM route 
                JOIN kereta ON route.nama_kereta = kereta.nama_kereta";
$routeResult = $mysqli->query($routeQuery);


?>



<style>
        /* CSS yang digabung */
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
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;  /* Centers the cards horizontally */
            width: 80%;  /* Makes the card width 80% of the container */
            max-width: 1200px;  /* Limit the card width to 1200px */
            border: 1px solid #e0e0e0;
        }
        .train-info {
            flex: 2;
        }
        .train-name {
            font-size: 18px;
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

        .schedule p {
            white-space: nowrap; /* Mencegah teks menjadi dua baris */
        }

        .departure h2, .arrival h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .schedule .duration {
            text-align: center;
            color: #aaa;
            font-size: 12px;
            padding: 0 20px;
            display: flex;
            align-items: center;
        }
        .line {
            width: 20px;
            height: 2px;
            background-color: #ccc;
            margin: 0 5px;
        }
        .duration .line {
            width: 20px;
            height: 2px;
            background-color: #ccc;
            margin: 0 5px;
        }
        .day-offset {
            font-size: 12px;
            vertical-align: super;
        }
        .availability {
            text-align: right;
            flex: 1;
        }
        .seats-left {
            color: #e63946;
            font-size: 14px;
            margin: 0;
        }
        .details-link {
            color: #007bff;
            font-size: 14px;
            text-decoration: none;
        }
        .price {
            text-align: right;
            flex: 1;
        }
        .price-amount {
            font-size: 18px;
            color: #e63946;
            margin: 0;
        }
        .points {
            color: #888;
            font-size: 14px;
        }

        /* Container adjustment */
        .container {
            width: 90%; /* Makes the container width 90% of the screen */
            margin: 0 auto; /* Centers the container */
        }

        /* Optional: Adjust column width in smaller screens */
        @media (max-width: 768px) {
            .train-card {
                width: 100%;  /* Make the cards full width on smaller screens */
                margin: 10px 0;
            }
        }
    </style>

<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="container mt-4">
                <div class="row" style="margin-top: 8rem; ">
                    <?php
                    if ($routeResult->num_rows > 0) {
                        while ($row = $routeResult->fetch_assoc()) {
                            ?>
                            <a href="?page=pesanan&id_route=<?php echo htmlspecialchars($row['id_route']); ?>" class="train-card col-12 mb-4">
                                <div class="train-info">
                                    <h5 class="train-name"><?php echo htmlspecialchars($row['nama_kereta']); ?> <?php echo htmlspecialchars($row['id_route']); ?></h5>
                                    <p class="train-class"><?php echo htmlspecialchars($row['tipe']);?></p>
                                    <p style="color: white; font-size: 1px;" class="train-class"><?php echo htmlspecialchars($row['id_route']); ?></h5></p>
                                    <div class="schedule">
                                        <div class="">
                                            <p>Waktu Berangkat  :<?php echo htmlspecialchars($row['waktu_berangkat']); ?></p>
                                            <p>Waktu kereta tiba :<?php echo htmlspecialchars($row['waktu_tiba']); ?></p>
                                        </div>
                                    </div>
                                </div>

                                
                               
                                <div class="schedule">
                                    <div class="departure">
                                        <h2><?php echo htmlspecialchars($row['stasiun_asal']); ?></h2>
                                    </div>
                                    <div class="duration">
                                        <span><i class="fas fa-arrow-right" style="black"></i></span>
                                    </div>
                                    <div class="arrival">
                                        <h2><?php echo htmlspecialchars($row['stasiun_tujuan']); ?></h2>
                                    </div>
                                </div>
                                <div class="price">
                                    <p class="price-amount">IDR <?php echo number_format($row['harga'], 0, ',', '.'); ?>/pax</p>
                                    <p class="points">510 poin</p>
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
</div>
