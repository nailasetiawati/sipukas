@extends('app.main')

@section('style')
  @include('components.style.datatable')
@endsection

@section('script')
    @include('components.script.datatable')
@endsection

@section('content')
@foreach ($expensesCategory as $item)
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
                Apakah anda yakin akan menghapus kategory {{ $item->name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/expenses-category/{{ $item->id }}/delete" method="get">
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
          @if (session('Gagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('Gagal') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
          <div class="card mb-4 dt-container">
            <div class="col-lg-12 mt-3">
                <a href="/expenses-category/create" class="btn btn-sm btn-outline-primary rounded mb-2"><i
                        class="fas fa-plus"></i> Tambah</a>
            </div>
            <hr>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-bordered table-striped table-hover w-100"
                    id="table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori Pengeluaran</th>
                            <th class="px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($expensesCategory as $data)      
                    <tbody>    
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $data->name }}</td>
                               <td class="px-5 text-center">
                                   <a href="/expenses-category/{{ $data->id }}/edit" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                   <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{ $data->id }}"><i
                                    class="fas fa-trash"></i></button>
                               </td>
                           </tr>           
                        </tbody>
                        @endforeach
                </table>
            </div>
        </div>
        </section>
      </div>
@endsection