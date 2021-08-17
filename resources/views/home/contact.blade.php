@extends('layouts.app')

@section('content')
<!-- ======= Hero Section ======= -->

<main id="main">
        <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
        <ol>
            <li><a href="{{route('home')}}">@lang('site.home')</a></li>
            <li>@lang('site.contact')</li>
        </ol>
        <h2>@lang('site.contact')</h2>

        </div>
    </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

        <div class="row">
            <div class="col-lg-6">
            <div class="info-box mb-4">
                <i class="fas fa-map"></i>
                <h3>@lang('site.address')</h3>
                <p>Egypt, Asswan</p>
            </div>
            </div>

            <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
                <i class="fas fa-envelope"></i>
                <h3>@lang('site.email')</h3>
                <p>abdoshokrey68@gmail.com</p>
            </div>
            </div>

            <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
                <i class="fas fa-phone"></i>
                <h3>@lang('site.call')</h3>
                <p>+20-1129899520</p>
            </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6 ">
                    <div class="gmap_canvas">
                        <iframe style="width: 100%" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=asswan,&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://yt2.org/youtube-to-mp3-ALeKk00qEW0sxByTDSpzaRvl8WxdMAeMytQ1611842368056QMMlSYKLwAsWUsAfLipqwCA2ahUKEwiikKDe5L7uAhVFCuwKHUuFBoYQ8tMDegUAQCSAQCYAQCqAQdnd3Mtd2l6"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:696px;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
                    </div>
            </div>

            <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                </div>
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
            </div>

        </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

@include('layouts.footer')
@endsection
