<?php
if(isset($_POST['add'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $id_user = $_SESSION['users']['id_user'];
    $id_route = $_POST['id_route'];
    $seat = $_POST['seat'];
    $tanggal_berangkat = $_POST['tanggal_berangkat'];
    $kategori = $_POST['kategori'];
    $catatan = $_POST['catatan'];



    include 'config.php';
    $result = mysqli_query($mysqli, "INSERT INTO pemesanan (nama_pelanggan,id_route,id_user,seat,tanggal_berangkat,kategori,catatan) VALUES('$nama_pelanggan','$id_route','$id_user', '$seat', '$tanggal_berangkat', '$kategori', '$catatan')");
    
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
                        <form name="add" method="post" action="">
                            <div class="row g-3">
                            <?php
                                $routeQuery = "SELECT id_route,stasiun_asal,stasiun_tujuan,nama_kereta,harga FROM route";
                                $routeResult = $mysqli->query($routeQuery);
                            ?>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" name="nama_pelanggan" id="name" placeholder="Nama Kamu">
                                        <label for="name">Nama Pelanggan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="date" name="tanggal_berangkat" class="form-control bg-white border-0" id="date" placeholder="Tanggal Berangkat" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="date">Tanggal Berangkat</label>
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
                                        <select class="form-select bg-white border-0" name="kategori" id="kategori">
                                            <option selected>Choose Station...</option>
                                            <option value="dewasa">Dewasa</option>
                                            <option value="anak-anak">Anak anak</option>
                                        </select>
                                        <label for="CategoriesSelect">Kategori</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0" name="id_route" value="id_route" id="id_route">
                                            <option selected>Choose Station...</option>
                                            <?php
                                                if ($routeResult->num_rows > 0) {
                                                    while($row = $routeResult->fetch_assoc()) {
                                                        echo "<option value='".$row['id_route']."'>".$row['id_route'].'| '.$row['stasiun_tujuan']."</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>No anggota available</option>";
                                                }
                                            ?>
                                        </select>
                                        <label for="id_route">Dari Stasiun Mana?</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white border-0" name="catatan" placeholder="Special Request" id="message" style="height: 150px"></textarea>
                                        <label for="message">Deskripsi</label>
                                        <input type="hidden" value="belum bayar" name="status" >
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