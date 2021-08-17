@extends('layouts.app')

@section('content')
<!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background: {{URL::asset('img/home/slide/slide-1.jpg')}}">
                        <img src="{{URL::asset('img/home/slide/slide-1.jpg')}}" alt="">
                        <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"> <span>@lang('site.welcome') </span></h2>
                            <h5 class="animate__animated animate__fadeInUp">@lang('site.best_co')</h5>
                            <a href="{{route('addstore')}}" class="btn-get-started animate__animated animate__fadeInUp"> @lang('site.start_now') </a>
                        </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background: {{URL::asset('img/home/slide/slide-2.jpg')}}">
                        <img src="{{URL::asset('img/home/slide/slide-2.jpg')}}" alt="">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated fanimate__adeInDown"><span>@lang('site.design_w')</span></h2>
                                <h5 class="animate__animated animate__fadeInUp">@lang('site.create_web')</h5>
                                <a href="{{route('addstore')}}" class="btn-get-started animate__animated animate__fadeInUp"> @lang('site.start_now') </a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background: {{URL::asset('img/home/slide/slide-3.jpg')}}">
                        <img src="{{URL::asset('img/home/slide/slide-3.jpg')}}" alt="">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>@lang('site.upgrade_project')</span></h2>
                                <h5 class="animate__animated animate__fadeInUp">@lang('site.start_develop')</h5>
                                <a href="{{route('addstore')}}" class="btn-get-started animate__animated animate__fadeInUp"> @lang('site.start_now') </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon fas fa-chevron-left fa-2x" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon fas fa-chevron-right fa-2x" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Featured Section ======= -->
        <section id="featured" class="featured">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon-box">
                        <i class="fas fa-pencil-ruler"></i>
                        <h3><a href="#"> @lang('site.wdesign')</a></h3>
                        <p> @lang('site.wdesign_des') </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                        <i class="fas fa-bullhorn"></i>
                        <h3><a href="#"> @lang('site.emarketing')</a></h3>
                        <p> @lang('site.emarketing_des') </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                        <i class="fas fa-headset"></i>
                        <h3><a href="#"> @lang('site.tsupport')</a></h3>
                        <p> @lang('site.tsupport_des') </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Featured Section -->

        <section>
            <home-stores locale="{{app()->getlocale()}}" />
        </section>

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
                {{-- <div class="container">
                    <div class="row">
                        <div class="col-md-3 blog" id="blog">
                            <div class="sidebar">
                                <h3 class="sidebar-title">@lang('site.search')</h3>
                                <div class="sidebar-item search-form">
                                    <div data-vist="{{route('search_stores')}}">
                                        <input list="searchs" class="form-control" name="search" id="search" placeholder="@lang('site.search') ..." class="form-control dynamic">
                                        <datalist id="searchs"></datalist>
                                    </div>
                                </div><!-- End sidebar search formn-->

                                <div class="sidebar-item categories">
                                    <h3 class="sidebar-title">Categories</h3>
                                    <ul>
                                    <li><a href="#">General <span>(25)</span></a></li>
                                    <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                    <li><a href="#">Travel <span>(5)</span></a></li>
                                    <li><a href="#">Design <span>(22)</span></a></li>
                                    <li><a href="#">Creative <span>(8)</span></a></li>
                                    <li><a href="#">Educaion <span>(14)</span></a></li>
                                    </ul>
                                </div>
                                <!-- End sidebar categories-->

                                <div class="sidebar-item recent-posts">
                                    <div class="post-item clearfix">
                                    <img src="{{URL::asset('img/home/blog/blog-recent-2.jpg')}}" alt="">
                                    <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>

                                    <div class="post-item clearfix">
                                    <img src="{{URL::asset('img/home/blog/blog-recent-3.jpg')}}" alt="">
                                    <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>

                                    <div class="post-item clearfix">
                                    <img src="{{URL::asset('img/home/blog/blog-recent-4.jpg')}}" alt="">
                                    <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>

                                    <div class="post-item clearfix">
                                    <img src="{{URL::asset('img/home/blog/blog-recent-5.jpg')}}" alt="">
                                    <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>

                                </div>
                                <!-- End sidebar recent posts-->

                                <div class="sidebar-item tags">
                                    <h3 class="sidebar-title">Tags</h3>
                                    <ul>
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">IT</a></li>
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Mac</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Office</a></li>
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">Studio</a></li>
                                        <li><a href="#">Smart</a></li>
                                        <li><a href="#">Tips</a></li>
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div>
                                <!-- End sidebar tags-->
                            </div><!-- End sidebar -->

                        </div> <!-- End blog sidebar -->
                        <div class="col-md-9 stores-box">
                            <h1 class="col-md-6"> @lang('site.business') </h1>
                            <h5 class="mb-2 h4 searchvalue" id="searchvalue">  </h5>
                            <hr>
                            <br>
                            <div class="row" id="all-stores">
                                @foreach ($stores as $store)
                                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch my-store">
                                        <div class="icon-box col-md-12 p-0">
                                            <div class="" style="height: 200px">
                                                <a href="{{route('store.index',$store->id)}}" target="_blank">
                                                    @if($store->image)
                                                    <img src="{{URL::asset('img/stores/'.$store->image)}}" alt="">
                                                    @else
                                                    <img src="{{URL::asset('img/stores/default.png')}}" alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <h4 class="mt-3">
                                                <a href="{{route('store.index',$store->id)}}" target="_blank" class="h5">
                                                    <div class="col-md-12">
                                                        {{$store->name}}
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div> --}}
        </section><!-- End Services Section -->

        <!-- ======= Clients Section ======= -->
        {{-- <section id="clients" class="clients">
            <div class="container">

                <div class="section-title">
                <h2>Clients</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="clients-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-1.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-2.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-3.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-4.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-5.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-6.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-7.png')}}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{URL::asset('img/home/clients/client-8.png')}}" class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section> --}}
        <!-- End Clients Section -->

    </main><!-- End #main -->
@include('layouts.footer')
@endsection
