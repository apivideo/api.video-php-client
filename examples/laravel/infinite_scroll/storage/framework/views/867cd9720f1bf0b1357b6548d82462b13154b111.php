<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card" style="margin-bottom:20px;">
        <div class="card-header">
            <h3><?php echo e($post->Title); ?></h3>
        </div>
        <div class="card-body">
            <p><iframe src="<?php echo e($post->MP4_Link); ?>"> </iframe></p>

        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /Users/erikkainnes/Lara/holiday/resources/views/data.blade.php ENDPATH**/ ?>