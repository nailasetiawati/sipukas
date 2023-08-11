@extends('app.main')

@section('style')
  @include('components.style.datatable')
  <link rel="stylesheet" href="/css/swall.min.css">
@endsection

@section('script')
    @include('components.script.datatable')
    <script src="/js/swall.min.js"></script>
    <script>
        $(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
            title: "Are you sure!",
            icon: "warning",
            confirmButtonText: "Yakin!",
            cancelButtonText: "Tidak",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                url: {{ route('category.delete') }},
                type: 'DELETE',
                data: {id:id},
                success: function (data) {
                              //
                    }         
            });
    });
});
    </script>
@endsection

@section('content')
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
                <a href="/donors-category/create" class="btn btn-sm btn-outline-primary rounded mb-2"><i
                        class="fas fa-plus"></i> Tambah</a>
            </div>
            <hr>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-bordered table-striped table-hover w-100"
                    id="table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th class="px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donorsCategory as $data)                           
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td class="text-center">
                                <a href="/donors-category/{{ $data->id }}/edit" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-danger" id="delete" data-id="{{$data->id}}"><i class="fas fa-trash"></i></a>
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