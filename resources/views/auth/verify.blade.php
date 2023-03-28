@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px">

    <div class="card text-center">
        <div class="card-header">
            Verification
        </div>
        <div class="card-body">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
          <h5 class="card-title">Hello {{Auth::user()->name}}</h5>
          <p class="card-text">Before proceeding, please check your email for a verification link.</p>
          <form  method="POST" action="{{ route('verification.resend') }}">
            @csrf
           
      
    
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">{{ __('Send verification link to  your email now') }}</button></div>
        </form>
        </div>
        <div class="card-footer text-muted">
         {{Auth::user()->created_at->diffForHumans()}}
        </div>
      </div>
</div>
@endsection
