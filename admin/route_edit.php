<?php
include 'config.php';
$id_route = $_GET['id_route'];
if (isset($_POST['update'])){
    $id_route = $_POST['id_route'];
    $stasiun_asal = $_POST['stasiun_asal'];
    $stasiun_tujuan = $_POST['stasiun_tujuan'];
    $kereta = $_POST['kereta'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $waktu_berangkat = $_POST['waktu_berangkat'];

    list($id_kereta, $nama_kereta) = explode(',', $kereta);

    $query = mysqli_query($mysqli, "UPDATE route SET id_route='$id_route', stasiun_asal='$stasiun_asal', stasiun_tujuan='$stasiun_tujuan', id_kereta='$id_kereta', nama_kereta='$nama_kereta', waktu_tiba='$waktu_tiba', waktu_berangkat='$waktu_berangkat' WHERE id_route='$id_route'");
    

    if($query) {
        echo '<script>alert("Ubah Data Route Berhasil");location.href="?page=route";</script>';
    } else {
        echo '<script>alert("Ubah Data Route Gagal")</script>';
    }
 }
 $result = mysqli_query($mysqli, "SELECT*FROM route WHERE id_route=$id_route");
 $data = mysqli_fetch_array($result);
?>

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Insert Route Data</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
              
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Insert Route Data</h5>
                    </div>
                    <div class="card-body">
                    <?php

                        $keretaQuery = "SELECT id_kereta,nama_kereta FROM kereta";
                        $keretaResult = $mysqli->query($keretaQuery);

                        $stasiunQuery = "SELECT nama_stasiun FROM stasiun";
                        $stasiunResult = $mysqli->query($stasiunQuery);

                        $stasiunaResult = $mysqli->query($stasiunQuery);

                    ?>
                    <form name="update" method="post" action="">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-rename">departure station</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select class="form-select" id="stasiun_asal" name="stasiun_asal">
                                    <option selected><?php echo $data['stasiun_asal']; ?></option>
                                    <?php
                                    if ($stasiunResult->num_rows > 0) {
                                        while($row = $stasiunResult->fetch_assoc()) {
                                            echo "<option value='".$row['nama_stasiun']."'>".$row['nama_stasiun']."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No anggota available</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-train">station destination</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <select class="form-select" id="stasiun_tujuan" name="stasiun_tujuan">
                                    <option selected><?php echo $data['stasiun_tujuan']; ?></option>
                                    <?php
                                    if ($stasiunResult->num_rows > 0) {
                                        while($row = $stasiunaResult->fetch_assoc()) {
                                            echo "<option value='".$row['nama_stasiun']."'>".$row['nama_stasiun']."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No anggota available</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-chair">train</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select class="form-select" id="kereta" name="kereta">
                                    <option selected><?php echo $data['id_kereta'] . "  |  " . $data['nama_kereta']; ?></option>
                                    <?php
                                        if ($keretaResult->num_rows > 0) {
                                            while($row = $keretaResult->fetch_assoc()) {
                                                $value = $row['id_kereta'] . ',' . $row['nama_kereta'];
                                                echo "<option value=\"$value\"> " . $row['id_kereta'] . "  |  " . $row['nama_kereta'] . "</option>";
                                            }

                                        } else {
                                            echo "<option value=''>No Buku available</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-barcode">train arrives time</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input
                                    type="time"
                                    class="form-control"
                                    id="waktu_tiba"
                                    name="waktu_tiba"
                                    value="<?php echo $data['waktu_tiba']; ?>"
                                />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-barcode">departure time</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input
                                    type="time"
                                    class="form-control"
                                    id="waktu_berangkat"
                                    name="waktu_berangkat"
                                    value="<?php echo $data['waktu_berangkat']; ?>"
                                />
                                <input type="hidden" name="id_route" value="<?php echo $data['id_route']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="update" class="btn btn-primary">Change</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>