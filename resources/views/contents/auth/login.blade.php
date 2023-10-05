@extends('app.auth')

@section('content')
@if (session('Gagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('Gagal') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
<div class="card card-primary">
    <div class="card-header"><h4>Login</h4></div>

    <div class="card-body">
      <form action="/login" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control @error('email')
            is-invalid
          @enderror" name="email" required>
          <div class="invalid-feedback">
            Please fill in your email
          </div>
          @error('email')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <div class="d-block">
              <label for="password" class="control-label">Password</label>
          </div>
          <input id="password" type="password" class="form-control @error('password')
            is-invalid
          @enderror" name="password" tabindex="2" required>
          <div class="invalid-feedback">
            please fill in your password
          </div>
          @error('password')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
            <label class="custom-control-label" for="remember-me">Remember Me</label>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection