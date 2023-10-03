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
                <div class="col-lg-6 col-sm-12 mx-auto">
                    <h6 class="text-white">Jika anda yakin dengan data dibawah silahkan klik tombol bayar untuk melakukan pembayaran!</h6>
                </div>
                <div class="col-6 mx-auto text-center">
                    @if (session('Berhasil'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('Berhasil') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('Gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('Gagal') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                </div>
            </div>
            <div class="mx-auto">
                <div class="col-lg-6 col-sm-12 mx-auto">
                    <div class="card p-3">
                        <form action="">
                            <div class="form-group mb-3">
                                <label for="name" class="text-primary">Nama :</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $transaction->donor_name }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="grade" class="text-primary">Jabatan :</label>
                                <select name="grade" id="grade" class="form-control" disabled>
                                    <option value="1">{{ $transaction->DonorsCategory->name }}</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nominal" class="text-primary">Nominal :</label>
                                <input type="text" name="nominal" id="nominal" class="form-control" readonly value="{{ "Rp " . number_format($transaction->total_price,2,',','.') }}">
                            </div>
                            @if ($transaction->payment_status == 1)
                            <button type="submit" class="btn btn-lg w-100 btn-primary" id="pay-button">Bayar</button>
                            @else
                                <div class="mx-auto text-center">
                                    <span class="badge bg-success text-white">Pembayaran Berhasil</span>
                                </div>
                            @endif
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

    
      <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
      </script>
      <script>
          const payButton = document.querySelector('#pay-button');
          payButton.addEventListener('click', function(e) {
              e.preventDefault();
  
              snap.pay('{{ $snapToken }}', {
                  // Optional
                  onSuccess: function(result) {
                      /* You may add your own js here, this is just example */
                      // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                      console.log(result)
                  },
                  // Optional
                  onPending: function(result) {
                      /* You may add your own js here, this is just example */
                      // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                      console.log(result)
                  },
                  // Optional
                  onError: function(result) {
                      /* You may add your own js here, this is just example */
                      // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                      console.log(result)
                  }
              });
          });
      </script>
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