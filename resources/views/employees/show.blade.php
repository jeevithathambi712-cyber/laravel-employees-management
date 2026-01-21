<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Employee</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">👤 Employee Details</h5>
                        <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm">
                            ← Back
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Name</div>
                            <div class="col-8">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Email</div>
                            <div class="col-8">
                                {{ $employee->email ?? '—' }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Phone</div>
                            <div class="col-8">
                                {{ $employee->phone ?? '—' }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 fw-bold">Company</div>
                            <div class="col-8">
                                <span class="badge bg-secondary">
                                    {{ $employee->company->name }}
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('employees.index') }}"
                           class="btn btn-secondary btn-sm">
                            Back to List
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
