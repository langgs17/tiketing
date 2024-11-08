<?php
include 'config.php';
$id_user = $_GET['id_user'];
if (isset($_POST['update'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = mysqli_query($mysqli, "UPDATE users SET id_user='$id_user', username='$username', nama='$nama', alamat='$alamat', password='$password', level='$level' WHERE id_user='$id_user'");
    

    if($query) {

        $result = mysqli_query($mysqli, "SELECT level FROM users WHERE id_user=$id_user");
        $data = mysqli_fetch_array($result);

        echo "<script>alert('Ubah data users berhasil');location.href='?page=$data[level]';</script>";
    } else {
        echo '<script>alert("Ubah data users gagal")</script>';
    }
 }
 $result = mysqli_query($mysqli, "SELECT*FROM users WHERE id_user=$id_user");
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
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-rename">Username</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                value="<?php echo $data['username']; ?>"
                              />
                              <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-train">Name Users</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control"
                                id="nama"
                                name="nama"
                                value="<?php echo $data['nama']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-chair">Address</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control"
                                id="alamat"
                                name="alamat"
                                value="<?php echo $data['alamat']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-barcode">Password</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control"
                                id="password"
                                name="password"
                                value="<?php echo $data['password']; ?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-barcode">Level</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control" readonly
                                id="level"
                                name="level"
                                value="<?php echo $data['level']; ?>"
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