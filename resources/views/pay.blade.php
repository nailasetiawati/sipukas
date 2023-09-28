<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Beranda &mdash; SIPUKAS</title>

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
  <link rel="stylesheet" href="cuscus.css">
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


        <div class="container" style="margin-top: 120px;">
            <div class="text-center">
                <h3 class="text-white">Bayar uang kas!</h3>
                <h6 class="text-white">Silahkan isi data dibawah untuk membayar uang kas!</h6>
            </div>
            <div class="mx-auto">
                <div class="col-lg-6 col-sm-12 mx-auto">
                    <div class="card p-3">
                        <form action="">
                            <div class="form-group mb-3">
                                <label for="name" class="text-primary">Nama :</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="grade" class="text-primary">Jabatan :</label>
                                <select name="grade" id="grade" class="form-control">
                                    <option value="1">Karyawan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nominal" class="text-primary">Nominal :</label>
                                <input type="number" name="nominal" id="nominal" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-lg w-100 btn-primary">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

              {{-- Footer --}}
      <footer class="bg-light text-center text-lg-start bottom-0">
        <!-- Copyright -->
        <div class="text-center p-3 bg-primary">
          <h6 class="text-white">© 2023 Copyright - SIPUKAS</h6>
        </div>
        <!-- Copyright -->
      </footer>
      {{-- End Footer --}}


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