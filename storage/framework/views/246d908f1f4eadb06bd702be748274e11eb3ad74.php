<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>
<style>
    .btn-cc {
        display: flex;
        flex-direction: column;
        gap: 5px;
        justify-content: center;
        align-items: center;
    }

    .btn-snap {
        padding: 10px 20px;
        margin: 0 20px;
        background-color: #1f3b64;
        color: #FFF;
        font: 16px;
        font-weight: 500;
        border-radius: 10px;
        text-align: center;
        border: none;

    }

    btn-snap:hover {}
</style>
<?php $__env->startSection('content'); ?>
    
    


    

    
    

    <?php
        $showOfflineFields = false;
        if ($errors->has('date') or $errors->has('referral_code') or $errors->has('account') or !empty($editOfflinePayment)) {
            $showOfflineFields = true;
        }

        $isMultiCurrency = !empty(getFinancialCurrencySettings('multi_currency'));
        $userCurrency = currency();
        $invalidChannels = [];
    ?>

    <section class="mt-30">
        

        <form action="/panel/financial/account-post" method="post" enctype="multipart/form-data" class="mt-25">
            <?php echo e(csrf_field()); ?>

            <?php if(session('msg')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('msg')); ?>

                </div>
            <?php endif; ?>
            

            
            

            
            

            
            <div class="">
                
                <div class="row">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <label style="color: #032482;"
                            class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e(trans('panel.amount')); ?></label>
                        <div class="input-group rounded ">
                            <input type="number" name="amount" min="10000"
                                class="form-control input-payment <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(!empty($editOfflinePayment) ? $editOfflinePayment->amount : old('amount')); ?>"
                                placeholder="<?php echo e(trans('panel.number_only')); ?>" />
                            <span class="input-addon rounded-input-group-prepend">
                                VNĐ
                            </span>

                            <div class="invalid-feedback">
                                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>
                    </div>

                    

                    

                    

                    

                    <div class="col-12 col-lg-3 p-0">
                        <div class="mt-30 p-0">
                            <button style="border-radius: 15px;background: #032482 ; color: white;" type="submit"
                                class="btn btn-sm"><?php echo e(trans('public.send_require')); ?></button>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                        <label style="font-size: 20px; color: #032482;
                        "
                            class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e(trans('panel.account_charge')); ?></label>

                        <strong style="color: #C92D39;" class="font-30 font-weight-bold mt-5">
                            <?php echo e($accountCharge ? handlePrice($accountCharge) : 0); ?>

                        </strong>
                    </div>
                    

                </div>
            </div>
        </form>
    </section>

    <section class="mt-9">
        
        <div class="row mt-25 d-flex justify-content-center">

            
                    
                    
                    
                    
                

            </div>
            <style>
                .img-banking {
                    margin-top: 150px;
                }

                @media (max-width: 768px) {
                    .img-banking {
                    margin-top: 50px;
                    }
                }
            </style>
            <div class="col-md-5 mt-5 ml-md-3">
                <img class="img-banking" style="width:100%;" src="/store/2/itachi.jpg">
            </div>
        </div>


    </section>



    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/js/panel/financial/account.min.js"></script>

    <script>
        (function($) {
            "use strict";

            <?php if(session()->has('sweetalert')): ?>
                Swal.fire({
                    icon: "<?php echo e(session()->get('sweetalert')['status'] ?? 'success'); ?>",
                    html: '<h3 class="font-20 text-center text-dark-blue py-25"><?php echo e(session()->get('sweetalert')['msg'] ?? ''); ?></h3>',
                    showConfirmButton: false,
                    width: '25rem',
                });
            <?php endif; ?>
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() . '.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\snapstudy.edu.vn\public_html\resources\views/web/default/panel/financial/account.blade.php ENDPATH**/ ?>