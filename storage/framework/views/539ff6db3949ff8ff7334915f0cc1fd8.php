<!DOCTYPE html>
<html>
<head>
    <title>Edit Company</title>
</head>
<body>

<h2>Edit Company</h2>

<form method="POST"
      action="<?php echo e(route('companies.update', $company->id)); ?>"
      enctype="multipart/form-data">

    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label>Company Name</label><br>
    <input type="text" name="name"
           value="<?php echo e($company->name); ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email"
           value="<?php echo e($company->email); ?>"><br><br>

    <label>Current Logo</label><br>
    <?php if($company->logo): ?>
        <img src="<?php echo e(asset('storage/'.$company->logo)); ?>"
             width="120"
             style="border:1px solid #ccc; padding:5px;"><br><br>
    <?php else: ?>
        <p>No logo uploaded</p>
    <?php endif; ?>

    <label>Change Logo</label><br>
    <input type="file" name="logo" accept=".jpg,.png"><br><br>

    <label>Website</label><br>
    <input type="text" name="website"
           value="<?php echo e($company->website); ?>"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="<?php echo e(route('companies.index')); ?>">Back</a>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\company_app\resources\views/companies/edit.blade.php ENDPATH**/ ?>