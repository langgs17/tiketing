<?php
if(isset($_POST['add'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $tanggal_pemesanan = $_POST['tanggal_pemesaanan'];
    $id_user = $_SESSION['users']['nama'];
    $id_route = $_POST['id_route'];
    $seat = $_POST['seat'];
    $tanggal_berangkat = $_POST['tanggal_berangkat'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];


    include 'config.php';
    $result = mysqli_query($mysqli, "INSERT INTO kereta (nama_kereta,tipe,kapasitas,kode) VALUES('$nama_kereta','$tipe','$kapasitas','$kode')");
    
    if ($result) {
        echo '<script>alert("Add Train Data Succesfully");location.href="?page=kereta";</script>';    
    } else {
        echo '<script>alert("Add Train Data Failed!!")</script>';
    }

}
?>

<div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h3 class="text-white mb-4">BOOKING</h3>
                        <h5 class="text-white"> </h5>
                        <h1 class="text-white mb-4">Online Ticket Booking</h1>                        
                    </div>
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Pergi Ke Mana Hari Ini?</h1>
                        <form>
                            <div class="row g-3">
                                <?php
                                    $stasiunQuery = "SELECT nama_stasiun FROM stasiun";
                                    $stasiunResult = $mysqli->query($stasiunQuery);

                                    $stasiunaResult = $mysqli->query($stasiunQuery);
                                    
                                    $routeQuery = "SELECT nama_kereta FROM route WHERE stasiun_asal=$stasiun_asal && stasiun_tujuan=$stasiun_tujuan";
                                    $routeResult = $mysqli->query($routeQuery);
                                ?>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" name="nama_pelanggan" id="name" placeholder="Nama Kamu">
                                        <label for="name">Nama Pelanggan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0" name="stasiun_asal" id="select1">
                                        <option selected>Choose Station...</option>
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
                                        <label for="select1">Dari Stasiun Mana?</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="date" name="tanggal_berangkat" class="form-control bg-white border-0" id="date" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="date">Tanggal Berangkat</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0" name="stasiun_tujuan" id="select2">
                                        <option selected>Choose Station...</option>
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
                                        <label for="select2">Tujuan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-white border-0" name="seat" id="seat" placeholder="1" >
                                        <label for="seat">Untuk Berapa Orang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0" name="id_route" id="CategoriesSelect">
                                        <option selected>Choose Station...</option>
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
                                        <label for="CategoriesSelect">Kategori</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white border-0" placeholder="Special Request" id="message" style="height: 150px"></textarea>
                                        <label for="message">Deskripsi</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary text-white w-100 py-3" name="add" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>