<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-header">{{ __('Register') }}</div>
<form method="POST" action="{{ route('registration.post') }}" enctype="multipart/form-data">
  @csrf
  @if (Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
  @endif
  @if (Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
  @endif
  <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

      <div class="col-md-6">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

      <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

      <div class="col-md-6">
          <select name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role')}}" autofocus required>
              <option value="admin">Admin</option>
              <option value="lineman">Lineman</option>
          </select>
          <!-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> -->

          @error('role')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

      <div class="col-md-6">
          <select name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status')}}" autofocus required>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>

          @error('status')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

      <div class="col-md-6">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row mb-0">
      <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
              {{ __('Register') }}
          </button>
      </div>
  </div>
</form>
</div>
@endsection
