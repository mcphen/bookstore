@extends('layouts.backend')

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Tableau de bord</a></li>
            <li class="breadcrumb-item">Livres</li>
            <li class="breadcrumb-item active" aria-current="page">Liste</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    
    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header mb-10">
            <div>
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="user"></i></span></span>Livres</h4>
            </div>
        </div>
    
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    
                    <a href="{{url('/admin/livres/add')}}" class="btn btn-primary text-white"><i class="icon ion-ios-add"></i> Ajouter un livre</a>
                    <br> <br>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-responsive">
                                <table id="" class="table  table-bordered w-100  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            
                                            <th>Prix</th>
                                            
                                            <th>Vedette</th>
                                            <th>Publiée</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($livres as $produit)

                                        <tr>
                                            
                                            <td>{{$produit->titre}}</td>
                                            
                                            <td>{{$produit->price}}</td>
                                            <td>
                                                @if ($produit->popular_livre==1)
                                                <span style="color : green"><i class="fa fa-check"></i></span>
                                                @else
                                                <span style="color : red"><i class="fa fa-times"></i></span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($produit->publish==1)
                                                <span style="color : green"><i class="fa fa-check"></i></span>
                                                @else
                                                <span style="color : red"><i class="fa fa-times"></i></span>
                                                @endif
                                            </td>
                                            <td>
                                                
                                            <action_button identifiant="{{$produit->id}}"></action_button>
                                            </td>
                                            
                                        </tr>
                                            
                                        @endforeach
                                        
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th >Nom</th>
                                            
                                            <th>Prix</th>
                                            
                                            <th>Vedette</th>
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


@section('dataTable')
<!-- Data Table JavaScript -->
<script src="{{url('/')}}/back/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{url('/')}}/back/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{url('/')}}/back/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{url('/')}}/back/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/back/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/back/dist/js/dataTables-data.js"></script>
@endsection