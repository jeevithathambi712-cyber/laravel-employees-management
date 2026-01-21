<!DOCTYPE html>
<html>
<head>
    <title>View Company</title>
</head>
<body>

<h2>Company Details</h2>

<p><strong>Name:</strong> <?php echo e($company->name); ?></p>
<p><strong>Email:</strong> <?php echo e($company->email); ?></p>
<p><strong>Website:</strong> <?php echo e($company->website); ?></p>

<?php if($company->logo): ?>
    <p>
        <strong>Logo:</strong><br>
        <img src="<?php echo e(asset('storage/'.$company->logo)); ?>" width="120">
    </p>
<?php endif; ?>

<a href="<?php echo e(route('companies.index')); ?>">Back</a>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\company_app\resources\views/companies/show.blade.php ENDPATH**/ ?>