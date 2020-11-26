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
                                <li><a href="#">A propos</a></li>
                                <li><a href="my-account.html">Espace auteurs</a></li>
                                <li><a href="#">Le comité de lecture</a></li>
                                <li><a href="#">Actualités</a></li>
                                <li><a href="blog.html">Boutique</a></li>
                                <li><a href="contact.html">Médiathèque</a></li>
                                <li><a href="login.html">Connexion</a></li>
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
                            <a href="index-2.html" class="logo">
                                <img src="{{url('/')}}/assets/images/logo.jpg" style="width: 200px" alt="Porto Logo">
                            </a>
                            <nav class="main-nav">
                                
                                    <navigation :mobile="0"></navigation>
                                    
                                
                            </nav>
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
                                <h3>Get Special Offers and Savings</h3>
                                <p>Get all the latest information on Events, Sales and Offers.</p>
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
                <div class="footer-middle">
                    <div class="container">
                        <div class="row row-sm">
                            <div class="col-md-6 col-lg-3">
                                <img src="{{url('/')}}/assets/images/logo-white.png">
                                <p>Lorem ipsum dolor sit amet, consectetur adipis.</p>
                                <div class="social-link">
                                    <h3 class="link-title">QUESTIONS?</h3>
                                    <a href="#">1-888-123-456</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget">
                                    <h3 class="widget-title">Account</h3>
                                    <div class="widget-content row row-sm">
                                        <ul class="col-xl-6">
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="#">Track Your Order</a></li>
                                            <li><a href="#">Payment Methods</a></li>
                                            <li><a href="#">Shipping Guide</a></li>
                                        </ul>
                                        <ul class="col-xl-6">
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="#">Product Support</a></li>
                                            <li><a href="#">Privacy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget">
                                    <h3 class="widget-title">About</h3>
                                    <div class="widget-content row row-sm">
                                        <ul class="col-xl-6">
                                            <li><a href="about.html">About Porto</a></li>
                                            <li><a href="#">Our Guarantees</a></li>
                                            <li><a href="#">Terms And Conditions</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                        </ul>
                                        <ul class="col-xl-6">
                                            <li><a href="#">Return Policy</a></li>
                                            <li><a href="#">Intellectual Property Claims</a></li>
                                            <li><a href="#">Site Map</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget">
                                    <h3 class="widget-title">Features</h3>
                                    <div class="widget-content">
                                        <ul>
                                            <li><a href="#">Powerful Admin Panel</a></li>
                                            <li><a href="#">Mobile & Retina Optimized</a></li>
                                            <li><a href="#">Super Fast Magento Theme</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom container">
                    <p>Porto eCommerce. © 2020. All Rights Reserved</p>
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