@extends('app.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $title }}</h1>
      </div>
      @if (session('Gagal'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('Gagal') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
      <div class="card p-4">
        <form action="/profile" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <label class="font-weight-bold text-primary">Nama :</label>
                <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                @enderror " value="{{ $user->name }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold text-primary">Email :</label>
                <input type="email" name="email" class="form-control @error('email')
                    is-invalid
                @enderror" value="{{ $user->email }}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold text-primary">Kata Sandi Lama :</label>
                <input type="password" name="oldPassword" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-weight-bold text-primary">Kata Sandi Baru :</label>
                <input type="password" name="newPassword" class="form-control @error('newPassword')
                is-invalid
            @enderror">
            @error('newPassword')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold text-primary">Ulangi Kata Sandi Baru :</label>
                <input type="password" name="repeatNewPassword" class="form-control @error('repeatNewPassword')
                    is-invalid
                @enderror">
                @error('repeatNewPassword')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <a href="/dashboard" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </section>
</div>
@endsection