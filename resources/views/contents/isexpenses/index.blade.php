@extends('app.main')

@section('style')
  @include('components.style.datatable')
@endsection

@section('script')
    @include('components.script.datatable')
@endsection

@section('content')
@foreach ($expenses as $item)
<!-- Modal -->
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perhatian!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus dana pengeluaran {{ $item->nominal }} untuk {{ $item->ExpenseCategory->name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/isexpense/{{ $item->id }}/delete" method="get">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
          </div>
          @if (session('Berhasil'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('Berhasil') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
        <div class="card mb-4 dt-container">
          <div class="col-lg-12 mt-3">
              <a href="/isexpense/create" class="btn btn-sm btn-outline-primary rounded mb-2"><i
                      class="fas fa-plus"></i> Tambah</a>
          </div>
          <hr>
          <div class="table-responsive p-3">
              <table class="table align-items-center table-bordered table-striped table-hover w-100"
                  id="table">
                  <thead class="thead-light">
                      <tr>
                          <th>No</th>
                          <th>Nominal</th>
                          <th>Kategori Pengeluaran</th>
                          <th>Deskripsi</th>
                          <th class="text-center">Bukti Gambar</th>
                          <th class="px-5 text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($expenses as $data)   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ "Rp " . number_format($data->nominal,2,',','.') }}</td>
                        <td>{{ $data->ExpenseCategory->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td class="mx-auto p-2"><img src="/img/expense-image/{{ $data->image }}" height="100" width="150"></td>
                        <td class="px-5 text-center">
                            <a href="/isexpense/{{ $data->id }}/edit" class="btn btn-success"><i class="fas fa-pen"></i></a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{ $data->id }}"><i
                                class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
        </section>
      </div>
@endsection