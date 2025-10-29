<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>HealMe!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="/front/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/front/lib/owlcarousel/front/owl.carousel.min.css" rel="stylesheet">
    <link href="/front/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/front/css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">About Features</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="/">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">About Features</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

 <!-- About Start -->
 <div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
            <img class="img-fluid mt-5" src="{{ asset('images/'.$barang->image) }}" alt="">
            </div>
            <div class="col-lg-7">
                <p class="section-title pr-5"><span class="pr-2">Learn About Features</span></p>
                <h1 class="mb-4"> {{ $barang->nama_barang }}</h1>
                <span><p class="text-primary font-weight-bold">Deskripsi: {{ $barang->deskripsi_barang }}</p><span>
                <div class="row pt-2 pb-4">
                    <div class="col-6 col-md-8">
                        <ul class="list-inline m-0">
                            </div>
                            <div class="col-lg-7">
                             <a href="https://spotify.link/no6YyVUoFXb" class= "btn btn-info px-4 mx-auto mb-4">Visit Link</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->







  <!-- Footer Start -->
  <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
        <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
        <img class="img-fluid mt-5" src="img/logohealme.jpg" alt="">
            </a>
            <p>Terimakasih Atas Kunjungan Anda.</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Get In Touch</h3>
            <div class="d-flex">
                <h4 class="fa fa-map-marker-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Address</h5>
                    <p>HS Ronggowaluyo Street, Karawang, Indonesian</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-envelope text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Email</h5>
                    <p>healmemail@gmail.com</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-phone-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Phone</h5>
                    <p>10731975</p>
                </div>
            </div>
    </div>
    <div class="container-fluid pt-5" style="border-top: 1px solid rgba(5, 145, 121, 0.354);;">
        <p class="m-0 text-center text-white">
            &copy; <a class="text-primary font-weight-bold" href="#">HealMe!</a>. All Rights Reserved. Designed
            by
            <a class="text-primary font-weight-bold" href="">Team 1</a>
        </p>
    </div>
</div>
<!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/front/lib/easing/easing.min.js"></script>
    <script src="/front/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/front/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/front/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/front/mail/jqBootstrapValidation.min.js"></script>
    <script src="/front/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/front/js/main.js"></script>
</body>

</html>