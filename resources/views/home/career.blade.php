@extends('layouts.app')

@section('content')
<!-- ======= Hero Section ======= -->

<main id="main">

        <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
        <ol>
            <li><a href="{{route('home')}}">@lang('site.home')</a></li>
            <li> @lang('site.career')</li>
        </ol>
        <h2 class="mt-3"> <i class="fas fa-briefcase"></i> @lang('site.career')</h2>
        </div>
    </section><!-- End Breadcrumbs -->


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
                <home-careers locale="{{app()->getlocale()}}" />
            </section>


</main><!-- End #main -->

@include('layouts.footer')
@endsection
