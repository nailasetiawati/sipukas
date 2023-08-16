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
                    <h5 class="text-primary">Form Tambah Kategori Donatur</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="/expenses-category/create" method="POST" encytype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="text-primary">Nama Kategori Pengeluaran :</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="float-right mt-5">
                        <a href="/expenses-category" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
