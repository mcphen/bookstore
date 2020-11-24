@extends('layouts.backend')

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Tableau de bord</a></li>
            <li class="breadcrumb-item">Livres</li>
            <li class="breadcrumb-item active" aria-current="page">Collections</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    
    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header mb-10">
            <div>
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="user"></i></span></span>Collections</h4>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                        <collection></collection>    
                </section>
            </div>
        </div>
    </div>




@endsection