<?php

if(isset($_POST['add'])) {
    $nama_stasiun = $_POST['nama_stasiun'];
    $kota = $_POST['kota'];

    include 'config.php';
    $result = mysqli_query($mysqli, "INSERT INTO stasiun (nama_stasiun,kota) VALUES('$nama_stasiun','$kota')");
    
    if ($result) {
        echo '<script>alert("Insert Station Data Succesfully");location.href="?page=stasiun";</script>';    
    } else {
        echo '<script>alert("Insert Station Data Failed!!")</script>';
    }

}
?>
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Insert Station Data</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
              
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Insert Station Data</h5>
                    </div>
                    <div class="card-body">
                    <form name="add" method="post" action="">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-rename">Name Station</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-rename" class="input-group-text"
                                ><i class="bx bx-rename"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="nama_stasiun"
                                name="nama_stasiun"
                              />
                              <input type="hidden" name="id_kereta">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-train">City</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-train" class="input-group-text"
                                ><i class="bx bx-train"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="kota"
                                name="kota"
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