@extends('layouts.frontend')

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item">Panier</li>
        </ol>
    </div>
</nav>
<panier></panier>
@endsection