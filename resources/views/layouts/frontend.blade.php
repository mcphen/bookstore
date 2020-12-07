<!DOCTYPE html>
<html lang="fr">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Les Éditions du Commerce</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Les Éditions du Commerce">
    <meta name="author" content="Enock MAMBOU">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="">
    
    
    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{url('/')}}/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor/fontawesome-free/css/all.min.css">
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <div class="page-wrapper">
            <header class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="header-left header-dropdowns">
                            
                        </div><!-- End .header-left -->
                        <div class="header-right">
                            <ul> 
                                <li><a href="{{ url('/about') }}">A propos</a></li>
                                <li><a href="my-account.html">Espace auteurs</a></li>
                                <li><a href="#">Le comité scientifique</a></li>
                                <li><a href="#">Actualités</a></li>
                                <li><a href="{{ url('/boutiques') }}">Boutique</a></li>
                                <li><a href="contact.html">Médiathèque</a></li>
                                
                                <!-- Authentication Links -->
                                @guest
                                    <li >
                                        <a href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                    </li>
                                    
                                
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div><!-- End .header-top -->

                <div class="header-middle sticky-header">
                    <div class="container">
                        <div class="header-left">
                            <button class="mobile-menu-toggler" type="button">
                                <i class="icon-menu"></i>
                            </button>
                            <a href="{{url('/')}}" class="logo">
                                <img src="{{url('/')}}/assets/images/logo.jpg" style="width: 200px" alt="Porto Logo">
                            </a>
                            <nav class="main-nav">
                                
                                    <navigation :mobile="0"></navigation>
                                    
                                
                            </nav>
                        </div>

                        <div class="header-right">

                            <cart></cart>
                            
    
                            
                            @auth
                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-user-2" style="font-size: 2.7rem"></i>
                                    
                                    
                                </a>
    
                                <div class="dropdown-menu" >
                                    <div class="dropdownmenu-wrapper">
                                        <logoutcomponent></logoutcomponent>
                                        
                                    </div><!-- End .dropdownmenu-wrapper -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .dropdown -->
                            @endauth
                        </div>
                        
                    </div>
                </div>

                
            </header><!-- End .header -->

            <main class="home main">
                
                @yield('content')
            </main><!-- End .main -->

            <footer class="footer">
                

                <div class="footer-top">
                    <div class="container">
                        <div class="newsletter-widget">
                            <i class="icon-envolope"></i>

                            <div class="newsletter-info">
                                <h3>INSCRIVEZ VOUS À NOTRE NEWSLETTER</h3>
                                <p>Recevez régulièrement la liste de nos nouveautés      </p>
                            </div>

                            <form action="#" method="get">
                                <div class="submit-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Enter Your E-mail Address..." required="">
                                    <button class="btn" type="submit">Sign Up</button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div>

                        <div class="social-icons">
                            <a href="#" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="footer-bottom container">
                    <p>Les Editions du Commerce - DEDN. © 2020. Tous droits réservés</p>
                </div>
            </footer><!-- End .footer -->
        </div><!-- End .page-wrapper -->

        <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

        <div class="mobile-menu-container">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="icon-retweet"></i></span>
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <navigation :mobile="1"></navigation>
                    </ul>
                </nav><!-- End .mobile-nav -->

                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                    <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
                </div><!-- End .social-icons -->
            </div><!-- End .mobile-menu-wrapper -->
        </div><!-- End .mobile-menu-container -->

        

        

        <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Plugins JS File -->
    <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
    <script src="{{url('/')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/assets/js/plugins.min.js"></script>
    <script src="{{url('/')}}/assets/js/plugins/isotope-docs.min.js"></script>

    <!-- Main JS File -->
    <script src="{{url('/')}}/assets/js/main.min.js"></script>
</body>

</html>