<?php

if(isset($_POST['add'])) {
    $nama_kereta = $_POST['nama_kereta'];
    $tipe = $_POST['tipe'];
    $kapasitas = $_POST['kapasitas'];
    $kode = $_POST['kode'];

    include 'config.php';
    $result = mysqli_query($mysqli, "INSERT INTO kereta (nama_kereta,tipe,kapasitas,kode) VALUES('$nama_kereta','$tipe','$kapasitas','$kode')");
    
    if ($result) {
        echo '<script>alert("Add Train Data Succesfully");location.href="?page=kereta";</script>';    
    } else {
        echo '<script>alert("Add Train Data Failed!!")</script>';
    }

}
?>
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Insert Train Data</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
              
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Insert Train Data</h5>
                    </div>
                    <div class="card-body">
                    <form name="add" method="post" action="">
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
                              />
                              <input type="hidden" name="id_kereta">
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
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="add" class="btn btn-primary">Insert</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>