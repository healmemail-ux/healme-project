<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HealMe!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo2.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
           <img src="img/logohealme2.jpg" alt="Profile" class="rounded-circle">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="contact.html" class="nav-item nav-link">Journaling</a>
                    <a href="gallery.html" class="nav-item nav-link">Quotes</a>
                    <a href="https://spotify.link/no6YyVUoFXb" class="nav-item nav-link active">Playlist</a>
                    <a href="login" class="nav-item nav-link active">Login</a>
                    <div class="nav-item dropdown">
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h3 class="text-white mb-4 mt-5 mt-lg-0"> Welcome to Our Pages</h3>
                <h3 class="display-3 font-weight-bold text-white">Find Peace in Your Own Words</h3>
                <p class="text-white mb-4">This is Space Where You can Express Your Concerns About Life, Privately and Playlist </p>
            </div>
            <div class="col-lg-5 text-center text-lg-right">
          <img class="img-fluid rounded" src="img/logohealme.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->




    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                <img class="img-fluid mt-5" src="img/logohealme.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Learn About HealMe!</span></p>
                    <h1 class="mb-4">The Best Space for Express Your Own Feelings</h1>
                    <span><p class="fst-italic">HealMe! is a digital platform designed to support university students, particularly those in their final semesters, who are experiencing burnout and academic stress. The website integrates features such as digital journaling, positive quotes, and curated playlists to create a holistic space for emotional healing and self-reflection. Through these features, HealMe! encourages users to express their thoughts, regain motivation, and cultivate mental well-being within a safe and accessible online environment. By promoting healthy digital literacy and self-awareness, HealMe! aims to foster a culture of mindfulness and emotional balance among students navigating academic and personal challenges.
                    </p><span>
                    <div class="row pt-2 pb-4">
                        <div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="img/visimis2.jpg" alt="">
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-bottom"></i>Visi</li>
                                <li class="py-2 border-top border-bottom"></i>To become a safe, positive, and supportive digital space for university students to restore their well-being, regain motivation, and cultivate self-awareness through healthy digital literacy practices.</li>
                                <ul class="list-inline m-0">
                                 <li class="py-2 border-bottom"></i>Misi</li>   
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>To provide a digital journaling platform that enables users to express emotions and reflect on their personal experiences in a safe and private manner.</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>To promote positive energy through collections of inspirational quotes that encourage motivation and mental resilience among students.</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>To offer curated playlists designed to help users relieve stress and achieve a sense of calm during periods of exhaustion.</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>To foster digital literacy awareness by presenting content that encourages mindful and balanced interaction with digital environments.</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>To build an online community that supports and empowers students in overcoming academic challenges and maintaining emotional well-being.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Popular Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Main Feature</span></p>
                <h1 class="mb-4">Our Feature's</h1>
            </div>
            <div class="row">
            @foreach($barang1 as $a)
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img  src="{{ asset('images/'.$a->image) }}"  width="350" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $a->nama_barang }}</h4>
                            <p class="card-text">{{ $a->deskripsi_barang }}</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                            </div>
                            <div class="row border-bottom">
                            </div>
                        </div>
                        <a href="/detail/{{$a->id}}" class="btn btn-primary px-4 mx-auto mb-4">Selengkapnya</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
  

     <!-- Footer Start -->
  <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
        <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
        <img class="img-fluid mt-5" src="img/logohealme.jpg" alt="">
            </a>
            <p>Thank You For Your Time,</p>
            <p>Have a Good Day.</p>
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
    <div class="container-fluid pt-5" style="border-top: 1px solid rgba(17, 155, 28, 0.68);;">
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
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>