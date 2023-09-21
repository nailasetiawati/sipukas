<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Home &mdash; SIPUKAS</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/css/style12.css">
  <link rel="stylesheet" href="/css/components.css">
  @yield('style')
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body class="bg-primary">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Bayar Uang Kas</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
    {{-- End Navbar --}}
    
    {{-- Hero Section --}}
      <section id="hero">
        <div class="container" style="height: 600px;">
          <h5 style="margin-top: 200px; letter-spacing: 5px;" class="text-white">Selamat Datang Di</h5>
          <h1 class="text-white" style="letter-spacing: 10px;">SIPUKAS</h1>
          <h6 class="text-white">Sistem Informasi Pembayaran Uang Kas</h6>
          <h6 class="text-white">Bayar Uang Kas Secara Online Dengan Berbagai Metode Pembayaran!</h6>
          <a href="" class="btn btn-outline-white">Bayar Sekarang!</a>
        </div>
      </section>
    {{-- End Hero Section --}}
    @include('sweetalert::alert')
  <!-- General JS Scripts -->
  <script src="/modules/jquery.min.js"></script>
  <script src="/modules/popper.js"></script>
  <script src="/modules/tooltip.js"></script>
  <script src="/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/modules/moment.min.js"></script>
  <script src="/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="/modules/chart.min.js"></script>
  <script src="/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/modules/summernote/summernote-bs4.js"></script>
  <script src="/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="/js/page/index-0.js"></script>
  
  <!-- Template JS File -->
  <script src="/js/scripts.js"></script>
  <script src="/js/custom.js"></script>
</body>
</html>