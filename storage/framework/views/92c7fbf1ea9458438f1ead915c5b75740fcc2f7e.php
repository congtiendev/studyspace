  <div class="webinar-card">
      <figure>


              <figcaption class="webinar-card-body">
                  

                  <div class="btn-webinar-card-body">
                      <a style="-webkit-line-clamp: 1;
       text-align: left !important;
        white-space: nowrap;
        overflow: hidden"
                          href="<?php echo e($webinar->getUrl()); ?>"><?php echo e(clean($webinar->title, 'type')); ?></a>
                  </div>

                  <a href="<?php echo e($webinar->getUrl()); ?>">
                      <p style="-webkit-line-clamp: 1;
        white-space: nowrap;
        overflow: hidden; font-family: 'Inter', sans-serif;"
                          class="title-silder webinar-title font-16 text-dark-blue"><?php echo e(clean($webinar->title, 'title')); ?>

                      </p>
                  </a>

                  <?php if(!empty($webinar->category)): ?>
                      <span class="d-block font-14 mt-5"><a href="<?php echo e($webinar->getUrl()); ?>" target="_blank"
                              class=""><?php echo e($webinar->category->title); ?></a></span>
                  <?php endif; ?>


                  <?php echo $__env->make(getTemplate() . '.includes.webinar.rate', ['rate' => $webinar->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  

                  
              </figcaption>

      </figure>

  </div>

<?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/web/default/includes/webinar/grid-card.blade.php ENDPATH**/ ?>