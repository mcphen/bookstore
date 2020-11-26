<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Forum Ecole Entreprise</title>
    <meta name="description" content="Forum ecole entreprise" />
    
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{url('/')}}/back/dist/img/logo.png">
	<link rel="icon" href="{{url('/')}}/back/dist/img/logo.png" type="image/x-icon">

	<!-- Morris Charts CSS -->
    <link href="{{url('/')}}/back/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
	
    <!-- vector map CSS -->
    <link href="{{url('/')}}/back/vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
	
	<!-- Toastr CSS -->
    <link href="{{url('/')}}/back/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">


	<!-- Data Table CSS -->
	<link href="{{url('/')}}/back/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="{{url('/')}}/back/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />



	<!-- jquery-steps css -->
	<link rel="stylesheet" href="{{url('/')}}/back/vendors/jquery-steps/demo/css/jquery.steps.css">

	<!-- Toggles CSS -->
	<link href="{{url('/')}}/back/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/back/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="{{url('/')}}/back/dist/css/style.css" rel="stylesheet" type="text/css">
	<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">


	<style>
		.attention{
			font-weight: bold;
			color: red;
		}
	</style>
	



	
</head>

<body >
<!-- Preloader -->
<div class="preloader-it">
	<div class="loader-pendulums"></div>
</div>
<!-- /Preloader -->

 

<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav">

	<!-- Top Navbar -->
	<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
		<a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
		<a class="navbar-brand" href="#">
			<img class="brand-img" src="{{url('/')}}/back/dist/img/logo.png" alt="brand" width="35px" />
		</a>
		<ul class="navbar-nav hk-navbar-content">

			<li class="nav-item dropdown dropdown-authentication">
					<a class="text-white" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<i class="dropdown-icon zmdi zmdi-power"></i><span>Deconnexion</span>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</nav>

	<!-- /Top Navbar -->

	<!-- Vertical Nav -->
	<nav class="hk-nav hk-nav-light">
		<a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
		<div class="nicescroll-bar" style="background-color:rgb(18, 27, 81) !important">
			<div class="navbar-nav-wrap">

					@if (Auth::user()->role_id ==1)
						<ul class="navbar-nav flex-column">
							<li class="nav-item active">
								<a class="nav-link" href="#" >
									<span class="feather-icon"><i data-feather="activity"></i></span>
									<span class="nav-link-text">Tableau de bord</span>
								</a>

							</li>
						</ul>
						<hr class="nav-separator">
						<div class="nav-header">
							<span>Prospects</span>
							<span>UI</span>
						</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item active">
								<a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_prospect">
									<span class="feather-icon"><i data-feather="users"></i></span>
									<span class="nav-link-text">Livres</span>
								</a>
								<ul id="pages_prospect" class="nav flex-column collapse collapse-level-1">
									<li class="nav-item">
										<ul class="nav flex-column">
											<li class="nav-item">
                                                <a class="nav-link" href="{{ url('admin/livres') }}">Liste Livre</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('admin/categorie') }}">Catégories</a>
											</li>
											<li class="nav-item">
                                                <a class="nav-link" href="{{ url('admin/collection') }}">Sous-catégories</a>
                                            </li>

												
										</ul>
									</li>
								</ul>

							</li>
						</ul>

						
						
						<hr class="nav-separator">
						<div class="nav-header">
							<span>PARAMETRAGE</span>
							<span>UI</span>
						</div>
						<ul class="navbar-nav flex-column">
								<li class="nav-item">
										<a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_drp">
											<span class="feather-icon"><i data-feather="settings"></i></span>
											<span class="nav-link-text">Parametrage</span>
										</a>
										<ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
											<li class="nav-item">
												<ul class="nav flex-column">
											
													<li class="nav-item">
														<a class="nav-link" href="#">Roles</a>
                                                    </li>
                                                    
												</ul>
											</li>
										</ul>
									</li>

							


							

						</ul>
					
						<hr class="nav-separator">
						<div class="nav-header">
							<span>PARAMETRAGE</span>
							<span>UI</span>
						</div>
						<ul class="navbar-nav flex-column">
								<li class="nav-item">
										<a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_utl">
											<span class="feather-icon"><i data-feather="settings"></i></span>
											<span class="nav-link-text">Utilisateurs</span>
										</a>
										<ul id="pages_utl" class="nav flex-column collapse collapse-level-1">
											<li class="nav-item">
												<ul class="nav flex-column">
											
													<li class="nav-item">
														<a class="nav-link" href="#">Auteurs</a>
                                                    </li>
                                                    
												</ul>
											</li>
										</ul>
									</li>

							


							

						</ul>
                    @endif


					




			</div>
		</div>
	</nav>
	<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
	<!-- /Vertical Nav -->



	<!-- Main Content -->
	<div class="hk-pg-wrapper" >
			<div id="app">

					@yield('content')
				
				</div>
				
		
		<!-- Footer -->
		<div class="hk-footer-wrap container">
			<footer class="footer">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<p>Pampered by<a href="#" class="text-dark" target="_blank">SUPDECO DEDN</a> © 2019</p>
					</div>
					
				</div>
			</footer>
		</div>
		<!-- /Footer -->
	</div>
	<!-- /Main Content -->

</div>
<!-- /HK Wrapper -->
<script src="{{asset('js/app.js')}}"></script>

    <!-- jQuery -->
    <script src="{{url('/')}}/back/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/')}}/back/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('/')}}/back/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{url('/')}}/back/dist/js/jquery.slimscroll.js"></script>

   
   

    @yield('dataTable')
	
	
	 <!-- FeatherIcons JavaScript -->
	 <script src="{{url('/')}}/back/dist/js/feather.min.js"></script>

	  <!-- Fancy Dropdown JS -->
	  <script src="{{url('/')}}/back/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Init JavaScript -->
    <script src="{{url('/')}}/back/dist/js/init.js"></script>











<script>
        $(document).ready(function() {
            $('#fermertout').click(function(){
                $('#exampleModal').modal('hide');
                $('.modal-backdrop').remove();
            })
        })
        
    </script>


</body>

</html>
