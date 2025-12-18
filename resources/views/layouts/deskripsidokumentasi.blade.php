<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desa CIARUTEUN ILIR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset ('template/foto/logo.png') }}" rel="icon">
  <link href="{{ asset ('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset ('template/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset ('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('template/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('template/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset ('template/css/style.css') }}" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>

<body>
@foreach($kontak as $keys)
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{$keys->email}}">{{$keys->email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{$keys->no_telepon}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>
@endforeach
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="#hero" class="logo"><img src="{{ asset ('template/foto/logo.png') }}" alt=""></a>
      <h5 class="logo">Desa CIARUTEUN ILIR</h5>
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="/#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="/#about">Tentang</a></li>
          <!-- <li><a class="nav-link scrollto" href="/#services">Pelayanan</a></li> -->
          <li><a class="nav-link scrollto " href="//#portfolio">Dokumentasi</a></li>
          <li><a class="nav-link scrollto " href="/#Aparaturdesa">Aparatur Desa</a></li>
          <li><a class="nav-link scrollto " href="/#BPD">BPD</a></li>
          <li><a class="nav-link scrollto " href="/#RT/RW">RT/RW</a></li>
          <li><a class="nav-link scrollto " href="/#LINMAS">Linmas</a></li>
          <li><a class="nav-link scrollto " href="/#LPM">LPM</a></li>
          <li><a class="nav-link scrollto" href="/#struktur">Struktur Organisasi</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Detail Dokumentasi</h2>
    </div>

  </div>
</section><!-- Breadcrumbs Section -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach($detail->slice(0, 2) as $data)

            <div class="swiper-slide">
              <img src="/detaildokumentasi/fetch_image_detail/{{ $data->id_detaildokumentasi }}" height="60" class="img-fluid" alt="">
            </div>

            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      @foreach($dokumentasi as $keys)
      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Informasi Kegiatan</h3>
          <ul>
            <li><strong>Judul</strong>: <p>{{ $keys->nama_dokumentasi }}</li>
            <li><strong>Kategori</strong>: <p>{{ $keys->kategori_dokumentasi }} desa </li>
            <li><strong>Tanggal Kegiatan</strong>:<p> {{ date('d-m-Y', strtotime($keys->tanggal_dokumentasi)) }}</li>
          </ul>
        </div>
      </div>
        <div class="portfolio-description">
          <h2>{{ $keys->nama_dokumentasi }} dalam {{ $keys->kategori_dokumentasi }} Desa </h2>
          <p>
            {!! $keys->deskripsi  !!}
          </p>
        </div>
      </div>
       @endforeach
    </div>

  </div>
</section><!-- End Portfolio Details Section -->
  </main>
    

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <!-- <div class="footer-newsletter"> -->
      <!-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->
    @foreach($kontak as $keys)
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
              <strong>Alamat:</strong> {{ $keys->alamat }}<br>
              <strong>Phone:</strong> {{ $keys->no_telepon }}<br>
              <strong>Email:</strong> {{ $keys->email }}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Dokumentasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Struktur Organisasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Social Media</h4>
            <p>Silahkan Kunjungi Sosial Media Kami</p>
            <div class="social-links mt-3">
              <a href="#" class="whatsapp"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>
            @endforeach
        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>CIARUTEUN ILIR</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset ('template/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset ('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('template/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset ('template/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset ('template/js/main.js') }}"></script>

  <!-- datatable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  
  <script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
  </script>
</body>

</html>