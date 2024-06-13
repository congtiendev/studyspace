{{-- "id" => 2009
        "teacher_id" => 1015
        "creator_id" => 1015
        "category_id" => 610
        "type" => "webinar"1
        "private" => 0
        "slug" => "New-in-App-Live-System"
        "start_date" => 1646118000
        "duration" => 150
        "timezone" => "America/New_York"
        "thumbnail" => "/store/1/document/Screenshot_3.png"
        "image_cover" => "/store/1/masters-business-foreground-program.png"
        "video_demo" => "/store/1015/Learn Linux In 5 Days.mp4"
        "video_demo_source" => "upload"
        "capacity" => 10
        "price" => 10.0
        "organization_price" => null
        "support" => 1
        "certificate" => 0
        "downloadable" => 0
        "partner_instructor" => 0
        "subscribe" => 0
        "forum" => 0
        "enable_waitlist" => 0
        "access_days" => null
        "points" => 200
        "message_for_reviewer" => null
        "status" => "active"
        "created_at" => 1646171664
        "updated_at" => 1699637503
        "deleted_at" => null
        "rates" => "5"
        "avg_rates" => 5.0 --}}
<div class="webinar-card">
    <figure>
        <div class="image-box">
            @if($webinar->bestTicket() < $webinar->price)
                <span class="badge badge-danger">{{ trans('public.offer',['off' => $webinar->bestTicket(true)['percent']]) }}</span>
                @elseif(empty($isFeature) and !empty($webinar->feature))
                <span class="badge badge-warning">{{ trans('home.featured') }}</span>
                @elseif($webinar->type == 'webinar')
                {{-- @if($webinar->start_date > time())
                    <span class="badge badge-primary">{{  trans('panel.not_conducted') }}</span>
                @elseif($webinar->isProgressing())
                <span class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span>
                @else
                <span class="badge badge-secondary">{{ trans('public.finished') }}</span>
                @endif --}}
                @elseif(!empty($webinar->type))
                <span class="badge badge-primary">{{ trans('webinars.'.$webinar->type) }}</span>
                @endif

                <a href="{{ $webinar->getUrl() }}">
                    <img src="{{ $webinar->getImage() }}" class="img-cover" alt="{{ $webinar->title }}">
                </a>


                @if($webinar->checkShowProgress())
                <div class="progress d-none">
                    <span class="progress-bar" style="width: {{ $webinar->getProgress() }}%"></span>
                </div>
                @endif

                @if($webinar->type == 'webinar')
                <a href="{{ $webinar->addToCalendarLink() }}" target="_blank" class="webinar-notify d-none align-items-center justify-content-center">
                    <i data-feather="bell" width="20" height="20" class="webinar-icon"></i>
                </a>
                @endif
        </div>

        <figcaption class="webinar-card-body">
            {{-- <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar bg-gray200">
                    <img src="{{ $webinar->teacher->getAvatar() }}" class="img-cover" alt="{{ $webinar->teacher->full_name }}">
</div>
<a href="{{ $webinar->teacher->getProfileUrl() }}" target="_blank" class="user-name ml-5 font-14">{{ $webinar->teacher->full_name }}</a>
</div> --}}

<a class="capture-slider-mj" href="{{ $webinar->getUrl() }}">
    <h3 class="mt-15 webinar-title font-weight-bold font-16">{{ clean($webinar->title,'title') }}</h3>
    <h4>{{ $webinar->timezone }}</h4>
</a>

@if(!empty($webinar->category))
<span class="d-block font-14 mt-20">{{ $webinar->message_for_reviewer }}</span>
{{-- <a href="{{ $webinar->category->getUrl() }}" target="_blank" class="">{{ $webinar->category->title }}</a> --}}
@endif

@include(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()])

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

<div class="webinar-price-box mt-25 text-right">
    <a href="">
        <span class="text-black real btn-slider">See full outline</span>
        <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
    </a>
</div>
</figcaption>
</figure>
</div>
