<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Add Employee</h2>

    <form id="employeeForm">
        <?php echo csrf_field(); ?>

        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>

        <select name="company_id" required>
            <option value="">Select Company</option>
            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">

        <button type="submit">Save</button>
    </form>

    <hr>

    <div id="employeeTable">
        <?php echo $__env->make('employees.table', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <script>
        $(document).ready(function() {

            // CREATE
            $('#employeeForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "<?php echo e(route('employees.store')); ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function() {
                        $('#employeeForm')[0].reset();
                        loadEmployees();
                    }
                });
            });

            // DELETE
            $(document).on('click', '.deleteEmployee', function() {
                let id = $(this).data('id');

                if (confirm('Delete this employee?')) {
                    $.ajax({
                        url: "/employees/" + id,
                        type: "DELETE",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success: function() {
                            loadEmployees();
                        }
                    });
                }
            });

            function loadEmployees() {
                $.get("<?php echo e(route('employees.list')); ?>", function(data) {
                    $('#employeeTable').html(data);
                });
            }

        });
    </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\company_app\resources\views/employees/index.blade.php ENDPATH**/ ?>