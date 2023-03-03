<!DOCTYPE html>
<html lang="en">
  @include('templates.header')
  <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/auth.css"/>

  <body>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
                <img src="{{ asset('assets') }}/images/logo/logo2.svg" alt="Logo"/>
            </div>
            <h1 class="auth-title mb-5">Log in.</h1>
            <form action="login" method="POST" data-parsley-validate>
              @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username" data-parsley-required="true" data-parsley-required-message="Username harus diisi!" value="{{ old('username') }}"/>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password" data-parsley-required="true" data-parsley-required-message="Username harus diisi!"/>
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Log in
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Don't have an account?
                <a href="{{ url('register') }}" class="font-bold">Sign up</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
    @include('templates.footer')
  </body>
</html>