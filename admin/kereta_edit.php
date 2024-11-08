<?php
include 'config.php';
$id_kereta = $_GET['id_kereta'];
if (isset($_POST['update'])){
    $id_kereta = $_POST['id_kereta'];
    $nama_kereta = $_POST['nama_kereta'];
    $tipe = $_POST['tipe'];
    $kapasitas = $_POST['kapasitas'];
    $kode = $_POST['kode'];

    $query = mysqli_query($mysqli, "UPDATE kereta SET id_kereta='$id_kereta', nama_kereta='$nama_kereta', tipe='$tipe', kapasitas='$kapasitas', kode='$kode' WHERE id_kereta='$id_kereta'");
    

    if($query) {
        echo '<script>alert("Ubah data kereta berhasil");location.href="?page=kereta";</script>';
    } else {
        echo '<script>alert("Ubah data kereta gagal")</script>';
    }
 }
 $result = mysqli_query($mysqli, "SELECT*FROM kereta WHERE id_kereta=$id_kereta");
 $data = mysqli_fetch_array($result);
?>
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Change Train Data</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
              
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Change Train Data</h5>
                    </div>
                    <div class="card-body">
                    <form name="update" method="post" action="">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-rename">Name Train</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-rename" class="input-group-text"
                                ><i class="bx bx-rename"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="nama_kereta"
                                name="nama_kereta"
                                value="<?php echo $data['nama_kereta']; ?>"
                              />
                              <input type="hidden" name="id_kereta" value="<?php echo $data['id_kereta']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-train">Type</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-train" class="input-group-text"
                                ><i class="bx bx-train"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="tipe"
                                name="tipe"
                                value="<?php echo $data['tipe']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-chair">Capacity</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-chair" class="input-group-text"
                                ><i class="bx bx-chair"></i
                              ></span>
                              <input
                                type="number"
                                class="form-control"
                                id="kapasitas"
                                name="kapasitas"
                                value="<?php echo $data['kapasitas']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-barcode">Code</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-barcode" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                oninput="this.value = this.value.toUpperCase();"
                                id="kode"
                                name="kode"
                                value="<?php echo $data['kode']; ?>"
                              />
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
            <!-- / Content -->