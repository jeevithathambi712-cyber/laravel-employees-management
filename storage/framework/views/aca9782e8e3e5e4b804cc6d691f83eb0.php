<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
</head>

<body>

    <h2>Edit Employee</h2>

    <form method="POST" action="<?php echo e(route('employees.update', $employee->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label>First Name</label><br>
        <input type="text" name="first_name" value="<?php echo e($employee->first_name); ?>" required><br><br>

        <label>Last Name</label><br>
        <input type="text" name="last_name" value="<?php echo e($employee->last_name); ?>" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="<?php echo e($employee->email); ?>"><br><br>

        <label>Phone</label><br>
        <input type="text" name="phone" value="<?php echo e($employee->phone); ?>"><br><br>

        <label>Company</label><br>
        <select name="company_id" required>
            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($company->id); ?>"
                <?php echo e($employee->company_id == $company->id ? 'selected' : ''); ?>>
                <?php echo e($company->name); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br><br>

        <button type="submit">Update Employee</button>
    </form>

    <br>
    <a href="<?php echo e(route('employees.index')); ?>">Back</a>

</body>

</html><?php /**PATH C:\xampp\htdocs\company_app\resources\views/employees/edit.blade.php ENDPATH**/ ?>