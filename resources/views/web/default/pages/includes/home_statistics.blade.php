@php
$statisticsSettings = getStatisticsSettings();
@endphp

@if(!empty($statisticsSettings['enable_statistics']))
@if(!empty($statisticsSettings['display_default_statistics']) and !empty($homeDefaultStatistics))
<div class="stats-container {{ ($heroSection == "2") ? 'page-has-hero-section-2' : '' }}">
    <div class="container">
        <h1 class="text-center">We have solutions for all your assessments and test questions </h1>
        



        <div class="row">
            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                   
                    <strong class="stat-number mt-10" style="color: #1684EA">1200+</strong>
                    <h4 class="stat-title">Assessment & Questions</h4>
                    <p class="stat-desc mt-10">We have access to all assessment details and test questions of your chosen courses</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                  
                    <strong class="stat-number mt-10" style="color: #6544F9">1500+</strong>
                    <h4 class="stat-title">Outlines</h4>
                    <p class="stat-desc mt-10">Unlock your assignments with the most detailed and comprehensive instructions</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                   
                    <strong class="stat-number mt-10" style="color: #54CE91">50+</strong>
                    <h4 class="stat-title">Experts</h4>
                    <p class="stat-desc mt-10">All the Outlines are proofreaded by our experts to ensure you a high score</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                    
                    <strong class="stat-number mt-10" style="color: #D04091">70%</strong>
                    <h4 class="stat-title">Time Saved</h4>
                    <p class="stat-desc mt-10">Save your time to 70% and Boost your Efficiency to 180%</p>
                </div>
            </div>
        </div>



    </div>
</div>
@elseif(!empty($homeCustomStatistics))
<div class="stats-container">
    <div class="container">
        <div class="row">
            @foreach($homeCustomStatistics as $homeCustomStatistic)
            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                    <div class="stat-icon-box " style="background-color: {{ $homeCustomStatistic->color }}">
                        <img src="{{ $homeCustomStatistic->icon }}" alt="{{ $homeCustomStatistic->title }}" class="img-fluid" />
                    </div>
                    <strong class="stat-number mt-10">{{ $homeCustomStatistic->count }}</strong>
                    <h4 class="stat-title">{{ $homeCustomStatistic->title }}</h4>
                    <p class="stat-desc mt-10">{{ $homeCustomStatistic->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="my-40"></div>
@endif
@else
<div class="my-40"></div>
@endif