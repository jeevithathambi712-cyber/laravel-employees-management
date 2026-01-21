<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
</head>

<body>

    <h2>Edit Employee</h2>

    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')

        <label>First Name</label><br>
        <input type="text" name="first_name" value="{{ $employee->first_name }}" required><br><br>

        <label>Last Name</label><br>
        <input type="text" name="last_name" value="{{ $employee->last_name }}" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ $employee->email }}"><br><br>

        <label>Phone</label><br>
        <input type="text" name="phone" value="{{ $employee->phone }}"><br><br>

        <label>Company</label><br>
        <select name="company_id" required>
            @foreach($companies as $company)
            <option value="{{ $company->id }}"
                {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                {{ $company->name }}
            </option>
            @endforeach
        </select><br><br>

        <button type="submit">Update Employee</button>
    </form>

    <br>
    <a href="{{ route('employees.index') }}">Back</a>

</body>

</html>