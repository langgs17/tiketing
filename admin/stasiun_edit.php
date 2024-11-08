<?php
include 'config.php';
$id_stasiun = $_GET['id_stasiun'];
if (isset($_POST['update'])){
    $id_stasiun = $_POST['id_stasiun'];
    $nama_stasiun = $_POST['nama_stasiun'];
    $kota = $_POST['kota'];

    $query = mysqli_query($mysqli, "UPDATE stasiun SET id_stasiun='$id_stasiun', nama_stasiun='$nama_stasiun', kota='$kota' WHERE id_stasiun='$id_stasiun'");
    

    if($query) {
        echo '<script>alert("Ubah data stasiun berhasil");location.href="?page=stasiun";</script>';
    } else {
        echo '<script>alert("Ubah data stasiun gagal")</script>';
    }
 }
 $result = mysqli_query($mysqli, "SELECT*FROM stasiun WHERE id_stasiun=$id_stasiun");
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
                                id="nama_stasiun"
                                name="nama_stasiun"
                                value="<?php echo $data['nama_stasiun']; ?>"
                              />
                              <input type="hidden" name="id_stasiun" value="<?php echo $data['id_stasiun']; ?>">
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
                                id="kota"
                                name="kota"
                                value="<?php echo $data['kota']; ?>"
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