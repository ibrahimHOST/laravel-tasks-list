<?php $__env->startSection('title', $task->title); ?>


<?php $__env->startSection( 'content' ); ?>
        <div class="mb-4">
        <a class="link" href="<?php echo e(route('tasks.index')); ?>" class="btn btn-primary"><span class="text-lg">&larr;</span> Go Back To Task Lists!</a>
        </div>
        <div class="mb-4">
            <p class="mb-4 text-slate-700"><?php echo e($task->description); ?></p>
            <?php if($task->long_description): ?>
                <p class="mb-4 text-slate-700"><?php echo e($task->long_description); ?>

            <?php endif; ?>
                <p class="mb-4 text-sm text-slate-500">Created <?php echo e($task->created_at->diffForHumans()); ?> &bull; Updated <?php echo e($task->updated_at->diffForHumans()); ?></p>
        </div>
        <div>
            <p class="mb-4">
                <?php if($task->completed): ?>
                <span class="font-medium text-green-500">Completed</span>
                <?php else: ?>
                <span class="font-medium text-red-500">Incompleted</span>
                <?php endif; ?>
            </p>
        </div>
        <div class="flex gap-2">
                <a class="btn" href="/tasks/<?php echo e($task->id); ?>/edit" class="btn btn-primary">Edit</a>
            <form action="<?php echo e(route('tasks.toggle-complete', ['task' => $task->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <button class="btn" type="submit">
                Mark as <?php echo e($task->completed ? 'Incomplete' : 'Completed'); ?>

                </button>
                </form>
            <form action="<?php echo e(route('tasks.destroy',['task' => $task->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn" type="submit">Delete</button>
            </form>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abukh\laravel10\l10-task-list\resources\views/show.blade.php ENDPATH**/ ?>