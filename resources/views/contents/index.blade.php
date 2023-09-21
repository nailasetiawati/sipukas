@extends('app.main')

@section('script')
    <script src="/js/chart.js"></script>
    @include('components.script.incomechart')
    @include('components.script.profitchart')
@endsection

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="d-block section-header">
            <h1>{{ $title }}</h1>
            <div class="float-right">
              <li class="dropdown list-unstyled">
                <a class="nav-link dropdown-toggle" id="thisDay" role="button" data-toggle="dropdown" aria-expanded="false">
                  Hari Ini
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" onclick="getToday()">Hari Ini</a>
                  <a class="dropdown-item" onclick="getYesterday()">Kemarin</a>
                </div>
              </li>
            </div>
          </div>
          @if (session('Berhasil'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('Berhasil') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 id="incomeTitle">Pemasukan (Hari ini)</h4>
                  </div>
                  <div class="card-body" id="incomeResult">
                    {{ $income }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 id="expenseTitle">Pengeluaran (Hari ini)</h4>
                  </div>
                  <div class="card-body" id="expenseResult">
                    {{ $expense }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4 id="profitTitle">Selisih Uang Kas</h4>
                  </div>
                  <div class="card-body" id="profitResult">
                    {{ $profit }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card p-5"> 
                <h4 align="center">Statistik Keuangan</h4>
                    <canvas id="incomeChart" class="chartjs mb-3"></canvas>
              </div>
            </div>
            <div class="col-12">
              <div class="card p-5"> 
                <h4 align="center">Statistik Selisih Keuangan</h4>
                    <canvas id="profitChart" class="chartjs mb-3"></canvas>
              </div>
            </div>
          </div>
        </section>
      </div>
      @section('script')
          <script>
            function getYesterday(){
              $('#incomeTitle').html('');
              $('#incomeTitle').append('Pemasukan (Kemarin)');
              $('#incomeResult').html('');
              $('#incomeResult').append('{{ $incomeYesterday }}');
              $('#thisDay').html('');
              $('#thisDay').append('Kemarin');
              $('#expenseTitle').html('');
              $('#expenseTitle').append('Pengeluaran (Kemarin)');
              $('#expenseResult').html('');
              $('#expenseResult').append('{{ $expenseYesterday }}');
              $('#profitResult').html('');
              $('#profitResult').append('{{ $profitYesterday }}');
            }
            
            function getToday() {
              $('#incomeTitle').html('');
              $('#incomeTitle').append('Pemasukan (Hari Ini)');
              $('#incomeResult').html('');
              $('#incomeResult').append('{{ $income }}');
              $('#thisDay').html('');
              $('#thisDay').append('Hari Ini');
              $('#expenseTitle').html('');
              $('#expenseTitle').append('Pengeluaran (Hari Ini)');
              $('#expenseResult').html('');
              $('#expenseResult').append('{{ $expense }}');
              $('#profitResult').html('');
              $('#profitResult').append('{{ $profit }}');
            }
          </script>
      @endsection
@endsection