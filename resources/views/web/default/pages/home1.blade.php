
@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
@endpush

@section('content')

@if(!empty($heroSectionData))

@if(!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == "1")
@push('scripts_bottom')
<script src="/assets/default/vendors/lottie/lottie-player.js"></script>
@endpush
@endif
{{-- BANNER --}}
{{-- <section class="slider-container"  style="background-image: url('/assets/default/img/home/world.png')" >

    <!-- @if($heroSection == "1")
    @if(!empty($heroSectionData['is_video_background']))
    <video playsinline autoplay muted loop id="homeHeroVideoBackground" class="img-cover">
        <source src="{{ $heroSectionData['hero_background'] }}" type="video/mp4">
    </video>
    @endif

    <div class="mask"></div>
    @endif -->

    <!-- <div class="container">
        <div class="row">
            <div class="col-6">
                <button id="free-trial">GET STARTED WITH FREE TRIAL</button>
            </div>
            <div class="col-6"></div>
        </div>
    </div> -->
    <div class="container-fluid">
        <button id="free-trial">GET STARTED WITH FREE TRIAL</button>
    </div>

    <!-- <div class="container user-select-none">

                @if($heroSection == "2")
                    <div class="row slider-content align-items-center hero-section2 flex-column-reverse flex-md-row">
                        <div class="col-12 col-md-7 col-lg-6">
                            <h1 class="text-secondary font-weight-bold">{{ $heroSectionData['title'] }}</h1>
                            <p class="slide-hint text-gray mt-20">{!! nl2br($heroSectionData['description']) !!}</p>

                            <form action="/search" method="get" class="d-inline-flex mt-30 mt-lg-30 w-100">
                                <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100">
                                    <input type="text" name="search" class="form-control border-0 mr-lg-50" placeholder="{{ trans('home.slider_search_placeholder') }}"/>
                                    <button type="submit" class="btn btn-primary rounded-pill">{{ trans('home.find') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-5 col-lg-6">
                            @if(!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == "1")
                                <lottie-player src="{{ $heroSectionData['hero_vector'] }}" background="transparent" speed="1" class="w-100" loop autoplay></lottie-player>
                            @else
                                <img src="{{ $heroSectionData['hero_vector'] }}" alt="{{ $heroSectionData['title'] }}" class="img-cover">
                            @endif
                        </div>
                    </div>
                @else
                    <div class="text-center slider-content">
                        <h1>{{ $heroSectionData['title'] }}</h1>
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-12 col-md-9 col-lg-7">
                                <p class="mt-30 slide-hint">{!! nl2br($heroSectionData['description']) !!}</p>

                                <form action="/search" method="get" class="d-inline-flex mt-30 mt-lg-50 w-100">
                                    <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100">
                                        <input type="text" name="search" class="form-control border-0 mr-lg-50" placeholder="{{ trans('home.slider_search_placeholder') }}"/>
                                        <button type="submit" class="btn btn-primary rounded-pill">{{ trans('home.find') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div> -->
</section> --}}
<div class="image-slider-banner">
    <div class="slider-item">
        <div class="image">
            <img src="/assets/default/img/home/hero.jpg" alt="">
        </div>
    </div>
    <div class="slider-item">
        <div class="image">
            <img src="/assets/default/img/home/dongian.jpg" alt="">
        </div>
    </div>
</div>
@endif

<!-- Search -->
<div class="container search-mjj">
    <div class="d-flex logo-home-mj" >
        <a class="navbar-brand navbar-order d-flex align-items-center justify-content-center" href="/">
            @if(!empty($generalSettings['logo']))
           <img style="width: 90%" src="{{ $generalSettings['logo'] }}" class="img-cover" alt="site logo">
           @endif
       </a>
    </div>
    <form action="/search" method="get" class="d-inline-flex m-lg-40 w-100">
        <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100 form-group-mj">
            <input type="text" name="search" class="form-control rounded-pill p-30" placeholder="{{ trans('home.slider_search_placeholder') }}" style="box-shadow: 0px 8px 16px 0px rgba(0, 6, 36, 0.12), 0px 3px 32px 0px rgba(0, 6, 36, 0.12);"/>
            <button type="submit" class="btn rounded-pill">{{ trans('home.find') }}</button>
        </div>
    </form>
    <div class="slider">
        <div class="btn-in-search search-slick">
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Digital+Marketing">Digital marketing</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Economics">Economics</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=GLOBAL+BUSINESS">Global Business</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Economics+-+Finance">Econ fin</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Prof-com">Prof com</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Fashion+Enterprise">Fashion Enterprise</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=MANAGEMENT">Management & Change</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Digital+Marketing">Digital marketing</a>
            </div>
            <div class="content-searche-mj">
                <a style="font-family: 'Inter', sans-serif;" href="/classes?schoolOptions%5B%5D=Economics">Economics</a>
            </div>
        </div>
    </div>
</div>

</div>
{{-- Marketingggg --}}
<section class="container contentt-mj">
    <div class="caption-contentt">
       <div class="content-mjx">
        <h3 class="title outlines-title">
            Digital Marketing
        </h3>
        <p style="margin-top: 16px;">
            Make a progress towards high scores by starting with the highest-voted outlines
        </p>
       </div>
       <div class="view-all">
        <a href="/classes?schoolOptions%5B%5D=Digital+Marketing">View all</a>
        <a href="/classes?schoolOptions%5B%5D=Digital+Marketing"><i class='bx bx-right-arrow-alt'></i></a>
        
       </div>
    </div>
    <div class="mt-10 position-relative">
        <div class="swiper-container best-rates-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($webinarMarketing as $bestRateWebinar)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $bestRateWebinar])
                </div>
                @endforeach
            </div>
        </div>

        <!-- <div class="d-flex justify-content-center">
            <div class="swiper-pagination best-rates-webinars-swiper-pagination"></div>
        </div> -->
    </div>
</section>

{{-- Economics - Finance --}}

{{--  --}}
<section class="container contentt-mj">
    <div class="caption-contentt">
       <div class="content-mjx">
        <h3 class="title outlines-title">
            Economics - Finance
        </h3>
        <p style="margin-top: 16px;">
            Make a progress towards high scores by starting with the highest-voted outlines
        </p>
       </div>
       <div class="view-all">
        <a href="/classes?schoolOptions%5B%5D=Economics+-+Finance">View all</a>
        <a href="/classes?schoolOptions%5B%5D=Economics+-+Finance"><i class='bx bx-right-arrow-alt'></i></a>
        
       </div>
    </div>
    <div class="mt-10 position-relative">
        <div class="swiper-container best-rates-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($webinarEf as $bestRateWebinar)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $bestRateWebinar])
                </div>
                @endforeach
            </div>
        </div>

        <!-- <div class="d-flex justify-content-center">
            <div class="swiper-pagination best-rates-webinars-swiper-pagination"></div>
        </div> -->
    </div>
</section>

{{--  Prof-com --}}

<section class="container contentt-mj">
    <div class="caption-contentt">
       <div class="content-mjx">
        <h3 class="title outlines-title">
            Prof-com
        </h3>
        <p style="margin-top: 16px;">
            Make a progress towards high scores by starting with the highest-voted outlines
        </p>
       </div>
       <div class="view-all">
        <a href="/classes?schoolOptions%5B%5D=Prof-com">View all</a>
        <a href="/classes?schoolOptions%5B%5D=Prof-com"><i class='bx bx-right-arrow-alt'></i></a>
        
       </div>
    </div>
    <div class="mt-10 position-relative">
        <div class="swiper-container best-rates-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($webinarEc as $webinar)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $webinar])
                </div>
                @endforeach
            </div>
        </div>

        <!-- <div class="d-flex justify-content-center">
            <div class="swiper-pagination best-rates-webinars-swiper-pagination"></div>
        </div> -->
    </div>
</section>

{{-- Statistics --}}
{{-- @include('web.default.pages.includes.home_statistics') --}}

@foreach($homeSections as $homeSection)

<!-- @if($homeSection->name == \App\Models\HomeSection::$featured_classes and !empty($featureWebinars) and !$featureWebinars->isEmpty())
<section class="home-sections home-sections-swiper container">
    <div class="px-20 px-md-0">
        <h2 class="section-title">{{ trans('home.featured_classes') }}</h2>
        <p class="section-hint">{{ trans('home.featured_classes_hint') }}</p>
    </div>

    <div class="feature-slider-container position-relative d-flex justify-content-center mt-10">
        <div class="swiper-container features-swiper-container pb-25">
            <div class="swiper-wrapper py-10">
                @foreach($featureWebinars as $feature)
                <div class="swiper-slide">

                    <a href="{{ $feature->webinar->getUrl() }}">
                        <div class="feature-slider d-flex h-100" style="background-image: url('{{ $feature->webinar->getImage() }}')">
                            <div class="mask"></div>
                            <div class="p-5 p-md-25 feature-slider-card">
                                <div class="d-flex flex-column feature-slider-body position-relative h-100">
                                    @if($feature->webinar->bestTicket() < $feature->webinar->price)
                                        <span class="badge badge-danger mb-2 ">{{ trans('public.offer',['off' => $feature->webinar->bestTicket(true)['percent']]) }}</span>
                                        @endif
                                        <a href="{{ $feature->webinar->getUrl() }}">
                                            <h3 class="card-title mt-1">{{ $feature->webinar->title }}</h3>
                                        </a>

                                        <div class="user-inline-avatar mt-15 d-flex align-items-center">
                                            <div class="avatar bg-gray200">
                                                <img src="{{ $feature->webinar->teacher->getAvatar() }}" class="img-cover" alt="{{ $feature->webinar->teacher->full_naem }}">
                                            </div>
                                            <a href="{{ $feature->webinar->teacher->getProfileUrl() }}" target="_blank" class="user-name font-14 ml-5">{{ $feature->webinar->teacher->full_name }}</a>
                                        </div>

                                        <p class="mt-25 feature-desc text-gray">{{ $feature->description }}</p>

                                        @include('web.default.includes.webinar.rate',['rate' => $feature->webinar->getRate()])

                                        <div class="feature-footer mt-auto d-flex align-items-center justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                                                    <span class="duration ml-5 text-dark-blue font-14">{{ convertMinutesToHourAndMinute($feature->webinar->duration) }} {{ trans('home.hours') }}</span>
                                                </div>

                                                <div class="vertical-line mx-10"></div>

                                                <div class="d-flex align-items-center">
                                                    <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
                                                    <span class="date-published ml-5 text-dark-blue font-14">{{ dateTimeFormat(!empty($feature->webinar->start_date) ? $feature->webinar->start_date : $feature->webinar->created_at,'j M Y') }}</span>
                                                </div>
                                            </div>

                                            <div class="feature-price-box">
                                                @if(!empty($feature->webinar->price ) and $feature->webinar->price > 0)
                                                @if($feature->webinar->bestTicket() < $feature->webinar->price)
                                                    <span class="real">{{ handlePrice($feature->webinar->bestTicket(), true, true, false, null, true) }}</span>
                                                    @else
                                                    {{ handlePrice($feature->webinar->price, true, true, false, null, true) }}
                                                    @endif
                                                    @else
                                                    {{ trans('public.free') }}
                                                    @endif
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="swiper-pagination features-swiper-pagination"></div>
    </div>
</section>
@endif -->

{{-- @if($homeSection->name == \App\Models\HomeSection::$featured_classes and !empty($featureWebinars) and !$featureWebinars->isEmpty())
<section class="home-sections home-sections-swiper container">
    <div class="px-20 px-md-0 text-center">
        <h2 class="section-title">JUMPSTART YOUR SUCCESS</h2>
        <h2 class="section-title">FOR THE UPCOMING ASSIGNMENT</h2>
    </div>

    <div class="mt-10 position-relative">
        <div class="swiper-container btns-swiper px-12">
            <div class="swiper-wrapper py-20">
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Digital Marketing</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Professional Communication</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Digital Film and Video</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Economics - Finance</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Fashion Enterprise</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Logistics & Supply Chain</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Business Foundations</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Digital Marketing</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Professional Communication</a>
                </div>
                <div class="swiper-slide d-flex justify-content-left align-items-center">
                    <a>Digital Film and Video</a>
                </div>
            </div>
        </div>

        <!-- <div class="d-flex justify-content-center">
            <div class="swiper-pagination btns-swiper-pagination"></div>
        </div> -->
    </div>
</section>
@endif --}}

@if($homeSection->name == \App\Models\HomeSection::$latest_bundles and !empty($latestBundles) and !$latestBundles->isEmpty())
<section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between ">
        <div>
            <h2 class="section-title">{{ trans('update.latest_bundles') }}</h2>
            <p class="section-hint">{{ trans('update.latest_bundles_hint') }}</p>
        </div>

        <a href="/classes?type[]=bundle" class="btn btn-border-white">{{ trans('home.view_all') }}</a>
    </div>

    <div class="mt-10 position-relative">
        <div class="swiper-container latest-bundle-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($latestBundles as $latestBundle)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $latestBundle])
                </div>
                @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination bundle-webinars-swiper-pagination"></div>
        </div>
    </div>
</section>

@endif

{{-- Upcoming Course --}}
@if($homeSection->name == \App\Models\HomeSection::$upcoming_courses and !empty($upcomingCourses) and !$upcomingCourses->isEmpty())
<section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between ">
        <div>
            <h2 class="section-title">{{ trans('update.upcoming_courses') }}</h2>
            <p class="section-hint">{{ trans('update.upcoming_courses_home_section_hint') }}</p>
        </div>

        <a href="/upcoming_courses?sort=newest" class="btn btn-border-white">{{ trans('home.view_all') }}</a>
    </div>

    <div class="mt-10 position-relative">
        <div class="swiper-container upcoming-courses-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($upcomingCourses as $upcomingCourse)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.upcoming_course_grid_card',['upcomingCourse' => $upcomingCourse])
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination upcoming-courses-swiper-pagination"></div>
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$latest_classes and !empty($latestWebinars) and !$latestWebinars->isEmpty())
<!-- <section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between ">
        <div>
            <h2 class="section-title">{{ trans('home.latest_classes') }}</h2>
            <p class="section-hint">{{ trans('home.latest_webinars_hint') }}</p>
        </div>

        <a href="/classes?sort=newest" class="btn btn-border-white">{{ trans('home.view_all') }}</a>
    </div>

    <div class="mt-10 position-relative">
        <div class="swiper-container latest-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($latestWebinars as $latestWebinar)
                <div class="swiper-slide">
                    {{-- @include('web.default.includes.webinar.grid-card',['webinar' => $latestWebinar]) --}}
                </div>
                @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination latest-webinars-swiper-pagination"></div>
        </div>
    </div>
</section> -->

{{-- <section class="container">
    <div class="category-item" data-category="Digital Marketing">
        <h1 class="title category-item-title">
            DIGITAL MARKETING COMMUNICATION
        </h1>
        <p class="text-justify">
            This is a group assignment. In this assessment, students work in teams
            of six members maximum. Your task is to design an integrated marketing
            communication campaign (with a focus on online components in harmony
            with offline components) for a selected brand. For this assignment,
            each team will submit a PowerPoint slide deck (50 slides maximum,
            including cover slide, task allocation and references) on
            Canvas/Turnitin.
        </p>
        <div class="d-flex justify-content-between align-items-center info-container">
            <div class="info">
                <div class="info-item">
                    <div class="d-flex">
                        <img src="/assets/default/img/home/avatar.png" alt="" />
                        <p>
                            “Big thanks to the homework helper app for Digital Marketing!
                            Your insights and guidance have been invaluable. You've turned
                            what seemed like a digital marketing maze into a clear path of
                            success. Grateful for the support!”
                        </p>
                    </div>
                    <span class="author d-flex justify-content-end">-Ariana-</span>
                </div>
                <div class="info-item">
                    <div class="d-flex">
                        <img src="/assets/default/img/home/avatar.png" alt="" />
                        <p>
                            “Big thanks to the homework helper app for Digital Marketing!
                            Your insights and guidance have been invaluable. You've turned
                            what seemed like a digital marketing maze into a clear path of
                            success. Grateful for the support!”
                        </p>
                    </div>
                    <span class="author d-flex justify-content-end">-Ariana-</span>
                </div>
            </div>
            <div> --}}
                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="assignment carousel-inner active">
                        <img src="asset/images.png" alt="" />
                        <div class="assignment-item">
                            <h2 class="title">Assignment 3: Individual Essay</h2>
                            <h4 class="title text-capitalize name-school">
                                RMIT University
                            </h4>
                            <p class="desc">
                                Structure and guidance: As well as an Introduction and
                                Conclusion, you need to include the following sections in
                                the main body of your essay: 1. Define your terms: What is
                                CSR? What is Corporate Social Irresponsibility? …
                            </p>
                            <span class="d-flex justify-content-end">See full outline <span></span></span>
                        </div>
                    </div>
                    <div class="assignment carousel-inner">
                        <img src="asset/images.png" alt="" />
                        <div class="assignment-item">
                            <h2 class="title">Assignment 3: Individual Essay</h2>
                            <h4 class="title text-capitalize name-school">
                                RMIT University
                            </h4>
                            <p class="desc">
                                Structure and guidance: As well as an Introduction and
                                Conclusion, you need to include the following sections in
                                the main body of your essay: 1. Define your terms: What is
                                CSR? What is Corporate Social Irresponsibility? …
                            </p>
                            <span class="d-flex justify-content-end">See full outline <span></span></span>
                        </div>
                    </div>
                </div> -->
                {{--================================== Slider ============================--}}
                {{-- <div class="feature-slider-container position-relative d-flex justify-content-center mt-10 ">
                    <div class="swiper-container features-swiper-container pb-25">
                        <div class="swiper-wrapper py-10 bestRateWebinars-mj" style=""> --}}
                            {{-- @foreach($featureWebinars as $feature)
                            <div class="swiper-slide">

                                <a href="{{ $feature->webinar->getUrl() }}">
                                    <div class="feature-slider d-flex h-100" style="background-image: url('{{ $feature->webinar->getImage() }}');">
                                        <div class="mask"></div>
                                        <div class="p-5 p-md-25 feature-slider-card">
                                            <div class="d-flex flex-column feature-slider-body position-relative h-100">
                                                @if($feature->webinar->bestTicket() < $feature->webinar->price)
                                                    <span class="badge badge-danger mb-2 ">{{ trans('public.offer',['off' => $feature->webinar->bestTicket(true)['percent']]) }}</span>
                                                    @endif
                                                    <a href="{{ $feature->webinar->getUrl() }}">
                                                        <h3 class="card-title mt-1">{{ $feature->webinar->title }}</h3>
                                                    </a>

                                                    <div class="user-inline-avatar mt-15 d-flex align-items-center">
                                                        <div class="avatar bg-gray200">
                                                            <img src="{{ $feature->webinar->teacher->getAvatar() }}" class="img-cover" alt="{{ $feature->webinar->teacher->full_naem }}">
                                                        </div>
                                                        <a href="{{ $feature->webinar->teacher->getProfileUrl() }}" target="_blank" class="user-name font-14 ml-5">{{ $feature->webinar->teacher->full_name }}</a>
                                                    </div>

                                                    <p class="mt-25 feature-desc text-gray">{{ $feature->description }}</p>

                                                    @include('web.default.includes.webinar.rate',['rate' => $feature->webinar->getRate()])

                                                    <div class="feature-footer mt-auto d-flex align-items-center justify-content-between">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                                                                <span class="duration ml-5 text-dark-blue font-14">{{ convertMinutesToHourAndMinute($feature->webinar->duration) }} {{ trans('home.hours') }}</span>
                                                            </div>

                                                            <div class="vertical-line mx-10"></div>

                                                            <div class="d-flex align-items-center">
                                                                <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
                                                                <span class="date-published ml-5 text-dark-blue font-14">{{ dateTimeFormat(!empty($feature->webinar->start_date) ? $feature->webinar->start_date : $feature->webinar->created_at,'j M Y') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="feature-price-box">
                                                            @if(!empty($feature->webinar->price ) and $feature->webinar->price > 0)
                                                            @if($feature->webinar->bestTicket() < $feature->webinar->price)
                                                                <span class="real">{{ handlePrice($feature->webinar->bestTicket(), true, true, false, null, true) }}</span>
                                                                @else
                                                                {{ handlePrice($feature->webinar->price, true, true, false, null, true) }}
                                                                @endif
                                                                @else
                                                                {{ trans('public.free') }}
                                                                @endif


                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach --}}
                            {{-- @foreach($bestRateWebinars as $bestRateWebinar)

                            <div class="swiper-slide">
                                @include('web.default.includes.webinar.grid-card1',['webinar' => $bestRateWebinar])
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-pagination features-swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- <div class="category-item d-none" data-category="Professional Communication">
        <h1 class="title category-item-title">Professional Communication</h1>
        <p class="text-justify">
            This is a group assignment. In this assessment, students work in teams
            of six members maximum. Your task is to design an integrated marketing
            communication campaign (with a focus on online components in harmony
            with offline components) for a selected brand. For this assignment,
            each team will submit a PowerPoint slide deck (50 slides maximum,
            including cover slide, task allocation and references) on
            Canvas/Turnitin.
        </p>
        <div class="d-flex">
            <div class="info">
                <div class="info-item">
                    <div class="d-flex">
                        <img src="asset/avatar.png" alt="" />
                        <p>
                            “Big thanks to the homework helper app for Digital Marketing!
                            Your insights and guidance have been invaluable. You've turned
                            what seemed like a digital marketing maze into a clear path of
                            success. Grateful for the support!”
                        </p>
                    </div>
                    <span class="author d-flex justify-content-end">-Ariana-</span>
                </div>
                <div class="info-item">
                    <div class="d-flex">
                        <img src="asset/avatar.png" alt="" />
                        <p>
                            “Big thanks to the homework helper app for Digital Marketing!
                            Your insights and guidance have been invaluable. You've turned
                            what seemed like a digital marketing maze into a clear path of
                            success. Grateful for the support!”
                        </p>
                    </div>
                    <span class="author d-flex justify-content-end">-Ariana-</span>
                </div>
            </div>
            <div>
                <div class="assignment">
                    <img src="asset/images.png" alt="" />
                    <div class="assignment-item">
                        <h2 class="title">Assignment 3: Individual Essay</h2>
                        <h4 class="title text-capitalize name-school">
                            RMIT University
                        </h4>
                        <p class="desc">
                            Structure and guidance: As well as an Introduction and
                            Conclusion, you need to include the following sections in the
                            main body of your essay: 1. Define your terms: What is CSR?
                            What is Corporate Social Irresponsibility? …
                        </p>
                        <span class="d-flex justify-content-end">See full outline <span></span></span>
                    </div>
                </div>
                <div class="btn-slide d-flex justify-content-center">
                    <span class="d-block active"></span>
                    <span class="d-block"></span>
                    <span class="d-block"></span>
                    <span class="d-block"></span>
                </div>
            </div>
        </div>
    </div> -->
{{-- </section> --}}

{{-- <aside class="free d-flex justify-content-between">
    <h1 class="text-uppercase">Pricing starts at $2 per outline</h1>
    <button>
        <p class="text-uppercase">Sign up for free trial</p>
    </button>
</aside> --}}

@endif

@if($homeSection->name == \App\Models\HomeSection::$best_rates and !empty($bestRateWebinars) and !$bestRateWebinars->isEmpty())

{{-- <h3 class="title text-center outlines-title">
    Search for outlines that fit your major
</h3> --}}
{{-- <section class="container outlines-btn">
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/corporate.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>

    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/bullhorn.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Digital Marketing</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/social-ad-reach.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">
                Professional Communication
            </p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/benefits.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/logistics.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/people.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-cente outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/statistics.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/management.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/blockchain.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/film-strip.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/dress.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
</section> --}}


{{-- <section class="container contentt-mj">
    <div class="caption-contentt">
       <div class="content-mjx">
        <h3 class="title outlines-title">
            Digital Marketing
        </h3>
        <p style="margin-top: 16px;">
            Make a progress towards high scores by starting with the highest-voted outlines
        </p>
       </div>
       <div class="view-all">
        <a href="/classes?schoolOptions%5B%5D=Digital+Marketing">View all</a>
        <i class='bx bx-right-arrow-alt'></i>
       </div>
    </div>
    <div class="mt-10 position-relative">
        <div class="swiper-container best-rates-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($webinars as $bestRateWebinar)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $bestRateWebinar])
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination best-rates-webinars-swiper-pagination"></div>
        </div>
    </div>
</section> --}}
@endif

@if($homeSection->name == \App\Models\HomeSection::$best_rates and !empty($bestRateWebinars) and !$bestRateWebinars->isEmpty())

{{-- <h3 class="title text-center outlines-title">
    Search for outlines that fit your major
</h3> --}}
{{-- <section class="container outlines-btn">
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/corporate.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>

    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/bullhorn.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Digital Marketing</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/social-ad-reach.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">
                Professional Communication
            </p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/benefits.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/logistics.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/people.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-cente outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/statistics.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/management.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/blockchain.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/film-strip.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/dress.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
</section> --}}


{{-- <section class="container contentt-mj">
    <div class="caption-contentt">
       <div class="content-mjx">
        <h3 class="title outlines-title">
            Professional Communication
        </h3>
        <p style="margin-top: 16px;">
            Make a progress towards high scores by starting with the highest-voted outlines
        </p>
       </div>
       <div class="view-all">
        <a href="/classes?schoolOptions%5B%5D=Professional+Communication">View all</a>
        <i class='bx bx-right-arrow-alt'></i>
       </div>
    </div>
    <div class="mt-10 position-relative">
        <div class="swiper-container best-rates-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($webinars as $bestRateWebinar)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $bestRateWebinar])
                </div>
                @endforeach
            </div>
        </div>

         <div class="d-flex justify-content-center">
            <div class="swiper-pagination best-rates-webinars-swiper-pagination"></div>
        </div>
    </div>
</section> --}}
@endif
@if($homeSection->name == \App\Models\HomeSection::$best_rates and !empty($bestRateWebinars) and !$bestRateWebinars->isEmpty())

{{-- <h3 class="title text-center outlines-title">
    Search for outlines that fit your major
</h3> --}}
{{-- <section class="container outlines-btn">
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/corporate.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>

    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/bullhorn.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Digital Marketing</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/social-ad-reach.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">
                Professional Communication
            </p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/benefits.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/logistics.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/people.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-cente outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/statistics.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/management.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/blockchain.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3 pr-4">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/film-strip.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-light d-flex align-items-center outlines-btn-item">
            <div class="bg-white d-flex align-items-center justify-content-center icon">
                <img src="/assets/default/img/home/dress.jpg" alt="" />
            </div>
            <p class="d-flex align-items-center title">Business Foundation</p>
        </div>
    </div>
</section> --}}


{{-- <section class="container contentt-mj">
    <div class="caption-contentt">
       <div class="content-mjx">
        <h3 class="title outlines-title">
            Economics
        </h3>
        <p style="margin-top: 16px;">
            Make a progress towards high scores by starting with the highest-voted outlines
        </p>
       </div>
       <div class="view-all">
        <a href="/classes?schoolOptions%5B%5D=Economics">View all</a>
        <i class='bx bx-right-arrow-alt'></i>
       </div>
    </div>
    <div class="mt-10 position-relative">
        <div class="swiper-container best-rates-webinars-swiper px-12">
            <div class="swiper-wrapper py-20">
                @foreach($webinars as $webinar)
                <div class="swiper-slide">
                    @include('web.default.includes.webinar.grid-card',['webinar' => $webinar])
                </div>
                @endforeach
            </div>
        </div>

         <div class="d-flex justify-content-center">
            <div class="swiper-pagination best-rates-webinars-swiper-pagination"></div>
        </div>
    </div>
</section> --}}
@endif

@if($homeSection->name == \App\Models\HomeSection::$trend_categories and !empty($trendCategories) and !$trendCategories->isEmpty())
<!-- <section class="home-sections home-sections-swiper container">
        <h2 class="section-title">{{ trans('home.trending_categories') }}</h2>
        <p class="section-hint">{{ trans('home.trending_categories_hint') }}</p>


        <div class="swiper-container trend-categories-swiper px-12 mt-40">
            <div class="swiper-wrapper py-20">
                @foreach($trendCategories as $trend)
                <div class="swiper-slide">
                    <a href="{{ $trend->category->getUrl() }}">
                        <div class="trending-card d-flex flex-column align-items-center w-100">
                            <div class="trending-image d-flex align-items-center justify-content-center w-100" style="background-color: {{ $trend->color }}">
                                <div class="icon mb-3">
                                    <img src="{{ $trend->getIcon() }}" width="10" class="img-cover" alt="{{ $trend->category->title }}">
                                </div>
                            </div>

                            <div class="item-count px-10 px-lg-20 py-5 py-lg-10">{{ $trend->category->webinars_count }} {{ trans('product.course') }}</div>

                            <h3>{{ $trend->category->title }}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination trend-categories-swiper-pagination"></div>
        </div>
    </section> -->
{{-- <div id="result" class="d-flex justify-content-between container">
    <div class="d-flex justify-content-center flex-column ">
        <h2 class="title">Students' Results with SNAPS</h2>
        <p>
            <span>96%</span> of our customers said that they gained higher score
            and saved a lot of time when they use SNAPS to understand their
            assessment and come up with ideas
        </p>
    </div>
    <img src="/assets/default/img/home/girl.png" alt="" />
</div> --}}

@endif

{{-- Ads Bannaer --}}
<!-- @if($homeSection->name == \App\Models\HomeSection::$full_advertising_banner and !empty($advertisingBanners1) and count($advertisingBanners1))
    <div class="home-sections container">
        <div class="row">
            @foreach($advertisingBanners1 as $banner1)
            <div class="col-{{ $banner1->size }}">
                <a href="{{ $banner1->link }}">
                    <img src="{{ $banner1->image }}" class="img-cover rounded-sm" alt="{{ $banner1->title }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif -->
{{-- ./ Ads Bannaer --}}

@if($homeSection->name == \App\Models\HomeSection::$best_sellers and !empty($bestSaleWebinars) and !$bestSaleWebinars->isEmpty())
<!-- <section class="home-sections container">
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="section-title">{{ trans('home.best_sellers') }}</h2>
                <p class="section-hint">{{ trans('home.best_sellers_hint') }}</p>
            </div>

            <a href="/classes?sort=bestsellers" class="btn btn-border-white">{{ trans('home.view_all') }}</a>
        </div>

        <div class="mt-10 position-relative">
            <div class="swiper-container best-sales-webinars-swiper px-12">
                <div class="swiper-wrapper py-20">
                    @foreach($bestSaleWebinars as $bestSaleWebinar)
                    <div class="swiper-slide">
                        @include('web.default.includes.webinar.grid-card',['webinar' => $bestSaleWebinar])
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="swiper-pagination best-sales-webinars-swiper-pagination"></div>
            </div>
        </div>
    </section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$discount_classes and !empty($hasDiscountWebinars) and !$hasDiscountWebinars->isEmpty())
<!-- <section class="home-sections container">
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="section-title">{{ trans('home.discount_classes') }}</h2>
                <p class="section-hint">{{ trans('home.discount_classes_hint') }}</p>
            </div>

            <a href="/classes?discount=on" class="btn btn-border-white">{{ trans('home.view_all') }}</a>
        </div>

        <div class="mt-10 position-relative">
            <div class="swiper-container has-discount-webinars-swiper px-12">
                <div class="swiper-wrapper py-20">
                    @foreach($hasDiscountWebinars as $hasDiscountWebinar)
                    <div class="swiper-slide">
                        @include('web.default.includes.webinar.grid-card',['webinar' => $hasDiscountWebinar])
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="swiper-pagination has-discount-webinars-swiper-pagination"></div>
            </div>
        </div>
    </section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$free_classes and !empty($freeWebinars) and !$freeWebinars->isEmpty())
<!-- <section class="home-sections home-sections-swiper container">
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="section-title">{{ trans('home.free_classes') }}</h2>
                <p class="section-hint">{{ trans('home.free_classes_hint') }}</p>
            </div>

            <a href="/classes?free=on" class="btn btn-border-white">{{ trans('home.view_all') }}</a>
        </div>

        <div class="mt-10 position-relative">
            <div class="swiper-container free-webinars-swiper px-12">
                <div class="swiper-wrapper py-20">

                    @foreach($freeWebinars as $freeWebinar)
                    <div class="swiper-slide">
                        @include('web.default.includes.webinar.grid-card',['webinar' => $freeWebinar])
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="swiper-pagination free-webinars-swiper-pagination"></div>
            </div>
        </div>
    </section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$store_products and !empty($newProducts) and !$newProducts->isEmpty())
{{-- <section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="section-title">{{ trans('update.store_products') }}</h2>
            <p class="section-hint">{{ trans('update.store_products_hint') }}</p>
        </div>

        <a href="/products" class="btn btn-border-white">{{ trans('update.all_products') }}</a>
    </div>

    <div class="mt-10 position-relative">
        <div class="swiper-container new-products-swiper px-12">
            <div class="swiper-wrapper py-20">

                @foreach($newProducts as $newProduct)
                <div class="swiper-slide">
                    @include('web.default.products.includes.card',['product' => $newProduct])
                </div>
                @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination new-products-swiper-pagination"></div>
        </div>
    </div>
</section> --}}
@endif

@if($homeSection->name == \App\Models\HomeSection::$testimonials and !empty($testimonials) and !$testimonials->isEmpty())
{{-- <div class="position-relative home-sections testimonials-container">

    <div id="parallax1" class="ltr">
        <div data-depth="0.2" class="gradient-box left-gradient-box"></div>
    </div>

    <section class="container home-sections home-sections-swiper">
        <div class="text-center">
            <h2 class="section-title">The Community we are in</h2>
            <p class="section-hint">Over 3000 students have already joined the SNAPS Community</p>
        </div>

        <div class="position-relative">
            <div class="swiper-container testimonials-swiper px-12" style="top: -20px;">
                <div class="swiper-wrapper">

                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonials-card position-relative py-15 py-lg-30 px-10 px-lg-20 rounded-sm shadow bg-white text-center">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="testimonials-user-avatar">
                                        <img src="{{ $testimonial->user_avatar }}" alt="{{ $testimonial->user_name }}" class="img-cover rounded-circle">
                                    </div>
                                    <div class="d-flex flex-column align-items-start" style="margin-left: 12px;">
                                        <h4 class="font-16 font-weight-bold text-secondary">{{ $testimonial->user_name }}</h4>
                                        <div class="d-block font-14 text-gray">{{ $testimonial->user_bio }}</div>
                                    </div>
                                    @include('web.default.includes.webinar.rate',['rate' => $testimonial->rate, 'dontShowRate' => true])
                                </div>
                                <div>
                                    <img src="/assets/default/img/home/double.png" alt="">
                                </div>
                            </div>

                            <p class="mt-25 text-gray font-14 text-left">{!! nl2br($testimonial->comment) !!}</p>

                            <!-- <div class="bottom-gradient"></div> -->
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            <div class="d-flex justify-content-center">
                <div class="swiper-pagination testimonials-swiper-pagination"></div>
            </div>
        </div>
    </section>

    <div id="parallax2" class="ltr">
        <div data-depth="0.4" class="gradient-box right-gradient-box"></div>
    </div>

    <div id="parallax3" class="ltr">
        <div data-depth="0.8" class="gradient-box bottom-gradient-box"></div>
    </div>
</div> --}}
@endif

@if($homeSection->name == \App\Models\HomeSection::$subscribes and !empty($subscribes) and !$subscribes->isEmpty())
<div class="home-sections position-relative subscribes-container pe-none user-select-none">
    <div id="parallax4" class="ltr d-none d-md-block">
        <div data-depth="0.2" class="gradient-box left-gradient-box"></div>
    </div>

    <section class="container home-sections home-sections-swiper">
        <div class="text-center">
            <h2 class="section-title">{{ trans('home.subscribe_now') }}</h2>
            <p class="section-hint">{{ trans('home.subscribe_now_hint') }}</p>
        </div>

        <div class="position-relative mt-30">
            <div class="swiper-container subscribes-swiper px-12">
                <div class="swiper-wrapper py-20">

                    @foreach($subscribes as $subscribe)
                    @php
                    $subscribeSpecialOffer = $subscribe->activeSpecialOffer();
                    @endphp

                    <div class="swiper-slide">
                        <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-50 pb-20 px-20">
                            @if($subscribe->is_popular)
                            <span class="badge badge-primary badge-popular px-15 py-5">{{ trans('panel.popular') }}</span>
                            @elseif(!empty($subscribeSpecialOffer))
                            <span class="badge badge-danger badge-popular px-15 py-5">{{ trans('update.percent_off', ['percent' => $subscribeSpecialOffer->percent]) }}</span>
                            @endif

                            <div class="plan-icon">
                                <img src="{{ $subscribe->icon }}" class="img-cover" alt="">
                            </div>

                            <h3 class="mt-20 font-30 text-secondary">{{ $subscribe->title }}</h3>
                            <p class="font-weight-500 text-gray mt-10">{{ $subscribe->description }}</p>

                            <div class="d-flex align-items-start mt-30">
                                @if(!empty($subscribe->price) and $subscribe->price > 0)
                                @if(!empty($subscribeSpecialOffer))
                                <div class="d-flex align-items-end line-height-1">
                                    <span class="font-36 text-primary">{{ handlePrice($subscribe->getPrice(), true, true, false, null, true) }}</span>
                                    <span class="font-14 text-gray ml-5 text-decoration-line-through">{{ handlePrice($subscribe->price, true, true, false, null, true) }}</span>
                                </div>
                                @else
                                <span class="font-36 text-primary line-height-1">{{ handlePrice($subscribe->price, true, true, false, null, true) }}</span>
                                @endif
                                @else
                                <span class="font-36 text-primary line-height-1">{{ trans('public.free') }}</span>
                                @endif
                            </div>

                            <ul class="mt-20 plan-feature">
                                <li class="mt-10">{{ $subscribe->days }} {{ trans('financial.days_of_subscription') }}</li>
                                <li class="mt-10">
                                    @if($subscribe->infinite_use)
                                    {{ trans('update.unlimited') }}
                                    @else
                                    {{ $subscribe->usable_count }}
                                    @endif
                                    <span class="ml-5">{{ trans('update.subscribes') }}</span>
                                </li>
                            </ul>

                            @if(auth()->check())
                            <form action="/panel/financial/pay-subscribes" method="post" class="w-100">
                                {{ csrf_field() }}
                                <input name="amount" value="{{ $subscribe->price }}" type="hidden">
                                <input name="id" value="{{ $subscribe->id }}" type="hidden">

                                <div class="d-flex align-items-center mt-50 w-100">
                                    <button type="submit" class="btn btn-primary {{ !empty($subscribe->has_installment) ? '' : 'btn-block' }}">{{ trans('update.purchase') }}</button>

                                    @if(!empty($subscribe->has_installment))
                                    <a href="/panel/financial/subscribes/{{ $subscribe->id }}/installments" class="btn btn-outline-primary flex-grow-1 ml-10">{{ trans('update.installments') }}</a>
                                    @endif
                                </div>
                            </form>
                            @else
                            <a href="/login" class="btn btn-primary btn-block mt-50">{{ trans('update.purchase') }}</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="d-flex justify-content-center">
                <div class="swiper-pagination subscribes-swiper-pagination"></div>
            </div>

        </div>
    </section>

    <div id="parallax5" class="ltr d-none d-md-block">
        <div data-depth="0.4" class="gradient-box right-gradient-box"></div>
    </div>

    <div id="parallax6" class="ltr d-none d-md-block">
        <div data-depth="0.6" class="gradient-box bottom-gradient-box"></div>
    </div>
</div>
@endif

@if($homeSection->name == \App\Models\HomeSection::$find_instructors and !empty($findInstructorSection))
<!-- <section class="home-sections home-sections-swiper container find-instructor-section position-relative">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="">
                    <h2 class="font-36 font-weight-bold text-dark">{{ $findInstructorSection['title'] ?? '' }}</h2>
                    <p class="font-16 font-weight-normal text-gray mt-10">{{ $findInstructorSection['description'] ?? '' }}</p>

                    <div class="mt-35 d-flex align-items-center">
                        @if(!empty($findInstructorSection['button1']) and !empty($findInstructorSection['button1']['title']) and !empty($findInstructorSection['button1']['link']))
                        <a href="{{ $findInstructorSection['button1']['link'] }}" class="btn btn-primary mr-15">{{ $findInstructorSection['button1']['title'] }}</a>
                        @endif

                        @if(!empty($findInstructorSection['button2']) and !empty($findInstructorSection['button2']['title']) and !empty($findInstructorSection['button2']['link']))
                        <a href="{{ $findInstructorSection['button2']['link'] }}" class="btn btn-outline-primary">{{ $findInstructorSection['button2']['title'] }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <div class="position-relative ">
                    <img src="{{ $findInstructorSection['image'] }}" class="find-instructor-section-hero" alt="{{ $findInstructorSection['title'] }}">
                    <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle">
                    <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots">

                    <div class="example-instructor-card bg-white rounded-sm shadow-lg  p-5 p-md-15 d-flex align-items-center">
                        <div class="example-instructor-card-avatar">
                            <img src="/assets/default/img/home/toutor_finder.svg" class="img-cover rounded-circle" alt="user name">
                        </div>

                        <div class="flex-grow-1 ml-15">
                            <span class="font-14 font-weight-bold text-secondary d-block">{{ trans('update.looking_for_an_instructor') }}</span>
                            <span class="text-gray font-12 font-weight-500">{{ trans('update.find_the_best_instructor_now') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$reward_program and !empty($rewardProgramSection))
<section class="home-sections home-sections-swiper container reward-program-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="position-relative reward-program-section-hero-card">
                <img src="{{ $rewardProgramSection['image'] }}" class="reward-program-section-hero" alt="{{ $rewardProgramSection['title'] }}">

                <div class="example-reward-card bg-white rounded-sm shadow-lg p-5 p-md-15 d-flex align-items-center">
                    <div class="example-reward-card-medal">
                        <img src="/assets/default/img/rewards/medal.png" class="img-cover rounded-circle" alt="medal">
                    </div>

                    <div class="flex-grow-1 ml-15">
                        <span class="font-14 font-weight-bold text-secondary d-block">{{ trans('update.you_got_50_points') }}</span>
                        <span class="text-gray font-12 font-weight-500">{{ trans('update.for_completing_the_course') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $rewardProgramSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">{{ $rewardProgramSection['description'] ?? '' }}</p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($rewardProgramSection['button1']) and !empty($rewardProgramSection['button1']['title']) and !empty($rewardProgramSection['button1']['link']))
                    <a href="{{ $rewardProgramSection['button1']['link'] }}" class="btn btn-primary mr-15">{{ $rewardProgramSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($rewardProgramSection['button2']) and !empty($rewardProgramSection['button2']['title']) and !empty($rewardProgramSection['button2']['link']))
                    <a href="{{ $rewardProgramSection['button2']['link'] }}" class="btn btn-outline-primary">{{ $rewardProgramSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$become_instructor and !empty($becomeInstructorSection))
<section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $becomeInstructorSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">{{ $becomeInstructorSection['description'] ?? '' }}</p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($becomeInstructorSection['button1']) and !empty($becomeInstructorSection['button1']['title']) and !empty($becomeInstructorSection['button1']['link']))
                    <a href="{{ empty($authUser) ? '/login' : (($authUser->isUser()) ? $becomeInstructorSection['button1']['link'] : '/panel/financial/registration-packages') }}" class="btn btn-primary mr-15">{{ $becomeInstructorSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($becomeInstructorSection['button2']) and !empty($becomeInstructorSection['button2']['title']) and !empty($becomeInstructorSection['button2']['link']))
                    <a href="{{ empty($authUser) ? '/login' : (($authUser->isUser()) ? $becomeInstructorSection['button2']['link'] : '/panel/financial/registration-packages') }}" class="btn btn-outline-primary">{{ $becomeInstructorSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <img src="{{ $becomeInstructorSection['image'] }}" class="find-instructor-section-hero" alt="{{ $becomeInstructorSection['title'] }}">
                <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle">
                <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots">

                <div class="example-instructor-card bg-white rounded-sm shadow-lg border p-5 p-md-15 d-flex align-items-center">
                    <div class="example-instructor-card-avatar">
                        <img src="/assets/default/img/home/become_instructor.svg" class="img-cover rounded-circle" alt="user name">
                    </div>

                    <div class="flex-grow-1 ml-15">
                        <span class="font-14 font-weight-bold text-secondary d-block">{{ trans('update.become_an_instructor') }}</span>
                        <span class="text-gray font-12 font-weight-500">{{ trans('update.become_instructor_tagline') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$forum_section and !empty($forumSection))
<section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <img src="{{ $forumSection['image'] }}" class="find-instructor-section-hero" alt="{{ $forumSection['title'] }}">
                <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle">
                <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots">
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $forumSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">{{ $forumSection['description'] ?? '' }}</p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($forumSection['button1']) and !empty($forumSection['button1']['title']) and !empty($forumSection['button1']['link']))
                    <a href="{{ $forumSection['button1']['link'] }}" class="btn btn-primary mr-15">{{ $forumSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($forumSection['button2']) and !empty($forumSection['button2']['title']) and !empty($forumSection['button2']['link']))
                    <a href="{{ $forumSection['button2']['link'] }}" class="btn btn-outline-primary">{{ $forumSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$video_or_image_section and !empty($boxVideoOrImage))
<section class="home-sections home-sections-swiper position-relative">
    <div class="home-video-mask"></div>
    <div class="container home-video-container d-flex flex-column align-items-center justify-content-center position-relative" style="background-image: url('{{ $boxVideoOrImage['background'] ?? '' }}')">
        <a href="{{ $boxVideoOrImage['link'] ?? '' }}" class="home-video-play-button d-flex align-items-center justify-content-center position-relative">
            <i data-feather="play" width="36" height="36" class=""></i>
        </a>

        <div class="mt-50 pt-10 text-center">
            <h2 class="home-video-title">{{ $boxVideoOrImage['title'] ?? '' }}</h2>
            <p class="home-video-hint mt-10">{{ $boxVideoOrImage['description'] ?? '' }}</p>
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$instructors and !empty($instructors) and !$instructors->isEmpty())
<!-- <section class="home-sections container">
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="section-title">{{ trans('home.instructors') }}</h2>
                <p class="section-hint">{{ trans('home.instructors_hint') }}</p>
            </div>

            <a href="/instructors" class="btn btn-border-white">{{ trans('home.all_instructors') }}</a>
        </div>

        <div class="position-relative mt-20 ltr">
            <div class="owl-carousel customers-testimonials instructors-swiper-container">

                @foreach($instructors as $instructor)
                <div class="item">
                    <div class="shadow-effect">
                        <div class="instructors-card d-flex flex-column align-items-center justify-content-center">
                            <div class="instructors-card-avatar">
                                <img src="{{ $instructor->getAvatar(108) }}" alt="{{ $instructor->full_name }}" class="rounded-circle img-cover">
                            </div>
                            <div class="instructors-card-info mt-10 text-center">
                                <a href="{{ $instructor->getProfileUrl() }}" target="_blank">
                                    <h3 class="font-16 font-weight-bold text-dark-blue">{{ $instructor->full_name }}</h3>
                                </a>

                                <p class="font-14 text-gray mt-5">{{ $instructor->bio }}</p>
                                <div class="stars-card d-flex align-items-center justify-content-center mt-10">
                                    @php
                                    $i = 5;
                                    @endphp
                                    @while(--$i >= 5 - $instructor->rates())
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    @endwhile
                                    @while($i-- >= 0)
                                    <i data-feather="star" width="20" height="20" class=""></i>
                                    @endwhile
                                </div>

                                @if(!empty($instructor->hasMeeting()))
                                <a href="{{ $instructor->getProfileUrl() }}?tab=appointments" class="btn btn-primary btn-sm rounded-pill mt-15">{{ trans('home.reserve_a_live_class') }}</a>
                                @else
                                <a href="{{ $instructor->getProfileUrl() }}" class="btn btn-primary btn-sm rounded-pill mt-15">{{ trans('public.profile') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section> -->
@endif

{{-- Ads Bannaer --}}
@if($homeSection->name == \App\Models\HomeSection::$half_advertising_banner and !empty($advertisingBanners2) and count($advertisingBanners2))
<!-- <div class="home-sections container">
        <div class="row">
            @foreach($advertisingBanners2 as $banner2)
            <div class="col-{{ $banner2->size }}">
                <a href="{{ $banner2->link }}">
                    <img src="{{ $banner2->image }}" class="img-cover rounded-sm" alt="{{ $banner2->title }}">
                </a>
            </div>
            @endforeach
        </div>
    </div> -->
@endif
{{-- ./ Ads Bannaer --}}

@if($homeSection->name == \App\Models\HomeSection::$organizations and !empty($organizations) and !$organizations->isEmpty())
<section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="section-title">{{ trans('home.organizations') }}</h2>
            <p class="section-hint">{{ trans('home.organizations_hint') }}</p>
        </div>

        <a href="/organizations" class="btn btn-border-white">{{ trans('home.all_organizations') }}</a>
    </div>

    <div class="position-relative mt-20">
        <div class="swiper-container organization-swiper-container px-12">
            <div class="swiper-wrapper py-20">

                @foreach($organizations as $organization)
                <div class="swiper-slide">
                    <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                        <div class="home-organizations-avatar">
                            <img src="{{ $organization->getAvatar(120) }}" class="img-cover rounded-circle" alt="{{ $organization->full_name }}">
                        </div>
                        <a href="{{ $organization->getProfileUrl() }}" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                            <h3 class="home-organizations-title">{{ $organization->full_name }}</h3>
                            <p class="home-organizations-desc mt-10">{{ $organization->bio }}</p>
                            <span class="home-organizations-badge badge mt-15">{{ $organization->webinars_count }} {{ trans('panel.classes') }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination organization-swiper-pagination"></div>
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$blog and !empty($blog) and !$blog->isEmpty())
<section class="home-sections container">
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="section-title">{{ trans('home.blog') }}</h2>
            <p class="section-hint">{{ trans('home.blog_hint') }}</p>
        </div>

        <a href="/blog" class="btn btn-border-white">{{ trans('home.all_blog') }}</a>
    </div>

    <div class="row mt-35">

        @foreach($blog as $post)
        <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0">
            @include('web.default.blog.grid-list',['post' =>$post])
        </div>
        @endforeach

    </div>
</section>
@endif

@endforeach
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
<script src="/assets/default/vendors/owl-carousel2/owl.carousel.min.js"></script>
<script src="/assets/default/vendors/parallax/parallax.min.js"></script>
<script src="/assets/default/js/parts/home.min.js"></script>
@endpush
