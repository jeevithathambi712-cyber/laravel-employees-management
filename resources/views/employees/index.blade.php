<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employees</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">👤 Add Employee</h5>
                    </div>

                    <div class="card-body">
                        <form id="employeeForm">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text"
                                    name="first_name"
                                    class="form-control"
                                    placeholder="Enter first name"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text"
                                    name="last_name"
                                    class="form-control"
                                    placeholder="Enter last name"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <select name="company_id" class="form-select" required>
                                    <option value="">Select Company</option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}">
                                        {{ $company->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Enter email">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Phone</label>
                                <input type="text"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Enter phone number">
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-success">
                                    💾 Save Employee
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Employee List Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">📋 Employee List</h5>
        </div>

        <div class="card-body" id="employeeTable">
            @include('employees.table')
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AJAX -->
    <script>
        $(document).ready(function() {

            // CREATE
            $('#employeeForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('employees.store') }}",
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

                if (!confirm('Delete this employee?')) return;

                $.ajax({
                    url: "/employees/" + id,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        loadEmployees();
                    }
                });
            });

            function loadEmployees() {
                $.get("{{ route('employees.list') }}", function(data) {
                    $('#employeeTable').html(data);
                });
            }

        });
    </script>

</body>

</html>