<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} &mdash; SIPUKAS</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/css/style.css">
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

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

        @include('components.navbar')
      
        @include('components.sidebar')

        @yield('content')

        @include('components.footer')

      </div>
    </div>
    
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
  @yield('script')
</body>
</html>