@extends('layouts.app')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
        <li><a href="index.html">Home</a></li>
        <li>Pricing</li>
        </ol>
        <h2>Pricing</h2>

    </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
    <div class="container">

        <div class="row no-gutters">

        <div class="col-lg-4 box">
            <h3>Free</h3>
            <h4>$0<span>per month</span></h4>
            <ul>
            <li><i class="fas fa-check"></i> Quam adipiscing vitae proin</li>
            <li><i class="fas fa-check"></i> Nec feugiat nisl pretium</li>
            <li><i class="fas fa-check"></i> Nulla at volutpat diam uteera</li>
            <li class="na"><i class="fas fa-times"></i> <span>Pharetra massa massa ultricies</span></li>
            <li class="na"><i class="fas fa-times"></i> <span>Massa ultricies mi quis hendrerit</span></li>
            </ul>
            <a href="#" class="buy-btn">Buy Now</a>
        </div>

        <div class="col-lg-4 box featured">
            <h3>Business</h3>
            <h4>$29<span>per month</span></h4>
            <ul>
            <li><i class="fas fa-check"></i> Quam adipiscing vitae proin</li>
            <li><i class="fas fa-check"></i> Nec feugiat nisl pretium</li>
            <li><i class="fas fa-check"></i> Nulla at volutpat diam uteera</li>
            <li><i class="fas fa-check"></i> Pharetra massa massa ultricies</li>
            <li><i class="fas fa-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="buy-btn">Buy Now</a>
        </div>

        <div class="col-lg-4 box">
            <h3>Developer</h3>
            <h4>$49<span>per month</span></h4>
            <ul>
            <li><i class="fas fa-check"></i> Quam adipiscing vitae proin</li>
            <li><i class="fas fa-check"></i> Nec feugiat nisl pretium</li>
            <li><i class="fas fa-check"></i> Nulla at volutpat diam uteera</li>
            <li><i class="fas fa-check"></i> Pharetra massa massa ultricies</li>
            <li><i class="fas fa-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="buy-btn">Buy Now</a>
        </div>

        </div>

    </div>
    </section><!-- End Pricing Section -->

</main><!-- End #main -->

@include('layouts.footer')

@endsection
