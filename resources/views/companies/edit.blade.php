<!DOCTYPE html>
<html>

<head>
    <title>Edit Company</title>
</head>

<body>

    <h2>Edit Company</h2>

    <form method="POST"
        action="{{ route('companies.update', $company->id) }}"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>Company Name</label><br>
        <input type="text" name="name"
            value="{{ $company->name }}" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email"
            value="{{ $company->email }}"><br><br>

        <label>Current Logo</label><br>
        @if($company->logo)
        <img src="{{ asset('storage/'.$company->logo) }}"
            width="120"
            style="border:1px solid #ccc; padding:5px;"><br><br>
        @else
        <p>No logo uploaded</p>
        @endif

        <label>Change Logo</label><br>
        <input type="file" name="logo" accept=".jpg,.png"><br><br>

        <label>Website</label><br>
        <input type="text" name="website"
            value="{{ $company->website }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('companies.index') }}">Back</a>

</body>

</html>