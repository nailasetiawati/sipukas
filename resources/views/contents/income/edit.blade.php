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
                    <h5 class="text-primary">Form Edit Dana Pemasukan</h5>
                </div>
            </div>
            <div class="card-body">
                @foreach ($incomes as $data )
                <form action="/incomes/{{ $data->id }}/edit" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nominal" class="text-primary">Nominal :</label>
                        <input type="number" name="nominal" class="form-control @error('nominal')
                            is-invalid
                        @enderror" value="{{ $data->nominal }}">
                        @error('nominal')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="text-primary">Nama Donatur :</label>
                        <input type="text" name="donor_name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ $data->donor_name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="donorsCategory" class="text-primary">Kategori Donatur :</label>
                        <select name="donor_category_id" id="donorsCategory" class="form-control">
                            <option value="{{ $data->donor_category_id }}">{{ $data->DonorsCategory->name }}</option>
                            @foreach ($donorscategory as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="float-right mt-5">
                        <a href="/incomes" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
        </section>
      </div>
@endsection