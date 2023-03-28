@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px">

    <div class="card text-center">
        <div class="card-header">
            {{ __('Reset Password') }}
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
          <h5 class="card-title">Hello user</h5>
          <p class="card-text">Before proceeding, please check your email for a verification link.</p>
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center ">
                <div class="col-md-6 ">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
        <div class="card-footer text-muted">
        ss
        </div>
      </div>
</div>
@endsection


