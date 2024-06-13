<?php
if (empty($authUser) and auth()->check()) {
$authUser = auth()->user();
}

$navBtnUrl = null;
$navBtnText = null;

if(request()->is('forums*')) {
$navBtnUrl = '/forums/create-topic';
$navBtnText = trans('update.create_new_topic');
} else {
$navbarButton = getNavbarButton(!empty($authUser) ? $authUser->role_id : null, empty($authUser));

if (!empty($navbarButton)) {
$navBtnUrl = $navbarButton->url;
$navBtnText = $navbarButton->title;
}
}
?>
<div id="navbarVacuum"></div>
<nav id="navbar" class="navbar navbar-expand-lg navbar-light menu-update-mj">
    <div class="<?php echo e((!empty($isPanel) and $isPanel) ? 'container-fluid' : 'container'); ?>">
        <div class="d-flex align-items-center justify-content-between w-100">

           <a class="navbar-brand navbar-order d-flex align-items-center justify-content-center mr-0 <?php echo e((empty($navBtnUrl) and empty($navBtnText)) ? '' : ''); ?>" href="/">
                 <?php if(!empty($generalSettings['logo'])): ?>
                <img src="<?php echo e($generalSettings['logo']); ?>" class="img-cover w-75" alt="site logo">
                <?php endif; ?>
            </a>

            

            

            
                

                

            
        </div>
    </div>
</nav>

<?php $__env->startPush('scripts_bottom'); ?>
<script src="/assets/default/js/parts/navbar.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/web/default/includes/navbar.blade.php ENDPATH**/ ?>