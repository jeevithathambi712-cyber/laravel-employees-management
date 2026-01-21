<!DOCTYPE html>
<html>

<head>
    <title>View Employee</title>
</head>

<body>

    <h2>Employee Details</h2>

    <p><strong>Name:</strong> <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></p>
    <p><strong>Email:</strong> <?php echo e($employee->email ?? '-'); ?></p>
    <p><strong>Phone:</strong> <?php echo e($employee->phone ?? '-'); ?></p>
    <p><strong>Company:</strong> <?php echo e($employee->company->name); ?></p>

    <a href="<?php echo e(route('employees.index')); ?>">Back</a>

</body>

</html><?php /**PATH C:\xampp\htdocs\company_app\resources\views/employees/show.blade.php ENDPATH**/ ?>