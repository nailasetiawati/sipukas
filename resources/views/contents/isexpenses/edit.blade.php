@extends('app.main')

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
          </div>
          <div class="card">
            <div class="card-header">
                <div class="card-title my-auto">
                    <h5 class="text-primary">Form Edit Dana Pengeluaran</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="/isexpense/{id}/edit" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nominal" class="text-primary">Nominal :</label>
                        <input type="number" name="nominal" class="form-control @error('nominal')
                            is-invalid
                        @enderror" value="90000000">
                        @error('nominal')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                      <label for="isExpenses" class="text-primary">Kategori Pengeluaran :</label>
                      <select name="is_expenses_id" id="isExpenses" class="form-control">
                          <option value="1">Pembelian Barang</option>
                          <option value="2">ATK</option>
                      </select>
                  </div>
                    <div class="form-group mb-3">
                        <label for="name" class="text-primary">Deskripsi :</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="ccccccc">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                      <label for="name" class="text-primary">Bukti Gambar :</label>
                      <input type="file" name="name" class="form-control @error('name')
                          is-invalid
                      @enderror">
                      @error('name')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                    
                    <div class="float-right mt-5">
                        <a href="/isexpense" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </section>
      </div>
@endsection