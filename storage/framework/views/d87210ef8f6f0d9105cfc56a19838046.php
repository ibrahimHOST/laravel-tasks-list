<h1>
    <?php echo e($task->title); ?>

</h1>
<div>
    <div>
        <div style="background-color:#D5DDCF;border-radius: 5px;padding: 2px 10px;margin:  10px 0;">
            <p><strong>Task No: </strong><a href="<?php echo e(route('tasks.show',['id' => $task->id])); ?>"><?php echo e($task->id); ?></a></p>
            <p><strong>Task description: </strong><?php echo e($task->description); ?></p>
            <p><strong>Task long_description: </strong><?php echo e($task->long_description); ?>

                <p><strong>Task completed: </strong><?php echo e($task->completed); ?></p>
                <p><strong>Task created_at: </strong><?php echo e($task->created_at); ?></p>
                <p><strong>Task updated_at: </strong><?php echo e($task->updated_at); ?></p>
        </div>
    </div>

<?php /**PATH C:\Users\abukh\l10-task-list\resources\views/tasks/show.blade.php ENDPATH**/ ?>