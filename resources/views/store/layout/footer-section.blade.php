<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <contact-us store_id="{{$store_id}}" />
</section><!-- End Contact Section -->


<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-top"  style='background-image: url("{{ URL::asset('img/front/footer-bg.png')}}")'>
        <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{route('store.index', $store_id)}}" class="logo d-flex align-items-center">
                <span>
                    <i class="fas fa-store mr-2 ml-2" style="font-size:25px"></i>
                    {{$store->name}}
                </span>
            </a>
            <p> {{$store->des}} </p>
            <div class="social-links mt-3">
                @if ($store->twitter)
                    <a href="{{$store->twitter}}" target="__blank" class="twitter"><i class="fab fa-twitter"></i></a>
                @endif
                @if ($store->facebook)
                    <a href="{{$store->facebook}}" target="__blank" class="facebook"><i class="fab fa-facebook"></i></a>
                @endif
                @if ($store->instagram)
                    <a href="{{$store->instagram}}" target="__blank" class="instagram"><i class="fab fa-instagram bx bxl-instagram"></i></a>
                @endif
                @if ($store->linkedin)
                    <a href="{{$store->linkedin}}" target="__blank" class="linkedin"><i class="fab fa-linkedin bx bxl-linkedin"></i></a>
                @endif
            </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
            <h4>@lang('site.use_links')</h4>
            <ul>
                <li><i class="fas fa-chevron-right"></i> <a href="{{route('store.index', $store->id)}}">@lang('site.home')</a></li>
                {{-- <li><i class="fas fa-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
            </ul>
            </div>

            {{-- <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
                <ul>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Web Design</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Web Development</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Product Management</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Marketing</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Graphic Design</a></li>
                </ul>
            </div> --}}

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4> @lang('site.contact') </h4>
            <p>
                {{$store->address}}
                <br>
                <strong>@lang('site.phone') :</strong> {{$store->phone}} <br>
                <strong> @lang('site.email') :</strong>  {{$store->email}} <br>
            </p>

            </div>

        </div>
        </div>
    </div>

<div class="container">
    <div class="copyright">
    &copy; Copyright <a href="{{route('home')}}"> <strong>X-Dealer</strong> </a> . All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="{{route('home')}}"> <strong>X-Dealer</strong> </a>
    </div>
</div>
</footer><!-- End Footer -->

</div>


