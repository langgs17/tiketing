<?php
include 'config.php';
$id_pemesanan = $_GET['id_pemesanan'];
if (isset($_POST['update'])){

    $query = mysqli_query($mysqli, "UPDATE pemesanan SET status='pending' WHERE id_pemesanan='$id_pemesanan'");
    

    if($query) {
        echo '<script>alert("Ubah data pemesanan berhasil");location.href="?page=pembayaran";</script>';
    } else {
        echo '<script>alert("Ubah data pemesanan gagal")</script>';
    }
}
$result = mysqli_query($mysqli, "SELECT pemesanan.*, route.* FROM pemesanan INNER JOIN route ON pemesanan.id_route = route.id_route WHERE pemesanan.id_pemesanan = '$id_pemesanan'");
$data = mysqli_fetch_array($result);
?>

<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="container mt-4">
            <div class="row" style="margin-top:10rem;">
                <!-- Basic Layout -->
              
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Pembayaran</h5><a href="?page=pembayaran" class='btn btn-primary'><span id="basic-icon-default-home"><i class="bx bx-home"> Home</i></span></a>
                    </div>
                    <div class="card-body">
                    <form name="update" method="post" action="">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-name">Nama Pelanggan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-rename" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input
                                type="text" readonly
                                class="form-control"
                                id="nama_pemesanan"
                                value="<?php echo $data['nama_pelanggan']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-map">Stasiun Asal</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-map" class="input-group-text"
                                ><i class="bx bx-map"></i
                              ></span>
                              <input
                                type="text" readonly
                                class="form-control"
                                id="nama_pemesanan"
                                value="<?php echo $data['stasiun_asal']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-train">Stasiun Tujuan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-train" class="input-group-text"
                                ><i class="bx bx-map-pin"></i
                              ></span>
                              <input
                                type="text" readonly
                                class="form-control"
                                id="tipe"
                                value="<?php echo $data['stasiun_tujuan']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-chair">Tanggal Berangkat</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-chair" class="input-group-text"
                                ><i class="bx bx-calendar"></i
                              ></span>
                              <input
                                type="text" readonly
                                class="form-control"
                                id="kapasitas"
                                value="<?php echo $data['tanggal_berangkat']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-barcode">Nama Kereta</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-barcode" class="input-group-text"
                                ><i class="bx bx-train"></i
                              ></span>
                              <input
                                type="text" readonly
                                class="form-control"
                                id="kode"
                                value="<?php echo $data['nama_kereta']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="update" class="btn btn-success">Bayar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
                </div>
    </div>
</div>
