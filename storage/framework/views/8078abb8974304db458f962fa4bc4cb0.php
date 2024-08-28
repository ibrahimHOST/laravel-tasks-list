<?php $__env->startSection('title','Edit Task'); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('form',['task' => $task], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abukh\laravel10\l10-task-list\resources\views/edit.blade.php ENDPATH**/ ?>