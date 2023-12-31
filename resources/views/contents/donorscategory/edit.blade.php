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
                    <h5 class="text-primary">Form Edit Kategori Donatur</h5>
                </div>
            </div>
            <div class="card-body">
              @foreach ($donorsCategory as $data)                  
              <form action="/donors-category/{{ $data->id }}/edit" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <label for="name" class="text-primary">Nama Kategori :</label>
                  <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                  @enderror" value="{{ $data->name }}">
                  @error('name')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="float-right mt-5">
                  <a href="/donors-category" class="btn btn-danger">Cancel</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              @endforeach
            </div>
        </div>
        </section>
      </div>
@endsection