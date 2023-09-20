@extends('app.main')

@section('style')
    <link rel="stylesheet" href="/css/daterange.css">
    <link rel="stylesheet" href="/modules/datatables/datatables.min.css">
@endsection

@section('script')
    <script src="/js/momen.js"></script>
    <script src="/js/daterange.js"></script>
    <script src="/modules/datatables/datatables.min.js"></script>
    <script src="/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/modules/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $('#createdAt').daterangepicker();
        var dtIncome = $('#dtIncome').dataTable({searching: false, lengthChange:false});
        var dtExpeses = $('#dtExpenses').dataTable({searching: false, lengthChange:false});
        var dtProfit = $('#dtProfit').dataTable({searching: false, lengthChange:false});
    </script>
@endsection

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
                            <form action="/report" method="POST">
                                @csrf
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
              <h5>Dana Pemasukan</h5>
          </div>
          <hr class="mx-3">
          <div class="table-responsive px-3">
              <table class="table align-items-center table-bordered table-striped table-hover w-100"
                  id="dtIncome">
                  <thead class="thead-light">
                      <tr>
                          <th>No</th>
                          <th>Nominal</th>
                          <th>Nama Donatur</th>
                          <th>Kategori Donatur</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($incomes as $income)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $income->donor_name }}</td>
                            <td>{{ $income->DonorsCategory->name }}</td>
                            <td class="text-right">{{ "Rp " . number_format($income->nominal,2,',','.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="bg-secondary"></td>
                        <td style="font-weight: bold;" class="bg-secondary text-right">Total : {{ "Rp " . number_format($totalincome,2,',','.') }}</td>
                    </tr>
                  </tbody>
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
            <h5>Dana Pengeluaran</h5>
        </div>
        <hr class="mx-3">
        <div class="table-responsive px-3">
            <table class="table align-items-center table-bordered table-striped table-hover w-100"
                id="dtExpenses">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>Kategori Pengeluaran</th>
                        <th>Deskripsi</th>
                        <th>Bukti Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $expense->ExpenseCategory->name }}</td>
                            <td>{{ $expense->description }}</td>
                            <td class="mx-auto p-2"><img src="/img/expense-image/{{ $expense->image }}" height="100" width="150"></td>
                            <td class="text-right">{{ "Rp " . number_format($expense->nominal,2,',','.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="bg-secondary"></td>
                        <td style="font-weight: bold;" class="bg-secondary text-right">Total : {{ "Rp " . number_format($totalexpenses,2,',','.') }}</td>
                    </tr>
                </tbody>
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
          <h5>Selisih</h5>
      </div>
      <hr class="mx-3">
      <div class="table-responsive px-3">
          <table class="table align-items-center table-bordered table-striped table-hover w-100"
              id="dtProfit">
              <thead class="thead-light">
                  <tr>
                      <th>No</th>
                      <th>Dana Pemasukan</th>
                      <th>Dana Pengeluaran</th>
                      <th>Total Selisih</th>
                  </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ "Rp " . number_format($totalincome,2,',','.') }}</td>
                        <td>{{ "Rp " . number_format($totalexpenses,2,',','.') }}</td>
                        <td>{{ "Rp " . number_format($profits,2,',','.') }}</td>
                    </tr>
              </tbody>
          </table>
      </div>
  </div>
        </section>
      </div>
@endsection