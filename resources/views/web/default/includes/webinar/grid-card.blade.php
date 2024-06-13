  <div class="webinar-card">
      <figure>


              <figcaption class="webinar-card-body">
                  {{-- <div class="user-inline-avatar d-flex align-items-center">
                    <div class="avatar bg-gray200">
                        <img src="{{ $webinar->teacher->getAvatar() }}" class="img-cover" alt="{{ $webinar->teacher->full_name }}">
    </div>
    <a href="{{ $webinar->teacher->getProfileUrl() }}" target="_blank" class="user-name ml-5 font-14">{{ $webinar->teacher->full_name }}</a>
    </div> --}}

                  <div class="btn-webinar-card-body">
                      <a style="-webkit-line-clamp: 1;
       text-align: left !important;
        white-space: nowrap;
        overflow: hidden"
                          href="{{ $webinar->getUrl() }}">{{ clean($webinar->title, 'type') }}</a>
                  </div>

                  <a href="{{ $webinar->getUrl() }}">
                      <p style="-webkit-line-clamp: 1;
        white-space: nowrap;
        overflow: hidden; font-family: 'Inter', sans-serif;"
                          class="title-silder webinar-title font-16 text-dark-blue">{{ clean($webinar->title, 'title') }}
                      </p>
                  </a>

                  @if (!empty($webinar->category))
                      <span class="d-block font-14 mt-5"><a href="{{ $webinar->getUrl() }}" target="_blank"
                              class="">{{ $webinar->category->title }}</a></span>
                  @endif


                  @include(getTemplate() . '.includes.webinar.rate', ['rate' => $webinar->getRate()])

                  {{-- <div class="d-flex justify-content-between mt-20">
                    <div class="d-flex align-items-center">
                        <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                        <span class="duration font-14 ml-5">{{ convertMinutesToHourAndMinute($webinar->duration) }} {{ trans('home.hours') }}</span>
    </div>

    <div class="vertical-line mx-15"></div>

    <div class="d-flex align-items-center">
        <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
        <span class="date-published font-14 ml-5">{{ dateTimeFormat(!empty($webinar->start_date) ? $webinar->start_date : $webinar->created_at,'j M Y') }}</span>
    </div>
    </div> --}}

                  {{-- <div class="webinar-price-box mt-25 text-right">
        @if (!empty($isRewardCourses) and !empty($webinar->points))
        <span class="text-warning real font-14 ">{{ $webinar->points }} {{ trans('update.points') }}</span>
        @elseif(!empty($webinar->price) and $webinar->price > 0)
        @if ($webinar->bestTicket() < $webinar->price)
            <span class="real">{{ handlePrice($webinar->bestTicket(), true, true, false, null, true) }}</span>
            <span class="off ml-10">{{ handlePrice($webinar->price, true, true, false, null, true) }}</span>
            @else
            <span class="real">{{ handlePrice($webinar->price, true, true, false, null, true) }}</span>
            @endif
            @else
            <span class="real font-14">{{ trans('public.free') }}</span>
            @endif
    </div> --}}
              </figcaption>

      </figure>

  </div>

