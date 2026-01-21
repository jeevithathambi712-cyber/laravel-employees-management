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
            <td>{{ $employee->company->name }}</td>
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
