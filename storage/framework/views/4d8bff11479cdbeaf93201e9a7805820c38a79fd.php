<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css" />
    <style>
        .bootstrap-timepicker-widget table td input {
            width: 35px !important;
        }

        .select2-container {
            z-index: 1212 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($webinar) ? trans('/admin/main.edit') : trans('admin/main.new')); ?> <?php echo e(trans('admin/main.class')); ?>

            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars"><?php echo e(trans('admin/main.classes')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($webinar) ? trans('/admin/main.edit') : trans('admin/main.new')); ?>

                </div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">

                            <form method="post"
                                action="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e(!empty($webinar) ? $webinar->id . '/update' : 'store'); ?>"
                                id="webinarForm" class="webinar-form">
                                <?php echo e(csrf_field()); ?>

                                <section>
                                    <h2 class="section-title after-line"><?php echo e(trans('public.basic_information')); ?></h2>

                                    <div class="row">
                                        <div class="col-12 col-md-5">

                                            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                                <div class="form-group">
                                                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                                    <select name="locale"
                                                        class="form-control <?php echo e(!empty($webinar) ? 'js-edit-content-locale' : ''); ?>">
                                                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($lang); ?>"
                                                                <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>>
                                                                <?php echo e($language); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['locale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($message); ?>

                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            <?php else: ?>
                                                <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
                                            <?php endif; ?>

                                            <div class="form-group mt-15 ">
                                                <label class="input-label d-block"><?php echo e(trans('panel.course_type')); ?></label>

                                                <select name="type"
                                                    class="custom-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <option value="webinar"
                                                        <?php if(!empty($webinar) and $webinar->isWebinar() or old('type') == \App\Models\Webinar::$webinar): ?> selected <?php endif; ?>>
                                                        <?php echo e(trans('webinars.webinar')); ?></option>
                                                    <option value="course"
                                                        <?php if(!empty($webinar) and $webinar->isCourse() or old('type') == \App\Models\Webinar::$course): ?> selected <?php endif; ?>>
                                                        <?php echo e(trans('product.video_course')); ?></option>
                                                    <option value="text_lesson"
                                                        <?php if(!empty($webinar) and $webinar->isTextCourse() or old('type') == \App\Models\Webinar::$textLesson): ?> selected <?php endif; ?>>
                                                        <?php echo e(trans('product.text_course')); ?></option>
                                                </select>

                                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                                <input type="text" name="title"
                                                    value="<?php echo e(!empty($webinar) ? $webinar->title : old('title')); ?>"
                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="" />
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('admin/main.class_url')); ?></label>
                                                <input type="text" name="slug"
                                                    value="<?php echo e(!empty($webinar) ? $webinar->slug : old('slug')); ?>"
                                                    class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="" />
                                                <div class="text-muted text-small mt-1">
                                                    <?php echo e(trans('admin/main.class_url_hint')); ?></div>
                                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <?php if(!empty($webinar) and $webinar->creator->isOrganization()): ?>
                                                <div class="form-group mt-15 ">
                                                    <label
                                                        class="input-label d-block"><?php echo e(trans('admin/main.organization')); ?></label>

                                                    <select name="organ_id" data-search-option="just_organization_role"
                                                        class="form-control search-user-select2"
                                                        data-placeholder="<?php echo e(trans('search_organization')); ?>">
                                                        <option value="<?php echo e($webinar->creator->id); ?>" selected>
                                                            <?php echo e($webinar->creator->full_name); ?></option>
                                                    </select>
                                                </div>
                                            <?php endif; ?>

                                            <input type="hidden" name="teacher_id" value="<?php echo e(Auth::user()->id); ?>"
                                                id="">
                                                <input type="hidden" name="creator_id" value="<?php echo e(Auth::user()->id); ?>"
                                                id="">
                                            


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.seo_description')); ?></label>
                                                <input type="text" name="seo_description"
                                                    value="<?php echo e(!empty($webinar) ? $webinar->seo_description : old('seo_description')); ?>"
                                                    class="form-control <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                                <div class="text-muted text-small mt-1">
                                                    <?php echo e(trans('admin/main.seo_description_hint')); ?></div>
                                                <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.thumbnail_image')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager"
                                                            data-input="thumbnail" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="thumbnail" id="thumbnail"
                                                        value="<?php echo e(!empty($webinar) ? $webinar->thumbnail : old('thumbnail')); ?>"
                                                        class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                                    <div class="input-group-append">
                                                        <button type="button" class="input-group-text admin-file-view"
                                                            data-input="thumbnail">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($message); ?>

                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>


                                            

                                            

                                            
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                                                <textarea id="summernote" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(trans('forms.webinar_description_placeholder')); ?>"><?php echo !empty($webinar) ? $webinar->description : old('description'); ?></textarea>
                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="mt-3">
                                    <h2 class="section-title after-line"><?php echo e(trans('public.additional_information')); ?></h2>
                                    <div class="row">
                                        <div class="col-12 col-md-6">


                                            

                                            <div
                                                class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class=""
                                                    for="supportSwitch"><?php echo e(trans('panel.support')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="support" class="custom-control-input"
                                                        id="supportSwitch"
                                                        <?php echo e(!empty($webinar) && $webinar->support ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="supportSwitch"></label>
                                                </div>
                                            </div>

                                            

                                            <div
                                                class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="cursor-pointer"
                                                    for="downloadableSwitch"><?php echo e(trans('home.downloadable')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="downloadable"
                                                        class="custom-control-input" id="downloadableSwitch"
                                                        <?php echo e(!empty($webinar) && $webinar->downloadable ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="downloadableSwitch"></label>
                                                </div>
                                            </div>

                                            <div
                                                class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class=""
                                                    for="partnerInstructorSwitch"><?php echo e(trans('public.partner_instructor')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="partner_instructor"
                                                        class="custom-control-input" id="partnerInstructorSwitch"
                                                        <?php echo e(!empty($webinar) && $webinar->partner_instructor ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="partnerInstructorSwitch"></label>
                                                </div>
                                            </div>

                                            

                                            <div
                                                class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class=""
                                                    for="subscribeSwitch"><?php echo e(trans('public.subscribe')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="subscribe" class="custom-control-input"
                                                        id="subscribeSwitch"
                                                        <?php echo e(!empty($webinar) && $webinar->subscribe ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="subscribeSwitch"></label>
                                                </div>
                                            </div>

                                            <div
                                                class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class=""
                                                    for="privateSwitch"><?php echo e(trans('webinars.private')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="private" class="custom-control-input"
                                                        id="privateSwitch"
                                                        <?php echo e((!empty($webinar) and $webinar->private) ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="privateSwitch"></label>
                                                </div>
                                            </div>

                                            <div
                                                class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class=""
                                                    for="privateSwitch"><?php echo e(trans('update.enable_waitlist')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="enable_waitlist"
                                                        class="custom-control-input" id="enable_waitlistSwitch"
                                                        <?php echo e((!empty($webinar) and $webinar->enable_waitlist) ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="enable_waitlistSwitch"></label>
                                                </div>
                                            </div>

                                            

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.price')); ?>

                                                    (<?php echo e($currency); ?>)</label>
                                                <input type="text" name="price"
                                                    value="<?php echo e((!empty($webinar) and !empty($webinar->price)) ? convertPriceToUserCurrency($webinar->price) : old('price')); ?>"
                                                    class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(trans('public.0_for_free')); ?>" />
                                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <?php if(!empty($webinar) and $webinar->creator->isOrganization()): ?>
                                                <div class="form-group mt-15">
                                                    <label class="input-label"><?php echo e(trans('update.organization_price')); ?>

                                                        (<?php echo e($currency); ?>)</label>
                                                    <input type="number" name="organization_price"
                                                        value="<?php echo e((!empty($webinar) and $webinar->organization_price) ? convertPriceToUserCurrency($webinar->organization_price) : old('organization_price')); ?>"
                                                        class="form-control <?php $__errorArgs = ['organization_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        placeholder="" />
                                                    <?php $__errorArgs = ['organization_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback">
                                                            <?php echo e($message); ?>

                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <p class="font-12 text-gray mt-1">-
                                                        <?php echo e(trans('update.organization_price_hint')); ?></p>
                                                </div>
                                            <?php endif; ?>

                                            

                                            <div class="form-group mt-15">
                                                <label class="input-label d-block"><?php echo e(trans('public.tags')); ?></label>
                                                <input type="text" name="tags" data-max-tag="5"
                                                    value="<?php echo e(!empty($webinar) ? implode(',', $webinarTags) : ''); ?>"
                                                    class="form-control inputtags"
                                                    placeholder="<?php echo e(trans('public.type_tag_name_and_press_enter')); ?> (<?php echo e(trans('admin/main.max')); ?> : 5)" />
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.category')); ?></label>

                                                <select id="categories"
                                                    class="custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="category_id" required>
                                                    <option <?php echo e(!empty($webinar) ? '' : 'selected'); ?> disabled>
                                                        <?php echo e(trans('public.choose_category')); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                            <optgroup label="<?php echo e($category->title); ?>">
                                                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($subCategory->id); ?>"
                                                                        <?php echo e((!empty($webinar) and $webinar->category_id == $subCategory->id) ? 'selected' : ''); ?>>
                                                                        <?php echo e($subCategory->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </optgroup>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($category->id); ?>"
                                                                <?php echo e((!empty($webinar) and $webinar->category_id == $category->id) ? 'selected' : ''); ?>>
                                                                <?php echo e($category->title); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mt-15 <?php echo e((!empty($webinarCategoryFilters) and count($webinarCategoryFilters)) ? '' : 'd-none'); ?>"
                                        id="categoriesFiltersContainer">
                                        <span class="input-label d-block"><?php echo e(trans('public.category_filters')); ?></span>
                                        <div id="categoriesFiltersCard" class="row mt-3">

                                            <?php if(!empty($webinarCategoryFilters) and count($webinarCategoryFilters)): ?>
                                                <?php $__currentLoopData = $webinarCategoryFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-12 col-md-3">
                                                        <div class="webinar-category-filters">
                                                            <strong
                                                                class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                                                            <div class="py-10"></div>

                                                            <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div
                                                                    class="form-group mt-3 d-flex align-items-center justify-content-between">
                                                                    <label class="text-gray font-14"
                                                                        for="filterOptions<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="filters[]"
                                                                            value="<?php echo e($option->id); ?>"
                                                                            <?php echo e(!empty($webinarFilterOptions) && in_array($option->id, $webinarFilterOptions) ? 'checked' : ''); ?>

                                                                            class="custom-control-input"
                                                                            id="filterOptions<?php echo e($option->id); ?>">
                                                                        <label class="custom-control-label"
                                                                            for="filterOptions<?php echo e($option->id); ?>"></label>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </section>

                                <?php if(!empty($webinar)): ?>
                                    


                                    <?php echo $__env->make('admin.webinars.create_includes.contents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                    

                                    
                                <?php endif; ?>

                                

                                

                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" id="saveAndPublish"
                                            class="btn btn-success"><?php echo e(!empty($webinar) ? trans('admin/main.save_and_publish') : trans('admin/main.save_and_continue')); ?></button>

                                        <?php if(!empty($webinar)): ?>
                                            <button type="button" id="saveReject"
                                                class="btn btn-warning"><?php echo e($webinar->status == 'active' ? trans('update.unpublish') : trans('public.reject')); ?></button>

                                            <?php echo $__env->make('admin.includes.delete_button', [
                                                'url' =>
                                                    getAdminPanelUrl() . '/webinars/' . $webinar->id . '/delete',
                                                'btnText' => trans('public.delete'),
                                                'hideDefaultClass' => true,
                                                'btnClass' => 'btn btn-danger',
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>


                            <?php echo $__env->make('admin.webinars.modals.prerequisites', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.interactive_file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.testLesson', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.assignment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.extra_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var titleLang = '<?php echo e(trans('admin/main.title')); ?>';
        var zoomJwtTokenInvalid = '<?php echo e(trans('admin/main.teacher_zoom_jwt_token_invalid')); ?>';
        var editChapterLang = '<?php echo e(trans('public.edit_chapter')); ?>';
        var requestFailedLang = '<?php echo e(trans('public.request_failed')); ?>';
        var thisLiveHasEndedLang = '<?php echo e(trans('update.this_live_has_been_ended')); ?>';
        var quizzesSectionLang = '<?php echo e(trans('quiz.quizzes_section')); ?>';
        var filePathPlaceHolderBySource = {
            upload: '<?php echo e(trans('update.file_source_upload_placeholder')); ?>',
            youtube: '<?php echo e(trans('update.file_source_youtube_placeholder')); ?>',
            vimeo: '<?php echo e(trans('update.file_source_vimeo_placeholder')); ?>',
            external_link: '<?php echo e(trans('update.file_source_external_link_placeholder')); ?>',
            google_drive: '<?php echo e(trans('update.file_source_google_drive_placeholder')); ?>',
            dropbox: '<?php echo e(trans('update.file_source_dropbox_placeholder')); ?>',
            iframe: '<?php echo e(trans('update.file_source_iframe_placeholder')); ?>',
            s3: '<?php echo e(trans('update.file_source_s3_placeholder')); ?>',
        }
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/quiz.min.js"></script>
    <script src="/assets/admin/js/webinar.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/admin/webinars/create.blade.php ENDPATH**/ ?>