<?php if(!empty($paginator) and $paginator->hasPages()): ?>
    <nav class="d-flex justify-content-center">
        <ul class="custom-pagination d-flex align-items-center justify-content-center">
            <?php if($paginator->onFirstPage()): ?>
                <li class="previous disabled">
                    <i class='bx bx-chevron-left'></i>

                </li>
            <?php else: ?>
                <li class="previous">
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>">
                    <i class='bx bx-chevron-left'></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $separate = false;
                ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <?php if(($page < 2) or ($page + 1 > $paginator->lastPage()) or (($page < $paginator->currentPage() + 2) and ($page > $paginator->currentPage() - 2))): ?>
                            <?php
                                $separate = true;
                            ?>

                            <?php if($page == $paginator->currentPage()): ?>
                                <li><span class="active"><?php echo e($page); ?></span></li>
                            <?php else: ?>
                                <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>

                        <?php elseif($separate): ?>
                            <li aria-disabled="true"><span>...</span></li>

                            <?php
                                $separate = false;
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <li class="next">
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>">
                        <i class='bx bx-chevron-right' ></i>

                    </a>
                </li>
            <?php else: ?>
                <li class="next disabled">
                    <i class='bx bx-chevron-right' ></i>

                </li>
            <?php endif; ?>

            
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/vendor/pagination/panel.blade.php ENDPATH**/ ?>