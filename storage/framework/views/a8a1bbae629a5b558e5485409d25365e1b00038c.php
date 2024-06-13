<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <section class="course-cover-container <?php echo e(empty($activeSpecialOffer) ? 'not-active-special-offer' : ''); ?>">
        

        <div class="cover-content pt-40">
            <div class="container position-relative">
                <?php if(!empty($activeSpecialOffer)): ?>
                    <?php echo $__env->make('web.default.course.special_offer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <div class="course-body-on-cover ">
                    <?php if(!empty($course->category)): ?>
                        <span class="d-block sub-title mt-20"><a href="<?php echo e($course->category->getUrl()); ?>" target="_blank"
                                class="font-weight-500"><?php echo e($course->category->title); ?></a></span>
                    <?php endif; ?>

                    <h1 class="course-title">
                        <?php echo e($course->title); ?>

                    </h1>

                    <p class="my-10 content-title"><?php echo e($course->seo_description); ?></p>

                    <div class="d-flex align-items-center">
                        <?php echo $__env->make('web.default.includes.webinar.rate', ['rate' => $course->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>

                    <div class="mt-15 view-mj">
                        
                    </div>

                    <?php
                        $percent = $course->getProgress();
                    ?>

                    
                </div>
            </div>
        </div>
    </section>

    <section
        class="container course-content-section <?php echo e($course->type); ?> <?php echo e(($hasBought or $course->isWebinar()) ? 'has-progress-bar' : ''); ?>">
        <div class="row courses-mjj">
            <div class="col-12 col-lg-8">
                <div class="course-content-body user-select-none">


                    <div class="mt-35">
                        <ul class="nav nav-tabs d-flex align-items-center justify-content-between search-courese-mj"
                            id="tabs-tab" role="tablist">
                            <li class="nav-item ">
                                <a style="width: 100px;" class="position-relative font-14 text-white d-flex align-items-center justify-content-center <?php echo e((empty(request()->get('tab', '')) or request()->get('tab', '') == 'information') ? 'active' : ''); ?>"
                                    id="information-tab" data-toggle="tab" href="#information" role="tab"
                                    aria-controls="information" aria-selected="true"><?php echo e(trans('product.information')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a style="width: 100px; " class="position-relative font-14 text-white d-flex align-items-center justify-content-center <?php echo e(request()->get('tab', '') == 'content' ? 'active' : ''); ?> "
                                    id="content-tab" data-toggle="tab" href="#content" role="tab"
                                    aria-controls="content" aria-selected="false"><?php echo e(trans('product.content')); ?>

                                    (<?php echo e($webinarContentCount); ?>)</a>
                            </li>
                            
                        </ul>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade <?php echo e((empty(request()->get('tab', '')) or request()->get('tab', '') == 'information') ? 'show active' : ''); ?> "
                                id="information" role="tabpanel" aria-labelledby="information-tab">
                                <?php echo $__env->make(getTemplate() . '.course.tabs.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e(request()->get('tab', '') == 'content' ? 'show active' : ''); ?>"
                                id="content" role="tabpanel" aria-labelledby="content-tab">
                                <?php echo $__env->make(getTemplate() . '.course.tabs.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e(request()->get('tab', '') == 'reviews' ? 'show active' : ''); ?>"
                                id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <?php echo $__env->make(getTemplate() . '.course.tabs.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="course-content-sidebar col-12 col-lg-4 mt-25 mt-lg-0">
                <div class="rounded-lg">
                    
                    <div>
                     <!--   <a href="/panel/financial/account">
                            <img src="/store/2/Rectangle-26.png" alt="" width="100%" class="flex-grow-1">
                        </a>
                        -->
                    </div>

                </div>



                
                

                
                

                

                
                
                
                

                
                

                
                
                
                
            </div>
        </div>

        
        
        
    </section>

    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/vendors/barrating/jquery.barrating.min.js"></script>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>

    <script>
        var webinarDemoLang = '<?php echo e(trans('
            webinars.webinar_demo ')); ?>';
        var replyLang = '<?php echo e(trans('
            panel.reply ')); ?>';
        var closeLang = '<?php echo e(trans('
            public.close ')); ?>';
        var saveLang = '<?php echo e(trans('
            public.save ')); ?>';
        var reportLang = '<?php echo e(trans('
            panel.report ')); ?>';
        var reportSuccessLang = '<?php echo e(trans('
            panel.report_success ')); ?>';
        var reportFailLang = '<?php echo e(trans('
            panel.report_fail ')); ?>';
        var messageToReviewerLang = '<?php echo e(trans('
            public.message_to_reviewer ')); ?>';
        var copyLang = '<?php echo e(trans('
            public.copy ')); ?>';
        var copiedLang = '<?php echo e(trans('
            public.copied ')); ?>';
        var learningToggleLangSuccess = '<?php echo e(trans('
            public.course_learning_change_status_success ')); ?>';
        var learningToggleLangError = '<?php echo e(trans('
            public.course_learning_change_status_error ')); ?>';
        var notLoginToastTitleLang = '<?php echo e(trans('
            public.not_login_toast_lang ')); ?>';
        var notLoginToastMsgLang = '<?php echo e(trans('
            public.not_login_toast_msg_lang ')); ?>';
        var notAccessToastTitleLang = '<?php echo e(trans('
            public.not_access_toast_lang ')); ?>';
        var notAccessToastMsgLang = '<?php echo e(trans('
            public.not_access_toast_msg_lang ')); ?>';
        var canNotTryAgainQuizToastTitleLang = '<?php echo e(trans('
            public.can_not_try_again_quiz_toast_lang ')); ?>';
        var canNotTryAgainQuizToastMsgLang = '<?php echo e(trans('
            public.can_not_try_again_quiz_toast_msg_lang ')); ?>';
        var canNotDownloadCertificateToastTitleLang =
            '<?php echo e(trans('
                public.can_not_download_certificate_toast_lang ')); ?>';
        var canNotDownloadCertificateToastMsgLang =
            '<?php echo e(trans('
                public.can_not_download_certificate_toast_msg_lang ')); ?>';
        var sessionFinishedToastTitleLang = '<?php echo e(trans('
            public.session_finished_toast_title_lang ')); ?>';
        var sessionFinishedToastMsgLang = '<?php echo e(trans('
            public.session_finished_toast_msg_lang ')); ?>';
        var sequenceContentErrorModalTitle = '<?php echo e(trans('
            update.sequence_content_error_modal_title ')); ?>';
        var courseHasBoughtStatusToastTitleLang = '<?php echo e(trans('
            cart.fail_purchase ')); ?>';
        var courseHasBoughtStatusToastMsgLang = '<?php echo e(trans('
            site.you_bought_webinar ')); ?>';
        var courseNotCapacityStatusToastTitleLang = '<?php echo e(trans('
            public.request_failed ')); ?>';
        var courseNotCapacityStatusToastMsgLang = '<?php echo e(trans('
            cart.course_not_capacity ')); ?>';
        var courseHasStartedStatusToastTitleLang = '<?php echo e(trans('
            cart.fail_purchase ')); ?>';
        var courseHasStartedStatusToastMsgLang = '<?php echo e(trans('
            update.class_has_started ')); ?>';
        var joinCourseWaitlistLang = '<?php echo e(trans('
            update.join_course_waitlist ')); ?>';
        var joinCourseWaitlistModalHintLang = "<?php echo e(trans('update.join_course_waitlist_modal_hint')); ?>";
        var joinLang = '<?php echo e(trans('
            footer.join ')); ?>';
        var nameLang = '<?php echo e(trans('
            auth.name ')); ?>';
        var emailLang = '<?php echo e(trans('
            auth.email ')); ?>';
        var phoneLang = '<?php echo e(trans('
            public.phone ')); ?>';
        var captchaLang = '<?php echo e(trans('
            site.captcha ')); ?>';
    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/default/js/parts/webinar_show.min.js"></script>


    <?php if(
        !empty($course->creator) and
            !empty($course->creator->getLiveChatJsCode()) and
            !empty(getFeaturesSettings('show_live_chat_widget'))): ?>
        <script>
            (function() {
                "use strict"

                {
                    !!$course - > creator - > getLiveChatJsCode() !!
                }
            })(jQuery)
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() . '.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\snapstudy.edu.vn\public_html\resources\views/web/default/course/index.blade.php ENDPATH**/ ?>