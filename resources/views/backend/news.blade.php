@extends('layouts.backend')

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Tableau de bord</a></li>
            <li class="breadcrumb-item">Actualités</li>
            
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    
    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header mb-10">
            <div>
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="user"></i></span></span>Actualités</h4>
            </div>
        </div>
    
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    
                    <a href="{{url('/admin/news/add')}}" class="btn btn-primary text-white"><i class="icon ion-ios-add"></i> Ajouter une new</a>
                    <br> <br>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-responsive">
                                <table id="" class="table  table-bordered w-100  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            
                                            
                                            <th>Publiée</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($livres as $produit)

                                        <tr>
                                            
                                            <td>{{$produit->titre}}</td>
                                            
                                            
                                            <td>
                                                @if ($produit->publish==1)
                                                <span style="color : green"><i class="fa fa-check"></i></span>
                                                @else
                                                <span style="color : red"><i class="fa fa-times"></i></span>
                                                @endif
                                            </td>
                                            <td>
                                                
                                            
                                            </td>
                                            
                                        </tr>
                                            
                                        @endforeach
                                        
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th >Nom</th>
                                            
                                            
                                            <th>Publiée</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
        <!-- /Row -->
    </div>




@endsection