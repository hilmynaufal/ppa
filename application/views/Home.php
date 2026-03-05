<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PPA BEDAS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <script type="text/javascript" src="<?PHP echo base_url() ?>/assets/ticker/js/jquery.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url() ?>/assets/ticker/js/acmeticker.js"></script>
    <link rel="stylesheet" href="<?PHP echo base_url() ?>/assets/ticker/css/style.css">
    <link href="<?PHP echo base_url() ?>/assets/petology/css/style.css" rel="stylesheet" />
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/hero/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/ticker/style.css" rel="stylesheet" />
    <link href="<?PHP echo base_url() ?>/assets/css/all.css" rel="stylesheet" />
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
    <!-- Template Main CSS File -->
    <link href="<?PHP echo base_url() ?>/assets/hero/css/style.css" rel="stylesheet">

    <!-- =======================================================
        * Template Name: Arsha - v4.3.0
        * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">
                    <font style="color:#ff9900">SIPETIK</font> BEDAS
                </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= site_url('') ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Dashboard</a></li>
                    <li><a class="nav-link scrollto" href="#faq">Faq</a></li>
                       <li><a class="nav-link   scrollto" href="#cliens">Pendaftaran </a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('auth') ?>">Login</a></li>
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a> -->
                    <!-- <ul> -->
                    <!-- <li><a href="#">Drop Down 1</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a> -->
                    <!-- <ul> -->
                    <!-- <li><a href="#">Deep Drop Down 1</a></li> -->
                    <!-- <li><a href="#">Deep Drop Down 2</a></li> -->
                    <!-- <li><a href="#">Deep Drop Down 3</a></li> -->
                    <!-- <li><a href="#">Deep Drop Down 4</a></li> -->
                    <!-- <li><a href="#">Deep Drop Down 5</a></li> -->
                    <!-- </ul> -->
                    <!-- </li> -->
                    <!-- <li><a href="#">Drop Down 2</a></li> -->
                    <!-- <li><a href="#">Drop Down 3</a></li> -->
                    <!-- <li><a href="#">Drop Down 4</a></li> -->
                    <!-- </ul> -->
                    <!-- </li> -->
                    <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                    <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>SIPETIK BEDAS</h1>
                    <h2>Sistem Informasi Pelaporan Tindak Kekerasan Perempuan Dan Anak</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <!--            <a href="#about" class="btn-get-started scrollto">KECATAMATAN SOREANG KAB.BANDUNG</a>
                                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span></span></a>
                            -->
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?PHP echo base_url() ?>/assets/hero/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Cliens Section ======= -->
        <!--    <section id="cliens" class="cliens section-bg">
              <div class="container">
        
                <div class="row" data-aos="zoom-in">
        
                  <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="E-LAPOR">
                  <a href="https://www.lapor.go.id/">  <img src="<?PHP echo base_url() ?>/assets/hero/img/clients/e-lapor.png" class="img-fluid" alt="E-LAPOR"></a>
                    
                  </div>
        
                  <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="JDIH KAB.BANDUNG">
                   <a href="https://jdih.bandungkab.go.id/"> <img src="<?PHP echo base_url() ?>/assets/hero/img/clients/jdihdprd.png" class="img-fluid" alt="JDIH KAB.BANDUNG"></a>
                  </div>
        
                  <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="JDIH DPRD KAB.BANDUNG">
                   <a href="https://jdihdprd.bandungkab.go.id/">  <img src="<?PHP echo base_url() ?>/assets/hero/img/clients/perpustakaan.png" class="img-fluid" alt="JDIH DPRD KAB.BANDUNG"></a>
                  </div>
        
                  <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="BIRO HUKUM JABAR">
                   <a href="https://birohukum.jabarprov.go.id/">  <img src="<?PHP echo base_url() ?>/assets/hero/img/clients/birohukumjabar.png" class="img-fluid" alt="BIRO HUKUM JABAR"></a>
                  </div>
        
                  <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="BPHN">
                   <a href="https://bphn.go.id/">   <img src="<?PHP echo base_url() ?>/assets/hero/img/clients/bphn.png" class="img-fluid" alt="BPHN"></a>
                  </div>
        
                  <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="PORTAL KAB.BANDUNG">
                      <a href="https://bandungkab.go.id/">   <img src="<?PHP echo base_url() ?>/assets/hero/img/clients/bandungkab.png" class="img-fluid" alt="PORTAL BANDUNGKAB"></a>
                  </div>
        
                </div>
        
              </div>
            </section>-->
        <!-- End Cliens Section -->
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row content">
                    <div class="container">
                        <h2 class="text-center"></h2>
                        <div class="row justify-content-center">
                            <div class="col-md-offset-12 ">

                                <!--Form with header-->
						<iframe src="https://metabase.bandungkab.go.id/public/dashboard/f4cd585b-9628-462c-b734-4cb511080f7a" frameborder="0" width="1200" height="1200" ></iframe>
                            </div>
                        </div>

                    </div>

                </div>
        </section>
        <section id="cliens" class="cliens">
                                                <div class="box box-warning box-solid">

                                                    <form action="<?php echo $action; ?>" method="post">

                                                        <table class='table table-bordered'>


                                                            <tr>
                                                                <td width='200'>Nama Lengkap
                                                                    <?php echo form_error('full_name') ?></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="full_name" id="full_name"
                                                                        placeholder="Full Name"
                                                                        value="<?php echo $full_name; ?>" /></td>
                                                            </tr>

                                                            <tr>
                                                                <td width='200'>Kota Lahir
                                                                    <?php echo form_error('kota_lahir') ?></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="kota_lahir" id="kota_lahir"
                                                                        placeholder="Kota Lahir"
                                                                        value="<?php echo $kota_lahir; ?>" /></td>
                                                            </tr>

                                                            <tr>
                                                                <td width='200'>Tanggal Lahir
                                                                    <?php echo form_error('birth') ?></td>
                                                                <td><input type="date" class="form-control" name="birth"
                                                                        id="birth" placeholder="Birth"
                                                                        value="<?php echo $birth; ?>" /></td>
                                                            </tr>


                                                            <tr>
                                                                <td width='200'>Hp/Telepon Aktif
                                                                    <?php echo form_error('phone') ?></td>
                                                                <td><input type="text" class="form-control" name="phone"
                                                                        id="phone" placeholder="No HP / Telp"
                                                                        value="" /></td>
                                                            </tr>



                                                            <input type="hidden" class="form-control"
                                                                name="id_user_level" id="id_user_level"
                                                                placeholder="Id User Level" value="2" />


                                                            <input type="hidden" class="form-control" name="is_aktif"
                                                                id="is_aktif" placeholder="Is Aktif" value="1" />

                                                            <input type="hidden" class="form-control" name="username"
                                                                id="username" placeholder="Username" value="" />
                                                            <input type="hidden" class="form-control"
                                                                name="id_user_level" id="id_user_level"
                                                                placeholder="id_user_level" value="3" />

                                                            <tr>
                                                                <td width='200'>Password
                                                                    <?php echo form_error('password') ?></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="password" id="password"
                                                                        placeholder="Password" value="" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width='200'>Konfirmasi Password
                                                                    <?php echo form_error('confirm_password') ?></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="confirm_password" id="confirm_password"
                                                                        placeholder="Konfirmasi Password" value="" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width='200'>Propinsi
                                                                    <?php echo form_error('province_id') ?></td>
                                                                <td>

                                                                    <?php echo cmb_dinamis_propinsi('province_id', 'reg_provinces', 'name', 'id', $province_id, 'asc') ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width='200'>Kabupaten
                                                                    <?php echo form_error('regency_id') ?></td>
                                                                <td>


                                                                    <select name="regency_id" class="id_kab form-control" id="pilih_kecamatan">
                                                                    </select>

                                                                    </select>

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width='200'>Kecamatan <?php echo form_error('district_id') ?></td>
                                                                <td>
                                                                    <select name="district_id"
                                                                        class="id_kec form-control" id="pilih_desa">
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width='200'>Alamat Domisili
                                                                    <?php echo form_error('alamat_domisili') ?></td>
                                                                <td><textarea class="form-control" rows="3"
                                                                        name="alamat_domisili" id="alamat_domisili"
                                                                        placeholder="Alamat Domisili"></textarea></td>
                                                            </tr>


                                                            <tr>
                                                                <td width='200'>Pekerjaan
                                                                    <?php echo form_error('pekerjaan') ?></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="pekerjaan" id="pekerjaan"
                                                                        placeholder="Pekerjaan" value="" /></td>
                                                            </tr>

                                                            <tr>
                                                                <td width='200'>Penyandang Disabilitas
                                                                    <?php echo form_error('penyandang_disabilitas') ?>
                                                                </td>
                                                                <td>
                                                                    <input name="penyandang_disabilitas" type="radio"
                                                                        value="Ya" id="penyandang_disabilitas">Ya<br />
                                                                    <input name="penyandang_disabilitas" type="radio"
                                                                        value="Tidak" id="penyandang_disabilitas"
                                                                        checked>Tidak<br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width='200'>Ket Laporan
                                                                    <?php echo form_error('ket_laporan') ?></td>
                                                                <td> <textarea class="form-control" rows="3"
                                                                        name="ket_laporan" id="ket_laporan"
                                                                        placeholder="Ket Laporan"></textarea></td>
                                                            </tr>
															  <tr>
                                        <td></td>
                                        <td>

                                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                                        </td>
                                    </tr>
                                                         

                                                        </table>
                                                    </form>
                                                </div>
                                            </section>
        <!-- End About Us Section -->

        <!-- ======= Why Us Section ======= -->
        <!-- End Why Us Section -->

        <!-- ======= Skills Section ======= -->
        <!-- End Skills Section -->

        <!-- ======= Services Section ======= -->
        <!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <!-- End Cta Section -->

        <!-- ======= Portfolio Section ======= -->
        <!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        <!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p> Rumah Informasi Pertanahan </p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Apa itu Sipetik? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Sistem Informasi pelaporan dan tindak kekerasan perempuan dan anak Pemerintah
                                    Kabupaten Bandung
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Siapa saja yang mendapatkan Akses Sipetik
                                Kab.Bandung? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Korban tindak kekerasan ataupun pihak pelapor yang sudah terdaftar pada sipetik
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara masuk ke dalam aplikasi
                                Sipetik? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dengan cara melakukan pendaftaran atau melaporkan kepada pihak terkait ditiap
                                    kecamatan di wilayah Kabupaten Bandung
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Bagaimana Standar Operasional Prosedur
                                (SOP) Sipetik? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">

                                <style>
                                    * {
                                        box-sizing: border-box
                                    }

                                    .mySlides {
                                        display: none
                                    }

                                    img {
                                        vertical-align: middle;
                                    }

                                    /* Slideshow container */
                                    .slideshow-container {
                                        max-width: 400px;
                                        position: relative;
                                        margin: auto;
                                    }

                                    /* Next & previous buttons */
                                    .prev,
                                    .next {
                                        cursor: pointer;
                                        position: absolute;
                                        top: 50%;
                                        width: auto;
                                        padding: 16px;
                                        margin-top: -22px;
                                        color: white;
                                        font-weight: bold;
                                        font-size: 18px;
                                        transition: 0.6s ease;
                                        border-radius: 0 3px 3px 0;
                                        user-select: none;
                                    }

                                    /* Position the "next button" to the right */
                                    .next {}

                                    /* On hover, add a black background color with a little bit see-through */
                                    .prev:hover,
                                    .next:hover {}



                                    /* Number text (1/3 etc) */
                                    .numbertext {
                                        color: #f2f2f2;
                                        font-size: 12px;
                                        padding: 8px 12px;
                                        position: absolute;
                                        top: 0;
                                    }

                                    /* The dots/bullets/indicators */
                                    .dot {
                                        cursor: pointer;
                                        height: 15px;
                                        width: 15px;
                                        margin: 0 2px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: inline-block;
                                        transition: background-color 0.6s ease;
                                    }



                                    /* Fading animation */
                                    .fade {
                                        animation-name: fade;
                                        animation-duration: 1.5s;
                                    }

                                    @keyframes fade {
                                        from {
                                            opacity: .4
                                        }

                                        to {
                                            opacity: 1
                                        }
                                    }

                                    /* On smaller screens, decrease text size */
                                    @media only screen and (max-width: 300px) {

                                        .prev,
                                        .next,
                                        .text {
                                            font-size: 11px
                                        }
                                    }
                                </style>
                                </head>

                                <body>

                                    <div class="slideshow-container">

                                        <div class="mySlides fade">
                                            <div class="numbertext">1 / 3</div>
                                            <img src="<?PHP echo base_url() ?>/assets/hero/img/1.png"
                                                style="width:100%">
                                            <div class="text"> </div>
                                        </div>

                                        <div class="mySlides fade">
                                            <div class="numbertext">2 / 3</div>
                                            <img src="<?PHP echo base_url() ?>/assets/hero/img/2.png"
                                                style="width:100%">
                                            <div class="text"> </div>
                                        </div>

                                        <div class="mySlides fade">
                                            <div class="numbertext">3 / 3</div>
                                            <img src="<?PHP echo base_url() ?>/assets/hero/img/3.png"
                                                style="width:100%">
                                            <div class="text"> </div>
                                        </div>
                                        <div class="mySlides fade">
                                            <div class="numbertext">3 / 4</div>
                                            <img src="<?PHP echo base_url() ?>/assets/hero/img/4.png"
                                                style="width:100%">
                                            <div class="text"> </div>
                                        </div>


                                    </div>
                                    <br>

                                    <div style="text-align:center">
                                        <span class="dot" onclick="currentSlide(1)"></span>
                                        <span class="dot" onclick="currentSlide(2)"></span>
                                        <span class="dot" onclick="currentSlide(3)"></span>
                                        <span class="dot" onclick="currentSlide(4)"></span>
                                    </div>

                                    <script>
                                        let slideIndex = 1;
                                        showSlides(slideIndex);

                                        function plusSlides(n) {
                                            showSlides(slideIndex += n);
                                        }

                                        function currentSlide(n) {
                                            showSlides(slideIndex = n);
                                        }

                                        function showSlides(n) {
                                            let i;
                                            let slides = document.getElementsByClassName("mySlides");
                                            let dots = document.getElementsByClassName("dot");
                                            if (n > slides.length) { slideIndex = 1 }
                                            if (n < 1) { slideIndex = slides.length }
                                            for (i = 0; i < slides.length; i++) {
                                                slides[i].style.display = "none";
                                            }
                                            for (i = 0; i < dots.length; i++) {
                                                dots[i].className = dots[i].className.replace(" active", "");
                                            }
                                            slides[slideIndex - 1].style.display = "block";
                                            dots[slideIndex - 1].className += " active";
                                        }
                                    </script>



                            </div>
                        </li>



                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <!-- End Contact Section -->
        <!--Start of Tawk.to Script-->
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/64c6aba494cf5d49dc67602a/1h6k0sveu';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->




        <!--End of Tawk.to Script-->
    </main><!-- End #main -->
    <section class="info_section layout_padding2">
        <div class="container">
            <h3 style=" color: white;">Statistik Pengunjung</h3>

            <table id="foot-table-list" style=" color: white;">
                <tr>

                    <td>Pengunjung Hari ini</td>

                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>

                    <td><?php echo $pengunjunghariini ?> orang</td>

                </tr>

                <tr>

                    <td>Total Pengunjung</td>

                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>

                    <td><?php echo $totalpengunjung ?> orang</td>

                </tr>

                <tr>

                    <td>Pengunjung Online</td>

                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>

                    <td><?php echo $pengunjungonline ?> orang</td>

                </tr>

            </table>
        </div>
    </section>

    <!-- ======= Footer ======= -->
    <footer id="footer">



        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>DP2KBP3A</h3>
                        <p>
                            KAB.BANDUNG PROPINSI JAWA BARAT
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Sitemap</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Pendaftaran</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Faq</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Login</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Tautan</h4>
                        <ul>

                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="https://dp2kbp3a.bandungkab.go.id/">DP2KBP3A</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://bandungkab.go.id">PORTAL
                                    BANDUNGKAB</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Instagram Kami</h4>
                        <p></p>
                        <div class="social-links mt-3">

                            <a href="https://www.instagram.com/uptd_ppa_kab_bandung/" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Untuk Melihat berita-berita terbaru dapat kunjungi media sosial kami</p>
                        <div class="social-links mt-3">
                            <a href="https://www.instagram.com/uptd_ppa_kab_bandung/" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span></span></strong>. Diskominfo 2023
            </div>
            <div class="credits">
            </div>



        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/aos/aos.js"></script>
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/php-email-form/validate.js"></script>
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?PHP echo base_url() ?>/assets/hero/vendor/waypoints/noframework.waypoints.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Template Main JS File -->
    <script src="<?PHP echo base_url() ?>/assets/hero/js/main.js"></script>


    <!-- ticker -->
    <script src="<?PHP echo base_url() ?>/assets/ticker/script.js"></script>


    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.my-news-ticker').AcmeTicker({
                type: 'horizontal', /*horizontal/horizontal/Marquee/type*/
                direction: 'right', /*up/down/left/right*/
                controls: {
                    prev: $('.acme-news-ticker-prev'), /*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
                    toggle: $('.acme-news-ticker-pause'), /*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
                    next: $('.acme-news-ticker-next')/*Can be used for horizontal/horizontal/marquee/typewriter*/
                }
            });
        })

    </script>


    <!-- JQuery -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#pilih_kabupaten').change(function () {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Home/get_kabupaten",
                    method: "POST",
                    data: { id: id },
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_kab + '>' + data[i].name_province + '</option>';
                        }
                        $('.id_kab').html(html);

                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#pilih_kecamatan').change(function () {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Home/get_kecamatan",
                    method: "POST",
                    data: { id: id },
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_kec + '>' + data[i].nama_kec + '</option>';
                        }
                        $('.id_kec').html(html);

                    }
                });
            });
        });
    </script>




    <script type="text/javascript">
        $(document).ready(function () {
            $('#pilih_desa').change(function () {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Home/get_desa",
                    method: "POST",
                    data: { id: id },
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_desa + '>' + data[i].nama_desa + '</option>';
                        }
                        $('.id_desa').html(html);

                    }
                });
            });
        });
    </script>



</body>



</html>