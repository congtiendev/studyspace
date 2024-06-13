<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="site-top-banner search-top-banner opacity-04 position-relative">
        

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="top-search-categories-form">
                        

                        <div class="search-input bg-white p-10 flex-grow-1 search-cate-mj">
                            <form action="/search" method="get">
                                <div class="form-group d-flex align-items-center m-0">
                                    <input type="text" name="search" class="form-control border-0"
                                        placeholder="<?php echo e(trans('home.slider_search_placeholder')); ?>" />
                                    <button type="submit"
                                        class="btn btn-primary rounded-pill btn-primary-mj"><?php echo e(trans('home.find')); ?></button>
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

                

                <div class="row mt-20">



                    <div class="col-12 col-lg-3">
                        <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                            Fillter By
                         </h3>
                        <div class="mt-20 p-20 rounded-sm shadow-lg filters-container">

                            

                            

                            <div class="mt-25 pt-25">
                                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue">
                                    <?php echo e(trans('RMIT')); ?>

                                </h3>
                                <div class="pt-10">
                                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex align-items-center mt-20">
                                            <div class="custom-control custom-checkbox">
                                                <input style=" border-color: #032482;
                                                background-color: #032482;" type="radio" name="schoolOptions[]" id="filterLanguage<?php echo e($school); ?>"
                                                    value="<?php echo e($school); ?>" class="custom-control-input school-radio"
                                                    data-clicked="false"
                                                    <?php if(in_array($school, request()->get('schoolOptions', []))): ?> checked="checked" <?php endif; ?>>
                                                <label class="custom-control-label" for="filterLanguage<?php echo e($school); ?>"></label>
                                            </div>
                                            <label class="cursor-pointer mt-10" for="filterLanguage<?php echo e($school); ?>"><?php echo e($school); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>


                            

                            

                            <button type="submit" class="btn btn-sm btn-primary btn-block mt-30">
                                <?php echo e(trans('site.filter_items')); ?>

                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <?php if(empty(request()->get('card')) or request()->get('card') == 'grid'): ?>
                            <div class="row">
                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-lg-4 mt-20">
                                        <?php echo $__env->make('web.default.includes.webinar.grid-card', [
                                            'webinar' => $webinar,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php elseif(!empty(request()->get('card')) and request()->get('card') == 'list'): ?>
                            <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('web.default.includes.webinar.list-card', ['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

            </form>
            <div class="mt-50 pt-30">
                <?php echo e($webinars->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/default/js/parts/categories.min.js"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make(getTemplate() . '.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/web/default/pages/classes.blade.php ENDPATH**/ ?>