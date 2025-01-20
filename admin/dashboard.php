<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><i class="fas fa-tachometer-alt"></i>
        Dashboard
        </h1>
        <ol class="breadcrumb mb-2"></ol>
        <div class="card mb-4"></div>
        <div class="row">
          <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Selamat Datang "<?php echo $_SESSION['users']['nama']; ?>"🎉</h5>
                    <p class="mb-4">
                      Welcome To <span class="fw-bold">Sneat</span> Ticketing Aplication By Hamdani
                    </p>

                   </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="../assets/img/illustrations/man-with-laptop-light.png"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-3 col-md-12 col-6 mb-4">
              <?php
                $kereta = "SELECT COUNT(*) AS total_kereta FROM kereta";
                $total_kereta = $mysqli->query($kereta);
                if ($total_kereta->num_rows > 0) {
                  $row = $total_kereta->fetch_assoc();
                }
              ?>
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-train text-primary" style="font-size: 2rem; background-color: #e9f7ef; padding: 10px; border-radius: 50%;"></i>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt3"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                          <a class="dropdown-item" href="?page=kereta">Detail</a>
                        </div>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Kereta Tersedia</span>
                    <h2 class="card-title mb-2"><?php echo $row['total_kereta'];?></h2>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12 col-6 mb-4">
              <?php
                $stasiun = "SELECT COUNT(*) AS total_stasiun FROM stasiun";
                $total_stasiun = $mysqli->query($stasiun);
                if ($total_stasiun->num_rows > 0) {
                  $row = $total_stasiun->fetch_assoc();
                }
              ?>
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-arch text-warning" style="font-size: 2rem; background-color: #FFF5DC; padding: 10px; border-radius: 50%;"></i>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt3"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                          <a class="dropdown-item" href="?page=stasiun">Detail</a>
                        </div>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Stasiun Tersedia</span>
                    <h2 class="card-title mb-2"><?php echo $row['total_stasiun'];?></h2>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12 col-6 mb-4">
              <?php
                $route = "SELECT COUNT(*) AS total_route FROM route";
                $total_route = $mysqli->query($route);
                if ($total_route->num_rows > 0) {
                  $row = $total_route->fetch_assoc();
                }
              ?>
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-trip text-success" style="font-size: 2rem; background-color: #e9f7ef; padding: 10px; border-radius: 50%;"></i>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt3"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                          <a class="dropdown-item" href="?page=route">Detail</a>
                        </div>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Route Tersedia</span>
                    <h2 class="card-title mb-2"><?php echo $row['total_route'];?></h2>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12 col-6 mb-4">
              <?php
                $konfirm = "SELECT COUNT(*) AS total_konfirm FROM pemesanan WHERE status='pending'";
                $total_konfirm = $mysqli->query($konfirm);
                if ($total_konfirm->num_rows > 0) {
                  $row = $total_konfirm->fetch_assoc();
                }
              ?>
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-wallet-alt text-info" style="font-size: 2rem; background-color: #e9f7ef; padding: 10px; border-radius: 50%;"></i>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt3"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                          <a class="dropdown-item" href="?page=pemesanan_pending">Detail</a>
                        </div>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Konfirmasi Pembayaran</span>
                    <h2 class="card-title mb-2"><?php echo $row['total_konfirm'];?></h2>
                  </div>
                </div>
              </div>
        </div>

    </div>
    <?php
    include 'config.php';

    $result = mysqli_query($mysqli, "SELECT pemesanan.*, route.* FROM pemesanan INNER JOIN route ON pemesanan.id_route = route.id_route ORDER BY pemesanan.id_pemesanan DESC");

    if (!$result) {
        die("Query gagal: " . mysqli_error($mysqli));
    }
    ?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"> Data Pesanan Tiket </h4>
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>ID User</th>
                            <th>Route Kereta</th>
                            <th>Train Name</th>
                            <th>harga</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php
                                
                                while($data = mysqli_fetch_array($result)) {

                                    if ($data['status'] == 'belum bayar') {
                                        $color = 'badge bg-label-warning me-1';
                                    } elseif ($data['status'] == 'pending') {
                                        $color = 'badge bg-label-primary me-1';
                                    } elseif ($data['status'] == 'sudah bayar') {
                                        $color = 'badge bg-label-success me-1';
                                    } elseif ($data['status'] == 'dibatalkan') {
                                        $color = 'badge bg-label-danger me-1';
                                    }
                                    
                                    echo "<tr>";
                                    echo "<td>".$data['nama_pelanggan']."</td>";
                                    echo "<td>".$data['id_user']."</td>";
                                    echo "<td>".$data['stasiun_asal'].' - '.$data['stasiun_asal']."</td>";
                                    echo "<td>".$data['nama_kereta']."</td>";
                                    echo "<td> Rp. " . number_format($data['harga_total'], 0, ',', '.') . "</td>";
                                    echo 
                                        '<td><span class="' . $color . ';">' . ucfirst($data['status']) . '</span></td>';
                                }
                            ?>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'config.php';

    $result = mysqli_query($mysqli, "SELECT * FROM route ORDER BY id_route DESC");

    if (!$result) {
        die("Query gagal: " . mysqli_error($mysqli));
    }
    ?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"> Data Route</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Route ID</th>
                            <th>Stasiun Awal</th>
                            <th>Stasiun Tujuan</th>
                            <th>Train ID</th>
                            <th>Train Name</th>
                            <th>Departure Time</level>
                            <th>Arrival Time</level>
                            <th>harga</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php
                                while($data = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$data['id_route']."</td>";
                                    echo "<td>".$data['stasiun_asal']."</td>";
                                    echo "<td>".$data['stasiun_tujuan']."</td>";
                                    echo "<td>".$data['id_kereta']."</td>";
                                    echo "<td>".$data['nama_kereta']."</td>";
                                    echo "<td>".$data['waktu_tiba']."</td>";
                                    echo "<td>".$data['waktu_berangkat']."</td>";
                                    echo "<td> Rp. " . number_format($data['harga'], 0, ',', '.') . "</td>";
                                }
                            ?>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM kereta ORDER BY id_kereta DESC");

    if (!$result) {
        die("Query gagal: " . mysqli_error($mysqli));
    }
    ?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"> Data Kereta </h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID Kereta</th>
                            <th>Nama Kereta</th>
                            <th>Tipe kereta</th>
                            <th>Kapasitas</th>
                            <th>Kode</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php
                                while($user_data = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$user_data['id_kereta']."</td>";
                                    echo "<td>".$user_data['nama_kereta']."</td>";
                                    echo "<td>".$user_data['tipe']."</td>";
                                    echo "<td>".$user_data['kapasitas']."</td>";
                                    echo "<td>".$user_data['kode']."</td>";
                                }
                            ?>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'config.php';

    $result = mysqli_query($mysqli, "SELECT * FROM stasiun ORDER BY id_stasiun DESC");

    if (!$result) {
        die("Query gagal: " . mysqli_error($mysqli));
    }
    ?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Stasiun</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID Stasiun</th>
                            <th>Nama Stasiun</th>
                            <th>kota </th>
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
                                }
                            ?>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>