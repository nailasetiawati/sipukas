@extends('app.main')

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
          </div>
          <div class="card mb-4 h-25">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="pt-2 mt-2">Laporan Kas</h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group float-right">
                            <form action="/reports" method="get">
                                <div class="input-group mt-2">
                                <input type="text" id="createdAt" name="date" class="form-control" placeholder="Filter Berdasarkan Tanggal Peminjaman">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-primary">Filter</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="card mb-4 pb-3 dt-container">
          <div class="col mt-2">
          <div class="btn-group dropright">
              <button type="button" class="btn btn-sm btn-outline-secondary rounded"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-download"></i>
              </button>
              <div class="dropdown-menu w-100 text-center">
                  <button class="btn btn-sm btn-success col w-75 mb-2 dt-excel"><i class="fas fa-file-excel"></i>
                      Excel</button>
                  <button class="btn btn-sm btn-danger col w-75 mb-2 dt-pdf"><i class="fas fa-file-pdf"></i>
                      PDF</button>
                  <button class="btn btn-sm btn-secondary col w-75 mb-2 dt-print"><i class="fas fa-print"></i>
                      Print</button>
              </div>
          </div>
          </div>
          <div class="p-2 mx-auto mt-2">
              <h5>Dana Pemasukan /Bulan</h5>
          </div>
          <hr class="mx-3">
          <div class="table-responsive px-3">
              <table class="table align-items-center table-bordered table-striped table-hover w-100"
                  id="dtReportBorrows">
                  <thead class="thead-light">
                      <tr>
                          <th>No</th>
                          <th>Nominal</th>
                          <th>Nama Donatur</th>
                          <th>Kategori Donatur</th>
                      </tr>
                  </thead>
              </table>
          </div>
      </div>
      <div class="card mb-4 pb-3 dt-container">
        <div class="col mt-2">
        <div class="btn-group dropright">
            <button type="button" class="btn btn-sm btn-outline-secondary rounded"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu w-100 text-center">
                <button class="btn btn-sm btn-success col w-75 mb-2 dt-excel"><i class="fas fa-file-excel"></i>
                    Excel</button>
                <button class="btn btn-sm btn-danger col w-75 mb-2 dt-pdf"><i class="fas fa-file-pdf"></i>
                    PDF</button>
                <button class="btn btn-sm btn-secondary col w-75 mb-2 dt-print"><i class="fas fa-print"></i>
                    Print</button>
            </div>
        </div>
        </div>
        <div class="p-2 mx-auto mt-2">
            <h5>Dana Pengeluaran /Bulan</h5>
        </div>
        <hr class="mx-3">
        <div class="table-responsive px-3">
            <table class="table align-items-center table-bordered table-striped table-hover w-100"
                id="dtReportBorrows">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>Kategori Pengeluaran</th>
                        <th>Deskripsi</th>
                        <th>Bukti Gambar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card mb-4 pb-3 dt-container">
      <div class="col mt-2">
      <div class="btn-group dropright">
          <button type="button" class="btn btn-sm btn-outline-secondary rounded"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
          </button>
          <div class="dropdown-menu w-100 text-center">
              <button class="btn btn-sm btn-success col w-75 mb-2 dt-excel"><i class="fas fa-file-excel"></i>
                  Excel</button>
              <button class="btn btn-sm btn-danger col w-75 mb-2 dt-pdf"><i class="fas fa-file-pdf"></i>
                  PDF</button>
              <button class="btn btn-sm btn-secondary col w-75 mb-2 dt-print"><i class="fas fa-print"></i>
                  Print</button>
          </div>
      </div>
      </div>
      <div class="p-2 mx-auto mt-2">
          <h5>Selisih /Bulan</h5>
      </div>
      <hr class="mx-3">
      <div class="table-responsive px-3">
          <table class="table align-items-center table-bordered table-striped table-hover w-100"
              id="dtReportBorrows">
              <thead class="thead-light">
                  <tr>
                      <th>No</th>
                      <th>Dana Pemasukan</th>
                      <th>Dana Pengeluaran</th>
                      <th>Total Selisih</th>
                  </tr>
              </thead>
          </table>
      </div>
  </div>
        </section>
      </div>
@endsection