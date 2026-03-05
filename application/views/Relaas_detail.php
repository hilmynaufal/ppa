<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>zz BEDAS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="<?PHP echo base_url()?>/assets/petology/css/style.css" rel="stylesheet" />
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?PHP echo base_url()?>/assets/hero/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">     
  


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
  <link href="<?PHP echo base_url()?>/assets/hero/css/style.css" rel="stylesheet">
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

      <h1 class="logo me-auto"><a href="index.html">SIPATU BEDAS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?= site_url('') ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Relaas</a></li>
          <li><a class="nav-link scrollto" href="#faq">Faq</a></li>
<!--          <li><a class="nav-link   scrollto" href="#portfolio">JDIH DPRD </a></li>-->
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
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>SIPATU BEDAS</h1>
          <h2>SISTEM PENANGANAN LITIGASI HUKUM BEDAS </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">PEMERINTAH KAB.BANDUNG</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span></span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="<?PHP echo base_url()?>/assets/hero/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="E-LAPOR">
          <a href="https://www.lapor.go.id/">  <img src="<?PHP echo base_url()?>/assets/hero/img/clients/e-lapor.png" class="img-fluid" alt="E-LAPOR"></a>
            
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="JDIH KAB.BANDUNG">
           <a href="https://jdih.bandungkab.go.id/"> <img src="<?PHP echo base_url()?>/assets/hero/img/clients/jdihdprd.png" class="img-fluid" alt="JDIH KAB.BANDUNG"></a>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="JDIH DPRD KAB.BANDUNG">
           <a href="https://jdihdprd.bandungkab.go.id/">  <img src="<?PHP echo base_url()?>/assets/hero/img/clients/perpustakaan.png" class="img-fluid" alt="JDIH DPRD KAB.BANDUNG"></a>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="BIRO HUKUM JABAR">
           <a href="https://birohukum.jabarprov.go.id/">  <img src="<?PHP echo base_url()?>/assets/hero/img/clients/birohukumjabar.png" class="img-fluid" alt="BIRO HUKUM JABAR"></a>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="BPHN">
           <a href="https://bphn.go.id/">   <img src="<?PHP echo base_url()?>/assets/hero/img/clients/bphn.png" class="img-fluid" alt="BPHN"></a>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="PORTAL KAB.BANDUNG">
              <a href="https://bandungkab.go.id/">   <img src="<?PHP echo base_url()?>/assets/hero/img/clients/bandungkab.png" class="img-fluid" alt="PORTAL BANDUNGKAB"></a>
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Data Relaas </h2>
        </div>

<style>
    .panel-heading-nav {
  border-bottom: 0;
  padding: 10px 0 0;
}

.panel-heading-nav .nav {
  padding-left: 10px;
  padding-right: 10px;
}
</style>
          <div class="row content">

              <div style="padding-bottom: 10px;"'>
                  
                  
                  <div class="card p-3 shadow" style="max-width: 1200px;">
		<h2 class="text-center p-3">Data Relaas </h2>
                <p class="text-center p-3"> No Perkara :<?php echo $no_perkara; ?></p>
		<nav>
			<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Umum</button>
				<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dokumen Pendukung</button>
				
			</div>
		</nav>
		<div class="tab-content p-3 border bg-light" id="nav-tabContent">
			<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<table class="table table-striped table-bordered" >
                                         <tr>
                                             <td>Nama Pihak</td>
                                             <td><?php echo $nama_pihak; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Jenis Pihak</td>
                                             <td><?php echo $jenis_pihak; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Pengadilan</td>
                                             <td><?php echo $nama_pengadilan; ?></td>
                                         </tr>

                                         <tr>
                                             <td>No Perkara</td>
                                             <td><?php echo $no_perkara; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Keterangan</td>
                                             <td><?php echo $keterangan; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Tanggal Hadir Sidang</td>
                                             <td><?php echo $tanggal_hadir_sidang; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Tgl Pengumuman</td>
                                             <td><?php echo $tgl_pengumuman; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Tgl Pemberitahuan Putusan</td>
                                             <td><?php echo $tgl_pemberitahuan_putusan; ?></td>
                                         </tr>

                                         <tr>
                                             <td>Berkas</td>
                                             <td><?php echo $berkas; ?></td>
                                         </tr>

                                    

                                         <tr>
                                             <td>User Id</td>
                                             <td><?php echo $user_id; ?></td>
                                         </tr>

                                      

                                         <tr>
                                             <td></td>
                                             <td><a href="<?php echo site_url('') ?>" class="btn btn-default">Kembali</a></td>
                                         </tr>
                                        </table>
			</div>
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				       <embed src="http://localhost/bandungkab/relaas/upload_relaas/<?PHP echo $berkas; ?>" type="application/pdf" width="100%" height="600px" />
                                  
			</div>
			
		</div>
	</div>




              </div>
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
          <p> Sistem Penanganan Litigasi Hukum Bedas </p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa itu sipatubedas? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Sipatu bedas adalah Sistem Penanganan Litigasi Hukum Bedas
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Siapa saja yang mendapatkan ligitimasi hukum pemerintah Kab.Bandung? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara masuk ke dalam aplikasi sipatubedas? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Persyaratannya Apa saja yang harus disiapkan untuk mendapatkan ligitimasi sipatubedas? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

         

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
 <!-- End Contact Section -->
   <!--Start of Tawk.to Script-->
            <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/634573d754f06e12d8999594/1gf3kp16d';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script>
            <!--End of Tawk.to Script-->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Bagian Hukum</h3>
            <p>
              
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Siteman</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Relaas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Faq</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Login</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Tautan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">JDIH KAB.BANDUNG</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">JDIH DPRD KAB.BANDUNG</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">BIRO HUMAS JABAR</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">BPHN</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PORTAL BANDUNGKAB</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong>. Diskominfo 2022
      </div>
      <div class="credits">
      </div>

    
    
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/aos/aos.js"></script>
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/php-email-form/validate.js"></script>
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?PHP echo base_url()?>/assets/hero/vendor/waypoints/noframework.waypoints.js"></script>
  
  

  <!-- Template Main JS File -->
  <script src="<?PHP echo base_url()?>/assets/hero/js/main.js"></script>

</body>

</html>