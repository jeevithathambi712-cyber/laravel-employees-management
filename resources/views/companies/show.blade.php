<!DOCTYPE html>
<html>

<head>
    <title>View Company</title>
</head>

<body>

    <h2>Company Details</h2>

    <p><strong>Name:</strong> {{ $company->name }}</p>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Website:</strong> {{ $company->website }}</p>

    @if($company->logo)
    <p>
        <strong>Logo:</strong><br>
        <img src="{{ asset('storage/'.$company->logo) }}" width="120">
    </p>
    @endif

    <a href="{{ route('companies.index') }}">Back</a>

</body>

</html>