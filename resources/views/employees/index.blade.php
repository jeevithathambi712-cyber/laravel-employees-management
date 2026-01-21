<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Add Employee</h2>

    <form id="employeeForm">
        @csrf

        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>

        <select name="company_id" required>
            <option value="">Select Company</option>
            @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>

        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">

        <button type="submit">Save</button>
    </form>

    <hr>

    <div id="employeeTable">
        @include('employees.table')
    </div>

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

                if (confirm('Delete this employee?')) {
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
                }
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