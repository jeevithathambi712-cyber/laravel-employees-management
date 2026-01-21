<!DOCTYPE html>
<html>

<head>
    <title>View Employee</title>
</head>

<body>

    <h2>Employee Details</h2>

    <p><strong>Name:</strong> {{ $employee->first_name }} {{ $employee->last_name }}</p>
    <p><strong>Email:</strong> {{ $employee->email ?? '-' }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone ?? '-' }}</p>
    <p><strong>Company:</strong> {{ $employee->company->name }}</p>

    <a href="{{ route('employees.index') }}">Back</a>

</body>

</html>