@extends('layouts.frontend')

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item">{{ $title }}</li>
        </ol>
    </div>
</nav>
<div class="container">

<single_livre :idprod="{{$idlivre}}"></single_livre>
</div><!-- End .container -->
    
@endsection