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

                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Khôi phục mật khẩu
                            </button>
                            <a class="btn btn-secondary" href="/customer">Quay lại</a>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
