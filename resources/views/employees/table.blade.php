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
        @foreach($employees as $employee)
        <tr id="row-{{ $employee->id }}">
            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
            <td>{{ $employee->company->name ?? '-' }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>

            <td>
                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm deleteEmployee" data-id="{{ $employee->id }}">Delete</button>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-3">
    {{ $employees->links() }}
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).on('click', '.deleteEmployee', function() {
        let employeeId = $(this).data('id');

        if (!confirm('Are you sure you want to delete this employee?')) return;

        $.ajax({
            url: "{{ url('employees') }}/" + employeeId, 
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                if (res.success) {
                    $('#row-' + employeeId).remove();
                    alert('Employee deleted successfully');
                } else {
                    alert('Delete failed');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Delete failed');
            }
        });
    });
</script>