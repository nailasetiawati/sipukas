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
                @foreach ($expenses as $data)
                <form action="/isexpense/{{ $data->id }}/edit" method="POST" enctype="multipart/form-data">
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
                      <label for="isExpenses" class="text-primary">Kategori Pengeluaran :</label>
                      <select name="expense_category_id" id="isExpenses" class="form-control @error('expense_category_id')
                          is-invalid
                      @enderror">
                      <option value="{{ $data->id }}" selected>{{ $data->ExpenseCategory->name }}</option>
                      <option value="0" disabled >Pilih Kategori </option>
                      @foreach ($categories as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                          
                      </select>
                      @error('expense_category_id')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                    <div class="form-group mb-3">
                        <label for="name" class="text-primary">Deskripsi :</label>
                        <input type="text" name="description" class="form-control @error('description')
                            is-invalid
                        @enderror" value="{{ $data->description }}">
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <label for="name" class="text-primary">Bukti Gambar :</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input @error('image')
                            is-invalid
                        @enderror" id="image" onchange="previewImage()">
                        <label class="custom-file-label" for="image">Choose file</label>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>

                        @enderror

                      </div>
                      <div class="col-2 mt-3">
                        <div class="card shadow">
                            <div class="mx-auto">
                                <img src="/img/expense-image/{{ $data->image }}" class="img-preview img-fluid" height="100" width="150" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="float-right mt-5">
                        <a href="/isexpense" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
        </section>
      </div>
      <script>
        function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
    
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection