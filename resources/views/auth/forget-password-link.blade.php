@extends('auth.layout')

@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Khôi phục mật khẩu</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input type="email" id="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus readonly>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                        <div class="col-md-6">
                            <input type="password" id="password" class="form-control" name="password" required autofocus>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu</label>
                        <div class="col-md-6">
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Cập nhật
                            </button>
                            <a class="btn btn-secondary" href="/customer">Đăng nhập</a>

                        </div>
                    </div>
                </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection