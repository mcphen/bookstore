@extends('layouts.frontend')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Connexion</li>
        </ol>
    </div>
</nav>

<div class="page-header">
    <div class="container">
        <h1>Connexion</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="heading">
                <h2 class="title">Login</h2>
                
            </div><!-- End .heading -->

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Connexion</button>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                    @endif
                </div><!-- End .form-footer -->
            </form>
        </div><!-- End .col-md-6 -->

        
    </div><!-- End .row -->
</div><!-- End .container -->
@endsection


