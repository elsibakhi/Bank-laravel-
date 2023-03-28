@extends('layouts.app')

@section('content')

<section class="container" style="padding-top:200px; ">
    <div class="container-fluid h-custom">
      @if(Session::has('message'))
      <div class="alert alert-success">
          {{ Session::get('message') }}
      </div>
    @endif

      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">{{ __('Login') }}</p>
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-linkedin-in"></i>
              </button>
            </div>
  
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Or</p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="personal_id">Personal id</label>
                <input id="personal_id" type="text" class="form-control @error('personal_id') is-invalid @enderror" name="personal_id" value="{{ old('personal_id') }}" required autocomplete="personal_id" autofocus
                placeholder="Enter a valid personal id " />
                @error('personal_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                placeholder="Enter password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              
            </div>
         <!-- Google reCaptcha v2 -->
         {!! htmlFormSnippet() !!}
         @if($errors->has('g-recaptcha-response'))
           <div>
              <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
           </div>
         @endif
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;"> {{ __('Login') }}</button>
                @if (Route::has('password.request'))
                <p class="small fw-bold mt-2 pt-1 mb-0">
                <a class="link-danger" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a></p>
            @endif
          
            </div>
  
          </form>
        </div>
      </div>
    </div>

  </section>
@endsection



