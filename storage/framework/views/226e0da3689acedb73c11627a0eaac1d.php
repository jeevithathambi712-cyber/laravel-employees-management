<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="row-<?php echo e($company->id); ?>">
            <td><?php echo e($company->name); ?></td>
            <td><?php echo e($company->email); ?></td>

            <td>
                <?php if($company->logo): ?>
                <img src="<?php echo e(asset('storage/'.$company->logo)); ?>" width="60">
                <?php else: ?>
                —
                <?php endif; ?>
            </td>

            <td><?php echo e($company->website); ?></td>

            <td>
                <!-- VIEW -->
                <a href="<?php echo e(route('companies.show', $company->id)); ?>"
                    class="btn btn-info btn-sm">
                    View
                </a>

                <!-- EDIT -->
                <a href="<?php echo e(route('companies.edit', $company->id)); ?>"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <!-- DELETE (AJAX) -->
                <button class="btn btn-danger btn-sm deleteCompany"
                    data-id="<?php echo e($company->id); ?>">
                    Delete
                </button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($companies->links()); ?><?php /**PATH C:\xampp\htdocs\company_app\resources\views/companies/table.blade.php ENDPATH**/ ?>