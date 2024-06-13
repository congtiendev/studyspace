<style>
    #pdf_container {
        overflow: auto;
    }

    .pdf-page-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pdf-page-container canvas {
        margin: auto;
    }
</style>
@php
    $checkSequenceContent = $file->checkSequenceContent();
    $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
@endphp
<div class="accordion-row rounded-sm border mt-15 p-15 mb-15">
    <div class="d-flex align-items-center justify-content-between" role="tab" id="files_{{ $file->id }}">
        <div class="d-flex align-items-center" href="#collapseFiles{{ $file->id }}"
            aria-controls="collapseFiles{{ $file->id }}" data-parent="#{{ $accordionParent }}" role="button"
            data-toggle="collapse" aria-expanded="true" onclick="LoadPdfFromUrl('{{ $file->file }}')">

            <span class="d-flex align-items-center justify-content-center mr-15">
                <span class="chapter-icon chapter-content-icon">
                    <i data-feather="{{ $file->getIconByType() }}" width="20" height="20" class="text-gray"></i>
                </span>
            </span>

            <span class="font-weight-bold text-secondary font-14 file-title">{{ $file->title }}</span>
        </div>

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20"
            href="#collapseFiles{{ !empty($file) ? $file->id : 'record' }}"
            aria-controls="collapseFiles{{ !empty($file) ? $file->id : 'record' }}" data-parent="#{{ $accordionParent }}"
            role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>


    <div id="collapseFiles{{ $file->id }}" aria-labelledby="files_{{ $file->id }}" class=" collapse"
        role="tabpanel">
        <div class="panel-collapse">
            @if ($file->accessibility == 'free' || (!empty($user) && $hasBought))
                <div class="text-gray text-14">
                </div>
            @else
                <div class="text-gray text-14">
                    {!! nl2br(clean($file->description)) !!}
                </div>
            @endif
            <div>
                @if ($file->accessibility == 'free' || (!empty($user) && $hasBought))
                    <div id="pdf_container"></div>
                    <hr>
                @else
                    <form action="/cart/store" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="item_id" value="{{ $course->id }}">
                        <input type="hidden" name="item_name" value="webinar_id">

                        @if (!empty($course->tickets))
                            @foreach ($course->tickets as $ticket)
                                <div class="form-check mt-20">
                                    <input class="form-check-input" @if (!$ticket->isValid()) disabled @endif
                                        type="radio"
                                        data-discount-price="{{ handlePrice($ticket->getPriceWithDiscount($course->price, !empty($activeSpecialOffer) ? $activeSpecialOffer : null)) }}"
                                        value="{{ $ticket->isValid() ? $ticket->id : '' }}" name="ticket_id"
                                        id="courseOff{{ $ticket->id }}">
                                    <label class="form-check-label d-flex flex-column cursor-pointer"
                                        for="courseOff{{ $ticket->id }}">
                                        <span class="font-16 font-weight-500 text-dark-blue">{{ $ticket->title }}
                                            @if (!empty($ticket->discount))
                                                ({{ $ticket->discount }}% {{ trans('public.off') }})
                                            @endif
                                        </span>
                                        <span class="font-14 text-gray">{{ $ticket->getSubTitle() }}</span>
                                    </label>
                                </div>
                            @endforeach
                        @endif

                        @if ($course->price > 0)
                            <div id="priceBox"
                                class="d-flex align-items-center justify-content-center mt-20 {{ !empty($activeSpecialOffer) ? ' flex-column ' : '' }}">
                                <div class="text-center">
                                    @php
                                        $realPrice = handleCoursePagePrice($course->price);
                                    @endphp
                                    <span id="realPrice" data-value="{{ $course->price }}"
                                        data-special-offer="{{ !empty($activeSpecialOffer) ? $activeSpecialOffer->percent : '' }}"
                                        class="d-block @if (!empty($activeSpecialOffer)) font-16 text-gray text-decoration-line-through @else font-30 text-primary @endif">
                                        {{ $realPrice['price'] }}
                                    </span>

                                    @if (!empty($realPrice['tax']) and empty($activeSpecialOffer))
                                        <span class="d-block font-14 text-gray">+ {{ $realPrice['tax'] }}
                                            {{ trans('cart.tax') }}</span>
                                    @endif
                                </div>

                                {{-- @if (!empty($activeSpecialOffer))
                                <div class="text-center">
                                    @php
                                        $priceWithDiscount = handleCoursePagePrice($course->getPrice());
                                    @endphp
                                    <span id="priceWithDiscount" class="d-block font-30 text-primary">
                                        {{ $priceWithDiscount['price'] }}
                                    </span>
    
                                    @if (!empty($priceWithDiscount['tax']))
                                        <span class="d-block font-14 text-gray">+ {{ $priceWithDiscount['tax'] }}
                                            {{ trans('cart.tax') }}</span>
                                    @endif
                                </div>
                            @endif --}}
                            </div>
                        @else
                            {{-- <div class="d-flex align-items-center justify-content-center mt-20">
                            <span class="font-36 text-primary">{{ trans('public.free') }}</span>
                        </div> --}}
                        @endif

                        @php
                            $canSale = ($course->canSale() and !$hasBought);
                        @endphp

                        <div class="mt-20 d-flex flex-column">
                            @if (!$canSale and $course->canJoinToWaitlist())
                                <button type="button" data-slug="{{ $course->slug }}"
                                    class="btn btn-primary {{ !empty($authUser) ? 'js-join-waitlist-user' : 'js-join-waitlist-guest' }}">{{ trans('update.join_waitlist') }}</button>
                            @elseif($hasBought or !empty($course->getInstallmentOrder()))
                                <a href="{{ $course->getLearningPageUrl() }}"
                                    class="btn btn-primary">{{ trans('update.go_to_learning_page') }}</a>
                                realPrice
                            @elseif($course->price > 0)
                                {{-- <button type="button"
                                class="btn btn-primary {{ $canSale ? 'js-course-add-to-cart-btn' : $course->cantSaleStatus($hasBought) . ' disabled ' }}"> --}}
                                {{-- <button type="button" class="btn btn-primary js-course-add-to-cart-btn"> --}}
                                {{-- @if (!$canSale)
                                    {{ trans('update.disabled_add_to_cart') }}
                        @else --}}
                                {{-- {{ trans('public.add_to_cart') }} --}}
                                {{-- @endif --}}
                                {{-- </button> --}}

                                {{-- @if ($canSale and $course->subscribe)
                                <a href="/subscribes/apply/{{ $course->slug }}"
                                    class="btn btn-outline-primary btn-subscribe mt-20 @if (!$canSale) disabled @endif">{{ trans('public.subscribe') }}</a>
                            @endif --}}

                                {{-- @if ($canSale and !empty($course->points))
                                <a href="{{ !auth()->check() ? '/login' : '#' }}"
                    class="{{ auth()->check() ? 'js-buy-with-point' : '' }} btn btn-outline-warning mt-20 {{ !$canSale ? 'disabled' : '' }}"
                    rel="nofollow">
                    {!! trans('update.buy_with_n_points', ['points' => $course->points]) !!}
                    </a>
                    @endif --}}

                                @if ($canSale and !empty(getFeaturesSettings('direct_classes_payment_button_status')))
                                    <button type="button"
                                        class="btn btn-outline-danger mt-20 js-course-direct-payment">
                                        {{ trans('update.buy_now') }}
                                    </button>
                                @endif

                                @if (!empty($installments) and count($installments) and getInstallmentsSettings('display_installment_button'))
                                    <a href="/course/{{ $course->slug }}/installments"
                                        class="btn btn-outline-primary mt-20">
                                        {{ trans('update.pay_with_installments') }}
                                    </a>
                                @endif
                            @else
                                <a href="{{ $canSale ? '/course/' . $course->slug . '/free' : '#' }}"
                                    class="btn btn-primary {{ !$canSale ? ' disabled ' . $course->cantSaleStatus($hasBought) : '' }}">{{ trans('public.enroll_on_webinar') }}</a>
                            @endif
                        </div>

                    </form>
                @endif
            </div>

            {{-- pdf --}}

            {{-- @if (!empty($user) and $hasBought)
                <div class="d-flex align-items-center mt-20">
                    <label class="mb-0 mr-10 cursor-pointer font-weight-500" for="fileReadToggle{{ $file->id }}">{{ trans('public.i_passed_this_lesson') }}</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" @if ($sequenceContentHasError) disabled @endif id="fileReadToggle{{ $file->id }}" data-file-id="{{ $file->id }}" value="{{ $course->id }}" class="js-file-learning-toggle custom-control-input" @if (!empty($file->checkPassedItem())) checked @endif>
                        <label class="custom-control-label" for="fileReadToggle{{ $file->id }}"></label>
                    </div>
                </div>
            @endif --}}

            <div class="d-flex align-items-center justify-content-between mt-20">

                {{-- <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="download-cloud" width="18" height="18" class="text-gray mr-5"></i>
                        <span class="line-height-1">{{ ($file->volume > 0) ? $file->getVolume() : '-' }}</span>
                    </div>
                </div> --}}
                <div class="">
                    @if (!empty($checkSequenceContent) and $sequenceContentHasError)
                        {{-- <button
                            type="button"
                            class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled js-sequence-content-error-modal"
                            data-passed-error="{{ !empty($checkSequenceContent['all_passed_items_error']) ? $checkSequenceContent['all_passed_items_error'] : '' }}"
                            data-access-days-error="{{ !empty($checkSequenceContent['access_after_day_error']) ? $checkSequenceContent['access_after_day_error'] : '' }}"
                        >{{ trans('public.play') }}</button> --}}
                    @elseif($file->accessibility == 'paid')
                        @if (!empty($user) and $hasBought)
                            {{-- @if ($file->downloadable) --}}
                            {{-- <a href="{{ $course->getUrl() }}/file/{{ $file->id }}/download" class="course-content-btns btn btn-sm btn-primary">
                                    {{ trans('home.download') }}
                                </a> --}}
                            {{-- @else --}}
                            {{-- <a href="{{ $course->getLearningPageUrl() }}?type=file&item={{ $file->id }}" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                    {{ trans('public.play') }}
                                </a> 

                                 <a href="{{ $course->getLearningPageUrl() }}?type=file&item={{ $file->id }}" class="course-content-btns btn btn-sm btn-primary" onclick="showPDF(event)">
                                    {{ trans('public.play') }}
                                </a>  --}}
                            {{-- @endif --}}
                        @else
                            {{-- <button type="button" class="course-content-btns btn btn-sm btn-gray disabled {{ ((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : '')) }}">
                                @if ($file->downloadable)
                                    {{ trans('home.download') }}
                                @else --}}
                            {{-- {{ trans('public.play') }} --}}
                            {{-- <button type="button"
                                    class="btn btn-outline-danger mt-20 js-course-direct-payment">
                                    {{ trans('update.buy_now') }}
                                    </button> --}}
                            {{-- @endif
                            </button> --}}
                        @endif
                    @else
                        {{-- @if ($file->downloadable)
                            <a href="{{ $course->getUrl() }}/file/{{ $file->id }}/download" class="course-content-btns btn btn-sm btn-primary">
                                {{ trans('home.download') }}
                            </a>
                        @else
                            @if (!empty($user) and $hasBought)
                                <a href="{{ $course->getLearningPageUrl() }}?type=file&item={{ $file->id }}" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                    {{ trans('public.play') }}
                                </a>
                            @elseif($file->storage == 'upload_archive')
                                <a href="/course/{{ $course->slug }}/file/{{ $file->id }}/showHtml" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                    {{ trans('public.play') }}
                                </a>
                            @elseif(in_array($file->storage, ['iframe', 'google_drive', 'dropbox']))
                                <a href="/course/{{ $course->slug }}/file/{{ $file->id }}/play" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                    {{ trans('public.play') }}
                                </a>
                            @elseif($file->isVideo())
                                <button type="button" data-id="{{ $file->id }}" data-title="{{ $file->title }}" class="js-play-video course-content-btns btn btn-sm btn-primary">
                                    {{ trans('public.play') }}
                                </button>
                            @else --}}
                        {{-- <a href="{{ $file->file }}" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                    {{ trans('public.play') }}
                                </a> --}}
                        {{-- @endif --}}
                        {{-- @endif --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf_viewer.min.css" rel="stylesheet"
    type="text/css" />

<script type="text/javascript">
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.worker.min.js';
    var scale = 1; // Set Scale for zooming PDF.
    var resolution = 1; // Set Resolution to Adjust PDF clarity.
    var containerIndex = 0;

    function LoadPdfFromUrl(url) {
        // Read PDF from URL.
        pdfjsLib.getDocument(url).promise.then(function(pdfDoc) {
            // Reference the Container DIV.
            var pdf_container = document.getElementById("pdf_container");
            pdf_container.style.display = "block";
            pdf_container.setAttribute("style", "overflow: auto;");

            // Loop and render all pages.
            for (var i = 1; i <= pdfDoc.numPages; i++) {
                RenderPage(pdf_container, pdfDoc, i);
            }
            containerIndex++;
            var pdfContainer = document.getElementById("pdf_container");
            pdfContainer.setAttribute("id", "pdf_container_" + containerIndex);
            // Ngăn chặn sự kiện click chuột phải và context menu trên phần tử pdf_container
            pdfContainer.addEventListener("contextmenu", function(event) {
                event.preventDefault();
            });

            // Ngăn chặn sự kiện drag and drop trên phần tử pdf_container
            pdfContainer.addEventListener("dragstart", function(event) {
                event.preventDefault();
            });

            // Ngăn chặn việc kéo thả (drag and drop) vào phần tử pdf_container
            pdfContainer.addEventListener("drop", function(event) {
                event.preventDefault();
            });

            // Ngăn chặn việc dragover vào phần tử pdf_container
            pdfContainer.addEventListener("dragover", function(event) {
                event.preventDefault();
            });
        });
    };

    function RenderPage(pdf_container, pdfDoc, num) {
        pdfDoc.getPage(num).then(function(page) {
            // Create Page Container
            var pageContainer = document.createElement("div");
            pageContainer.classList.add("pdf-page-container");
            pdf_container.appendChild(pageContainer);

            // Create Canvas element and append to the Page Container.
            var canvas = document.createElement('canvas');
            canvas.id = 'pdf-' + num;
            ctx = canvas.getContext('2d');
            pageContainer.appendChild(canvas);

            // Set the Canvas dimensions using ViewPort and Scale.
            var viewport = page.getViewport({
                scale: scale
            });
            canvas.height = resolution * viewport.height;
            canvas.width = resolution * viewport.width;

            // Render the PDF page.
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport,
                transform: [resolution, 0, 0, resolution, 0, 0]
            };

            page.render(renderContext);
        });
    };
</script>
