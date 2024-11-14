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
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-none bg-transparent border border-primary mb-3">
                    <div class="card-body">Data Kereta</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="index.php?page=kereta">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-none bg-transparent border border-warning mb-3">
                    <div class="card-body">Data Stasiun</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="?page=stasiun">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-none bg-transparent border border-success mb-3">
                    <div class="card-body">Data Route</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="?page=route">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-none bg-transparent border border-info mb-3">
                    <div class="card-body">Konfirmasi Pembayaran</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="?page=pemesanan_pending">Lihat Detail</a>
                        <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>