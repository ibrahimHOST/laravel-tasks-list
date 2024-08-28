<h1>
    The list of tasks
</h1>
<div>
    <div>
        <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div>
            <p><a href="<?php echo e(route('tasks.show',['id' => $task->id])); ?>"><?php echo e($task->title); ?></a></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div>No Tasks yet.</div>
        <?php endif; ?>
    </div>

<?php /**PATH C:\Users\abukh\l10-task-list\resources\views/tasks/index.blade.php ENDPATH**/ ?>