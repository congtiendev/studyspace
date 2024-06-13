@extends(getTemplate() . '.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')
    <section class="site-top-banner search-top-banner opacity-04 position-relative">
        {{-- <img src="{{ getPageBackgroundSettings('categories') }}" class="img-cover" alt="" /> --}}

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="top-search-categories-form">
                        {{-- <h1 class="text-white font-30 mb-15">{{ $pageTitle }}</h1>
                        <span class="course-count-badge py-5 px-10 text-white rounded">{{ $coursesCount }}
                            {{ trans('product.courses') }}</span> --}}

                        <div class="search-input bg-white p-10 flex-grow-1 search-cate-mj">
                            <form action="/search" method="get">
                                <div class="form-group d-flex align-items-center m-0">
                                    <input type="text" name="search" class="form-control border-0"
                                        placeholder="{{ trans('home.slider_search_placeholder') }}" />
                                    <button type="submit"
                                        class="btn btn-primary rounded-pill btn-primary-mj">{{ trans('home.find') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-30 w-100">

        <section class="mt-lg-50 pt-lg-20 mt-md-40 pt-md-40 w-100">
            <form action="/classes" method="get" id="filtersForm">

                {{-- @include('web.default.pages.includes.top_filters') --}}

                <div class="row mt-20">



                    <div class="col-12 col-lg-3">
                        <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                            Fillter By
                         </h3>
                        <div class="mt-20 p-20 rounded-sm shadow-lg filters-container">

                            {{-- <div>
                                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                                    {{ trans('public.type') }}
                                </h3>
                                <div class="pt-10">
                                    @foreach (['webinar', 'course', 'text_lesson'] as $typeOption)
                                        <div class="d-flex align-items-center mt-20">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="type[]"
                                                    id="filterLanguage{{ $typeOption }}" value="{{ $typeOption }}"
                                                    @if (in_array($typeOption, request()->get('type', []))) checked="checked" @endif
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="filterLanguage{{ $typeOption }}"></label>
                                            </div>
                                            <label class="cursor-pointer m-0" for="filterLanguage{{ $typeOption }}">
                                                @if ($typeOption == 'bundle')
                                                    {{ trans('update.bundle') }}
                                                @else
                                                    {{ trans('webinars.' . $typeOption) }}
                                                @endif
                                            </label>

                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            {{-- <div class="mt-25 pt-25">
                                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                                    {{ trans('site.more_options') }}
                                </h3>
                                <div class="pt-10">
                                    @foreach (['with_quiz', 'featured'] as $moreOption)
                                        <div class="d-flex align-items-center mt-20">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="moreOptions[]"
                                                    id="filterLanguage{{ $moreOption }}" value="{{ $moreOption }}"
                                                    @if (in_array($moreOption, request()->get('moreOptions', []))) checked="checked" @endif
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="filterLanguage{{ $moreOption }}"></label>
                                            </div>
                                            <label class="cursor-pointer m-0" for="filterLanguage{{ $moreOption }}">
                                                {{ trans('webinars.show_only_' . $moreOption) }}
                                            </label>

                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            <div class="mt-25 pt-25">
                                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                                    {{ trans('RMIT') }}
                                </h3>
                                <div class="pt-10">
                                    @foreach ($schools as $school)
                                        <div class="d-flex align-items-center mt-20">
                                            <div class="custom-control custom-checkbox">
                                                <input style=" border-color: #032482;
                                                background-color: #032482;" type="radio" name="schoolOptions[]" id="filterLanguage{{ $school }}"
                                                    value="{{ $school }}" class="custom-control-input school-radio"
                                                    data-clicked="false"
                                                    @if (in_array($school, request()->get('schoolOptions', []))) checked="checked" @endif>
                                                <label class="custom-control-label" for="filterLanguage{{ $school }}"></label>
                                            </div>
                                            <label class="cursor-pointer mt-10" for="filterLanguage{{ $school }}">{{ $school }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            {{-- <div class="mt-25 pt-25">
                                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                                    {{ trans('RMIT') }}
                                </h3>
                                <div class="pt-10">
                                    @foreach ($schools as $school)
                                        <div class="d-flex align-items-center mt-20">
                                            <div class="custom-control custom-checkbox">
                                                <a href="{{ route('classes', ['schoolOptions' => $school]) }}" class="custom-control-label"></a>
                                            </div>
                                            <label class="cursor-pointer mt-10" for="filterLanguage{{ $school }}">{{ $school }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            {{-- <div class="mt-25 pt-25">
                                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                                    {{ trans('Majors') }}
                                </h3>
                                <div class="pt-10">
                                    @foreach ($majors as $major)
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <label style="margin: 0px;" class="cursor-pointer" for="filterLanguage{{ $major }}">{{ $major }}</label>
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="majorOptions[]" id="filterLanguage{{ $major }}" value="{{ $major }}"
                                            @if (in_array($major, request()->get('majorOptions', []))) checked="checked" @endif
                                            class="custom-control-input">
                                          <label class="custom-control-label" for="filterLanguage{{ $major }}"></label>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            <button type="submit" class="btn btn-sm btn-primary btn-block mt-30">
                                {{ trans('site.filter_items') }}
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        @if (empty(request()->get('card')) or request()->get('card') == 'grid')
                            <div class="row">
                                @foreach ($webinars as $webinar)
                                    <div class="col-12 col-lg-4 mt-20">
                                        @include('web.default.includes.webinar.grid-card', [
                                            'webinar' => $webinar,
                                        ])
                                    </div>
                                @endforeach
                            </div>
                        @elseif(!empty(request()->get('card')) and request()->get('card') == 'list')
                            @foreach ($webinars as $webinar)
                                @include('web.default.includes.webinar.list-card', ['webinar' => $webinar])
                            @endforeach
                        @endif
                    </div>
                </div>

            </form>
            <div class="mt-50 pt-30">
                {{ $webinars->appends(request()->input())->links('vendor.pagination.panel') }}
            </div>
        </section>
    </div>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/default/js/parts/categories.min.js"></script>
@endpush

