@extends('layouts.frontend')

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item">Boutiques</li>
        </ol>
    </div>
</nav>
<div class="container">

<all_livres></all_livres>
</div><!-- End .container -->
    
@endsection