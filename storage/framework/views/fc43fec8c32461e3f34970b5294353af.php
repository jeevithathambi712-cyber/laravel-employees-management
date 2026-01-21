<table border="1" cellpadding="10" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="row-<?php echo e($employee->id); ?>">
            <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
            <td><?php echo e($employee->company->name); ?></td>
            <td><?php echo e($employee->email); ?></td>
            <td><?php echo e($employee->phone); ?></td>

            <td>
                <a href="<?php echo e(route('employees.show', $employee->id)); ?>" class="btn btn-info btn-sm">View</a>
                <a href="<?php echo e(route('employees.edit', $employee->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm deleteEmployee" data-id="<?php echo e($employee->id); ?>">Delete</button>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="d-flex justify-content-center mt-3">
    <?php echo e($employees->links()); ?>

</div>
<?php /**PATH C:\xampp\htdocs\company_app\resources\views/employees/table.blade.php ENDPATH**/ ?>