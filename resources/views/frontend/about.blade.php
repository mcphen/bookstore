@extends('layouts.frontend')

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item">A propos</li>
        </ol>
    </div>
</nav>

<div class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="subtitle">OUR HISTORY</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dapibus a eros in venenatis. Cras mauris arcu, suscipit id lacinia sed, pulvinar in urna. Donec urna nisi, efficitur fermentum ullamcorper non, mattis et est. Nullam malesuada leo leo, non tempus turpis accumsan a. Sed tincidunt feugiat purus, sed lobortis justo consequat in. Phasellus lectus magna, accumsan eget felis in, hendrerit malesuada lectus. Duis orci nunc, vulputate vel sapien nec, sodales sollicitudin ligula.</p>
            </div><!-- End .col-lg-7 -->

            
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .about-section -->
<div class="company-section">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-md-6">
                <img src="assets/images/about/img-1.jpg" alt="image">
            </div><!-- End .col-lg-6 -->

            <div class="col-md-6 padding-left-lg">
                <h3 class="subtitle">OUR MISSION</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>

                <h3 class="subtitle">OUR VISION</h3>
                <p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only look now.</p>
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .company-section -->
    
@endsection