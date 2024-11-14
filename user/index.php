<?php

session_start();
include "config.php";


$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';


if (!isset($_SESSION['users'])) {
	header('location:../index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Sneat Ticket | Lang</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />


        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-user me-1"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="?page=profil" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="../logout.php" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><img src="img/favicon.ico"> Sneat</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="?page=dashboard" class="nav-item nav-link <?php echo $page == 'dashboard' ? 'active' : ''; ?>">Home</a>
                        <a href="?page=route" class="nav-item nav-link <?php echo $page == 'route' ? 'active' : ''; ?>">Route Tersedia</a>
                        <a href="?page=pembayaran" class="nav-item nav-link <?php echo $page == 'pembayaran' || $page == 'bayar' ? 'active' : ''; ?>">Pembayaran</a>
                        <a href="?page=tiket" class="nav-item nav-link <?php echo $page == 'tiket' ? 'active' : ''; ?>">Tiket Saya</a>
                        <a href="?page=pesan" class="nav-item nav-link <?php echo $page == 'pesan'  || $page == 'pesanan' ? 'active' : ''; ?>">Pesan Tiket</a>
                    </div>
                </div>
            </nav>
        </div>

            <main class="content">				
                <?php 
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                include $page . '.php';
                ?>
			</main>
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Kontak Saya</h4>
                            <a href=""><i class="fas fa-home me-2"></i> 123 Street, New York, USA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=mggilang212@gmail.com"><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href="https://github.com/langgs17"><i class="fas fa-angle-right me-2"></i> Github</a>
                            <a href="https://instagram.com/xny_raaa/profilecard/?igsh=bDR5bWMxYWQ3YXAz"><i class="fas fa-angle-right me-2"></i> Instagram</a>
                            <a href="https://www.linkedin.com/in/muhamad-gilang-hamdani/"><i class="fas fa-angle-right me-2"></i> LinkedIn</a>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=mggilang212@gmail.com"><i class="fas fa-angle-right me-2"></i> Email</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Sneat.Com</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        Designed By <a class="text-white" href="https://instagram.com/gilangg_hamdani/profilecard/?igsh=MXRybGZIMmJpdjJmeg">Hamdani</a> And Supported By <a class="text-white" href="https://instagram.com/xny_raaa/profilecard/?igsh=bDR5bWMxYWQ3YXAz">Aura Aprillia</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>