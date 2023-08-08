@extends('app.main')

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
          </div>
          <div class="card mb-4 dt-container">
            <div class="col-lg-12 mt-3">
                <div class="btn-group dropright">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded mb-2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-download"></i>
                    </button>
                    <div class="dropdown-menu w-100 text-center">
                        <button class="btn btn-sm btn-success col w-75 mb-2"><i class="fas fa-file-excel dt-excel"></i> Excel</button>
                        <button class="btn btn-sm btn-danger col w-75 mb-2"><i class="fas fa-file-pdf dt-pdf"></i> PDF</button>
                        <button class="btn btn-sm btn-secondary col w-75 mb-2"><i class="fas fa-print dt-print"></i> Print</button>
                    </div>
                </div>
                <a href="/books/create" class="btn btn-sm btn-outline-primary rounded mb-2"><i
                        class="fas fa-plus"></i> Tambah</a>
                <div class="float-right ml-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fas fa-search"></i></span>
                        </div>
                        <input type="text" id="SearchBox" class="form-control form-control-sm dt-search"
                            placeholder="Masukan Kata Kunci" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="float-right">
                    <select name="lengthMenu" id="lengthMenu" class="form-control form-control-sm dt-length">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="-1">All</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-bordered table-striped table-hover w-100"
                    id="dtDonorsCategory">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar Buku</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th class="px-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>

        </section>
      </div>
@endsection