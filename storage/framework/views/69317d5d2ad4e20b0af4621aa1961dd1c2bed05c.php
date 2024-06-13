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
<?php
    $checkSequenceContent = $file->checkSequenceContent();
    $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
?>
<div class="accordion-row rounded-sm border mt-15 p-15 mb-15">
    <div class="d-flex align-items-center justify-content-between" role="tab" id="files_<?php echo e($file->id); ?>">
        <div class="d-flex align-items-center" href="#collapseFiles<?php echo e($file->id); ?>"
            aria-controls="collapseFiles<?php echo e($file->id); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button"
            data-toggle="collapse" aria-expanded="true" onclick="LoadPdfFromUrl('<?php echo e($file->file); ?>')">

            <span class="d-flex align-items-center justify-content-center mr-15">
                <span class="chapter-icon chapter-content-icon">
                    <i data-feather="<?php echo e($file->getIconByType()); ?>" width="20" height="20" class="text-gray"></i>
                </span>
            </span>

            <span class="font-weight-bold text-secondary font-14 file-title"><?php echo e($file->title); ?></span>
        </div>

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20"
            href="#collapseFiles<?php echo e(!empty($file) ? $file->id : 'record'); ?>"
            aria-controls="collapseFiles<?php echo e(!empty($file) ? $file->id : 'record'); ?>" data-parent="#<?php echo e($accordionParent); ?>"
            role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>


    <div id="collapseFiles<?php echo e($file->id); ?>" aria-labelledby="files_<?php echo e($file->id); ?>" class=" collapse"
        role="tabpanel">
        <div class="panel-collapse">
            <?php if($file->accessibility == 'free' || (!empty($user) && $hasBought)): ?>
                <div class="text-gray text-14">
                </div>
            <?php else: ?>
                <div class="text-gray text-14">
                    <?php echo nl2br(clean($file->description)); ?>

                </div>
            <?php endif; ?>
            <div>
                <?php if($file->accessibility == 'free' || (!empty($user) && $hasBought)): ?>
                    <div id="pdf_container"></div>
                    <hr>
                <?php else: ?>
                    <form action="/cart/store" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="item_id" value="<?php echo e($course->id); ?>">
                        <input type="hidden" name="item_name" value="webinar_id">

                        <?php if(!empty($course->tickets)): ?>
                            <?php $__currentLoopData = $course->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check mt-20">
                                    <input class="form-check-input" <?php if(!$ticket->isValid()): ?> disabled <?php endif; ?>
                                        type="radio"
                                        data-discount-price="<?php echo e(handlePrice($ticket->getPriceWithDiscount($course->price, !empty($activeSpecialOffer) ? $activeSpecialOffer : null))); ?>"
                                        value="<?php echo e($ticket->isValid() ? $ticket->id : ''); ?>" name="ticket_id"
                                        id="courseOff<?php echo e($ticket->id); ?>">
                                    <label class="form-check-label d-flex flex-column cursor-pointer"
                                        for="courseOff<?php echo e($ticket->id); ?>">
                                        <span class="font-16 font-weight-500 text-dark-blue"><?php echo e($ticket->title); ?>

                                            <?php if(!empty($ticket->discount)): ?>
                                                (<?php echo e($ticket->discount); ?>% <?php echo e(trans('public.off')); ?>)
                                            <?php endif; ?>
                                        </span>
                                        <span class="font-14 text-gray"><?php echo e($ticket->getSubTitle()); ?></span>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if($course->price > 0): ?>
                            <div id="priceBox"
                                class="d-flex align-items-center justify-content-center mt-20 <?php echo e(!empty($activeSpecialOffer) ? ' flex-column ' : ''); ?>">
                                <div class="text-center">
                                    <?php
                                        $realPrice = handleCoursePagePrice($course->price);
                                    ?>
                                    <span id="realPrice" data-value="<?php echo e($course->price); ?>"
                                        data-special-offer="<?php echo e(!empty($activeSpecialOffer) ? $activeSpecialOffer->percent : ''); ?>"
                                        class="d-block <?php if(!empty($activeSpecialOffer)): ?> font-16 text-gray text-decoration-line-through <?php else: ?> font-30 text-primary <?php endif; ?>">
                                        <?php echo e($realPrice['price']); ?>

                                    </span>

                                    <?php if(!empty($realPrice['tax']) and empty($activeSpecialOffer)): ?>
                                        <span class="d-block font-14 text-gray">+ <?php echo e($realPrice['tax']); ?>

                                            <?php echo e(trans('cart.tax')); ?></span>
                                    <?php endif; ?>
                                </div>

                                
                            </div>
                        <?php else: ?>
                            
                        <?php endif; ?>

                        <?php
                            $canSale = ($course->canSale() and !$hasBought);
                        ?>

                        <div class="mt-20 d-flex flex-column">
                            <?php if(!$canSale and $course->canJoinToWaitlist()): ?>
                                <button type="button" data-slug="<?php echo e($course->slug); ?>"
                                    class="btn btn-primary <?php echo e(!empty($authUser) ? 'js-join-waitlist-user' : 'js-join-waitlist-guest'); ?>"><?php echo e(trans('update.join_waitlist')); ?></button>
                            <?php elseif($hasBought or !empty($course->getInstallmentOrder())): ?>
                                <a href="<?php echo e($course->getLearningPageUrl()); ?>"
                                    class="btn btn-primary"><?php echo e(trans('update.go_to_learning_page')); ?></a>
                                realPrice
                            <?php elseif($course->price > 0): ?>
                                
                                
                                
                                
                                
                                

                                

                                

                                <?php if($canSale and !empty(getFeaturesSettings('direct_classes_payment_button_status'))): ?>
                                    <button type="button"
                                        class="btn btn-outline-danger mt-20 js-course-direct-payment">
                                        <?php echo e(trans('update.buy_now')); ?>

                                    </button>
                                <?php endif; ?>

                                <?php if(!empty($installments) and count($installments) and getInstallmentsSettings('display_installment_button')): ?>
                                    <a href="/course/<?php echo e($course->slug); ?>/installments"
                                        class="btn btn-outline-primary mt-20">
                                        <?php echo e(trans('update.pay_with_installments')); ?>

                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e($canSale ? '/course/' . $course->slug . '/free' : '#'); ?>"
                                    class="btn btn-primary <?php echo e(!$canSale ? ' disabled ' . $course->cantSaleStatus($hasBought) : ''); ?>"><?php echo e(trans('public.enroll_on_webinar')); ?></a>
                            <?php endif; ?>
                        </div>

                    </form>
                <?php endif; ?>
            </div>

            

            

            <div class="d-flex align-items-center justify-content-between mt-20">

                
                <div class="">
                    <?php if(!empty($checkSequenceContent) and $sequenceContentHasError): ?>
                        
                    <?php elseif($file->accessibility == 'paid'): ?>
                        <?php if(!empty($user) and $hasBought): ?>
                            
                            
                            
                            
                            
                        <?php else: ?>
                            
                            
                            
                            
                        <?php endif; ?>
                    <?php else: ?>
                        
                        
                        
                        
                    <?php endif; ?>
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
<?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/web/default/course/tabs/contents/files.blade.php ENDPATH**/ ?>