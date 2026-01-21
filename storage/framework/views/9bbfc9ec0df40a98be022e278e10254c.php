<!DOCTYPE html>
<html>

<head>
    <title>Companies</title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Add Company</h2>

    <form id="companyForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="text" name="name" placeholder="Company Name" required><br><br>

        <input type="email" name="email" placeholder="Email"><br><br>

        <input type="file" name="logo" accept=".jpg,.png"><br><br>

        <input type="text" name="website" placeholder="Website"><br><br>

        <button type="submit">Save Company</button>
    </form>

    <hr>

    <div id="companyTable">
        <?php echo $__env->make('companies.table', ['companies' => $companies], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>


    <!-- AJAX SCRIPT -->
    <script>
        $(document).ready(function() {

            $('#companyForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "<?php echo e(route('companies.store')); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Company added successfully');
                            $('#companyForm')[0].reset();
                            loadCompanies();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert(xhr.responseText);
                    }

                });
            });

            function loadCompanies() {
                $.ajax({
                    url: "<?php echo e(route('companies.list')); ?>",
                    type: "GET",
                    success: function(data) {
                        $('#companyTable').html(data);
                    }
                });
            }

        });
    </script>
    <script>
        $(document).on('click', '.deleteCompany', function() {

            if (!confirm('Are you sure you want to delete this company?')) {
                return;
            }

            let id = $(this).data('id');

            $.ajax({
                url: "/companies/" + id,
                type: "DELETE",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function() {
                    $('#row-' + id).remove();
                    alert('Company deleted successfully');
                },
                error: function() {
                    alert('Delete failed');
                }
            });
        });
    </script>


</body>

</html><?php /**PATH C:\xampp\htdocs\company_app\resources\views/companies/index.blade.php ENDPATH**/ ?>