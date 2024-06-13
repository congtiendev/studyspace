<div class="col-12 col-md-8 pl-0">
    <div class="card-body mt-4 mb-0">
        <div class="table-responsive" style="overflow-y: auto;">
            <table class="table text-center custom-table">
                <thead>
                    <tr>
                        <th class="text-center font-weight-bold"><?php echo e(trans('#')); ?></th>
                        <th class="text-center font-weight-bold"><?php echo e(trans('public.name')); ?></th>
                        <th class="text-center font-weight-bold"><?php echo e(trans('public.content')); ?></th>
                        <th class="text-center font-weight-bold p-0"><?php echo e(trans('public.amount')); ?></th>
                        <th class="text-center font-weight-bold"><?php echo e(trans('public.date_of_payment')); ?></th>
                        <th class="text-center font-weight-bold p-0"><?php echo e(trans('public.status')); ?></th>
                        <th class="text-center font-weight-bold"><?php echo e(trans('public.action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $requestPayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center align-middle">
                                <span class="font-weight"><?php echo e($item->id); ?></span>
                            </td>
                            <td class="text-center align-middle">
                                <span class="font-weight"><?php echo e($item->name); ?></span>
                            </td>
                            <td class="text-center align-middle">
                                <span class="font-weight"><?php echo e($item->content); ?></span>
                            </td>
                            
                            <td class="text-center align-middle">
                                <span class="font-weight"><?php echo e($item->amount); ?></span>
                            </td>
                            <td class="text-center align-middle">
                                <span
                                    class="font-weight"><?php echo e(\Carbon\Carbon::parse($item->date_of_payment)->format('d/m/Y')); ?></span>
                            </td>
                          
                            <td class="text-center align-middle">
                                <?php switch($item->status):
                                    case (\App\Models\RequestPayment::$waiting): ?>
                                        <span class="text-warning"><?php echo e(trans('public.waiting')); ?></span>
                                    <?php break; ?>

                                    <?php case (\App\Models\RequestPayment::$approved): ?>
                                        <span class="text-primary"><?php echo e(trans('financial.approved')); ?></span>
                                    <?php break; ?>

                                    <?php case (\App\Models\RequestPayment::$reject): ?>
                                        <span class="text-danger"><?php echo e(trans('public.cancel')); ?></span>
                                    <?php break; ?>
                                <?php endswitch; ?>
                            </td>
                            <td class="align-middle pr-3">
                                <select style="width: 120px;" name="action" class="form-control text-center"
                                <?php if($item->status != 1): ?> disabled <?php endif; ?> data-item-id="<?php echo e($item->id); ?>">
                                    <option value=""><?php echo e(trans('public.action')); ?></option>
                                    <option <?php if($item->status == 2): ?> selected <?php endif; ?> value="2"><?php echo e(trans('public.cancel')); ?></option>
                                    <option <?php if($item->status == 0): ?> selected <?php endif; ?> value="0"><?php echo e(trans('financial.approved')); ?></option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="mt-20">
            <?php echo e($requestPayment->links()); ?>

        </div>
    </div>
</div><?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/admin/financial/documents/historyRequest.blade.php ENDPATH**/ ?>